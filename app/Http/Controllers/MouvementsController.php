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
           foreach($listes as $l){
                while (strpos( substr($l->compte->compte,0,3) , $l->compte->compte )) {
                    # code...
                }
           }
           return view('journal.index',compact('listes'));
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
        * fonction qui montre les etats d'un compte dans une Page
        * 
        * @param \Illuminate\Http\Request integer $compte
        * @return \Illuminate\Http\Response
        */

        public function etat($compte){
            $allrealisations = $this->getEtat($compte);
            $account = Compte::where('compte',$compte)->first();

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
            
            return view('journal.etat',['mouvements' => $allrealisations['mouvement'], 'total' => $allrealisations['total'], 'rapport' => $allrealisations['rapport'], 'compte' => $account, 'listes_chaines'=>$listes_chaines ]);
        }

        /**
         * fonction qui genere en PDF un Etat
         * 
         * @param \Illuminate\Http\Request
         * @return \Illuminate\Http\Response
         */

         public function export_pdf($compte){
            $allrealisations = $this->getEtat($compte);
            $account = Compte::where('compte',$compte)->first();

             //export view PDF
            $pdf = PDF::loadView('pdf.etat', ['mouvements' => $allrealisations['mouvement'], 'total' => $allrealisations['total'], 'rapport' => $allrealisations['rapport'], 'compte' => $account ] );
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

            $values = $this->getEtat($request->compte);
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
}
