<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisation;
use App\Models\Compte;
use App\Models\Mouvement;
use Carbon\Carbon;
use App\Models\User;
use Auth;
use PDF;
use Mail;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RealisationsController;

class MouvementsController extends Controller
{
    /**
     * property
     */

     /**
      * function construct
      *
      * @return void
      */

      public function __construct(){
          //dd( strlen(611) );
      }

      /**
       * fonction index Journal
       * 
       * @param null
       * @return \Illuminate\Http\Response
       */

       public function journal(){
           $current = Carbon::now()->format('Y');
           $listes = Realisation::whereYear('date',$current)->get();
           $tab_chaines = [];
           $chaine = $totaux = '';

           foreach($listes as $l){
                if(preg_match( '/'.substr( $l->compte->compte,0,3).'/i', $l->compte->compte ) ){
                    $details = Compte::where('compte',substr( $l->compte->compte,0,3))->first();

                    //calcul des totaux d'un compte mêre
                    $somme[ substr( $l->compte->compte,0,3) ][] = $l->total;
                    $totaux = array_sum($somme[ substr( $l->compte->compte,0,3) ]);

                    $mores = ['libelle' => $details->libelle, 'montant'=>number_format($totaux, 2, ',', ' ')];
                    $tab_chaines[ substr($l->compte->compte,0,3) ] = json_decode(json_encode($mores),false);
                }
           }
           //enregistrer les realisations des comptes meres
           $save = $this->saveCompteMere($somme);

           return view('journal.index',compact('tab_chaines'));
       }

       /**
        * fonction principale pour obtenir l'etat d'un compte
        * 
        * @param \Illuminate\Http\Request
        * @return \Illuminate\Http\Response
        */

        public function getEtat($compte){
            $realisation = new RealisationsController();
            $allrealisations = $realisation->allrealisations($compte);
            $account = Compte::where('compte',$compte)->first();
            return $allrealisations;
        }

        /**
         * Fonction Principale pour montrer les etats d'un compte Mere
         * 
         * @param \Illuminate\Http\Request
         * @return \Illuminate\Http\Response
         */

         public function CompteMereEtat($compte){
            //get les comptes enfants du variable $compte séléctionnées
            $all_ids = [];
            $childs_id = Compte::where('compte','like',$compte.'%')->get(['id']);
            foreach($childs_id as $ids){
                $all_ids[] = $ids->id;
            }
            $current = Carbon::now()->format('Y');

            //get les realisations des comptes enfants du variable $compte
            $allrealisations = [];
            $getrealisations = Realisation::whereIn('compte_id',$all_ids)->whereYear('date',$current)->get();
            foreach($getrealisations as $gets){
               $totals[] = $gets->total;
               $allrealisations['total'] = array_sum($totals);
            }
            $allrealisations['mouvement'] = $getrealisations;

            //get listes des users 'Birao'
            $users = User::where('role',Auth::user()->role)->get(['name']);
            $tab_chaines = [];
            $listes_chaines = "";
            if( count($users) > 0 ){
                foreach($users as $u){
                    $tab_chaines[] = '"'.$u->name.'"';
                }
                $listes_chaines = implode(',',$tab_chaines);
            } 
            return ['mouvement' => $allrealisations['mouvement'], 'total' => $allrealisations['total'], 'listes_chaines'=>$listes_chaines ];
         }
       
       /**
        * fonction qui montre les etats d'un compte dans une Pager
        * 
        * @param \Illuminate\Http\Request integer $compte
        * @return \Illuminate\Http\Response
        */

        public function etat($compte){
            $account = Compte::where('compte',$compte)->first();
            $allrealisations = $this->CompteMereEtat($compte);
            return view('journal.etat',[
                    'mouvements' => $allrealisations['mouvement'], 
                    'total' => $allrealisations['total'], 
                    'compte' => $account, 
                    'listes_chaines'=>$allrealisations['listes_chaines'] 
                ]);
        }

        /**
         * fonction qui genere en PDF un Etat
         * 
         * @param \Illuminate\Http\Request
         * @return \Illuminate\Http\Response
         */

         public function export_pdf($compte){
            $account = Compte::where('compte',$compte)->first();
            $allrealisations = $this->CompteMereEtat($compte);

             //export view PDF
            $pdf = PDF::loadView('pdf.etat', ['mouvements' => $allrealisations['mouvement'], 'total' => $allrealisations['total'], 'compte' => $account ] );
            return $pdf->download('Etat-'.date('d_m_Y').'-compte-'.$account->compte.'.pdf');
            // return view('pdf.etat', ['mouvements' => $allrealisations['mouvement'], 'total' => $allrealisations['total'], 'rapport' => $allrealisations['rapport'], 'compte' => $account ] );
         }

        /**
         * Page Modification un mouvement d'Un compte
         * 
         * @param \Illuminate\Http\Request
         * @return \Illuminate\Http\Response
         */

        public function update($id,$compte){
            $mouvement = Mouvement::findOrFail($id);
            $action = action('MouvementsController@edit');
            return view('journal.update',compact('mouvement','action','compte'));
        } 

        /**
         * Action modification Mouvement d'un compte
         * 
         * @param \Illuminate\Http\Request
         * @return \Illuminate\Http\Response
         */

         public function edit(Request $request){
            $validation = $this->validate($request,[
                'date' => 'required', 'montant' => 'required'
            ]);
            $edit = Mouvement::findOrFail($request->id);
            $edit->date = Carbon::parse($request->date)->format('Y-m-d');
            $edit->type = $request->type;
            $edit->libelle = $request->libelle;
            $edit->piece = $request->piece;
            $edit->cheque = $request->cheque;
            if( !is_null($edit->debit_id) ){
                $edit->debit->montant = floatval(str_replace(' ','',$request->montant));
                $edit->debit->save();
            }
            elseif( !is_null($edit->credit_id) ){
                $edit->credit->montant = floatval(str_replace(' ','',$request->montant));
                $edit->credit->save();
            }
            $edit->save();

            //actualisation les données de réalisations
            $real = new RealisationsController();
            $real->actualisation($request,$edit->compte_id,$edit->budget_id);

            return response()->json(['success' => 'Les Modification ont été enregistrées avec succès']);
         }

         /**
          * details du Mouvement des comptes enfants
          *
          * @param \Illuminate\Http\Request
          * @return \Illuminate\Http\Response
          */

          public function ajax_detail_compteChild($compte){
                if( strlen($compte) >= 4 ){
                    $realisation = new RealisationsController();
                    $values = $realisation->allrealisations($compte);
                    $mouvement = $values['mouvement'];
                    $total = $values['total'];
                    $rapport = $values['rapport'];
                    return view('journal.detail-ajax',compact('mouvement','total','rapport'));
                }
          }

         /**
          * Attachement : envoyer un pdf via email
          *
          * @return \Illuminate\Http\Response
          */

          public function attachement(Request $request){
            $validation = $this->validate($request,['destinataire'=>'required']);

            //tableau des destinataires
            $tab_destinataire = explode(',',$request->destinataire);
            
            //destination
            if( count($tab_destinataire) > 1 ){
                foreach($tab_destinataire as $tb_dest){
                    $email_destinataire[] = User::where('name',$tb_dest)->first()->email;
                }
            }
            elseif( count($tab_destinataire) <= 1 ){
                $email_destinataire = User::where('name',$request->destinataire)->first()->email;
            }

            $values = $this->CompteMereEtat($request->compte);
            $data = [
                'mouvements' => $values['mouvement'],
                'total' => $values['total'],
                'compte' => Compte::where('compte',$request->compte)->first(),
                'destinataire' => $email_destinataire,
                'expediteur' => 'adminsys@ambato.nga',
                'titre' => 'Etat du compte '.$request->compte,
                'contenu' => 'Nom : '.Auth::user()->name.'<br/> Email : '.Auth::user()->email.'<br/> Rôle : '.Auth::user()->role.'<br/> vous a envoyé une pièce jointe.
                 Trouvé ci-jointe, le fichier pdf de l\'Etat du compte '.$request->compte.'. En cas d\'incohérence ou de problème, veuillez visiter l\'application en ligne ',
                 'text' => $request->message,
                'titre_pdf' => 'Etat-'.date('d-m-Y').'-compte-'.$request->compte,
                ];
                
            //Feedback mail to client
            $mail = new MailController();
            if( $mail->send_attachement_pdf($data)){
                return back()->with('success',"L'email et la pièce jointe ont été envoyés avec succès");
            }
                
          }

          /**
           * Filtre par intervalle de date Journal des comptes
           * 
           * @param \Illuminate\Http\Request
           * @return \Illuminate\Http\Response
           */

           public function filtre(Request $request){
                $_debut = date('Y-m-d',strtotime($request->debut));
                $_fin = date('Y-m-d',strtotime($request->fin));

                $listes = Mouvement::whereBetween('date',[$_debut,$_fin])->orderBy('date','desc')->get();           
                
                $tab_chaines = [];
                $chaine = $totaux = '';
                $getvalue = 0;
    
                foreach($listes as $l){
                    if(preg_match( '/'.substr( $l->compte->compte,0,3).'/i', $l->compte->compte ) ){
                        $details = Compte::where('compte',substr( $l->compte->compte,0,3))->first();
    
                        //calcul des totaux d'un compte mêre
                        if( !empty($l->credit->montant) )
                            $getvalue = $l->credit->montant;
                        elseif( !empty($l->debit->montant))
                            $getvalue = $l->debit->montant;
                        else
                            $getvalue = 0;
                        
                        $somme[ substr( $l->compte->compte,0,3) ][] = $getvalue;
                        $totaux = array_sum($somme[ substr( $l->compte->compte,0,3) ]);
    
                        $mores = ['libelle' => $details->libelle, 'montant'=>number_format($totaux, 2, ',', ' ')];
                        $tab_chaines[ substr($l->compte->compte,0,3) ] = json_decode(json_encode($mores),false);
                    }
                }
                /**
                 * tab_chaines [] [ 'libelle' , 'montant' ]
                 */
                return view('journal.index',compact('tab_chaines'));

           }

           /**
            * Enregistrement des realisations pour les comptes Meres
            *
            * @param \Illuminate\Http\Request array
            * @return \Illuminate\Http\Response
            */

            public function saveCompteMere(array $array){
                try{
                    if( is_array($array) ){
                        foreach( $array as $key => $value ){
                            if( strlen($key) <= 3 ){
                                $getcompte = Compte::where('compte',$key)->first();
                                if( count($getcompte) >=1 ){
                                    $budget = new BudgetsController();
                                    $actually = $budget->progress();
                                    $save = Realisation::where('compte_id',$getcompte->id)->where('budget_id',$actually->id)->get();
                                    if( count($save) >=1 ){
                                        $save->total = array_sum($array($key));
                                        $save->save();
                                    }else{
                                        $create = new Realisation();
                                        $create->compte_id = $getcompte->id;
                                        $create->budget_id = $actually->id;
                                        $create->total = array_sum($array[$key]);
                                        $create->date = date('Y-m-d');
                                        $create->save();
                                    }
                                }
                            }
                        }
                    }
                }catch(Exception $e){
                    report($e);
                }
            }
}
