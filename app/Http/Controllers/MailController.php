<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use PDF;
use Mail;

class MailController extends Controller
{
    /**
     * property
     */

     /**
      * class Construct
      *
      * @return void
      */

      public function __construct(){

      }

      /**
       * Envoie fichier attachement via email
       * 
       * @param \Illuminate\Http\Request
       * @return \Illuminate\Http\Response
       */

       public function send_attachement_pdf($data){

            //Feedback mail to client
            $pdf = PDF::loadView('pdf.etat', $data)->setPaper('a4'); 

            Mail::send('pdf.message', $data, function($message) use ($data,$pdf){
                    $message->from($data['expediteur']);
                    $message->to($data['destinataire']);
                    $message->subject($data['titre']);
            //Attach PDF doc
                    $message->attachData($pdf->output(),$data['titre_pdf'].'.pdf');
            });
            return true;
       }
}
