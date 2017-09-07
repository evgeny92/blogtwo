<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlogMail extends Mailable{
   use Queueable, SerializesModels;

   protected $email;
   public $subject;
   protected $notice;

   /**
    * Create a new message instance.
    *
    * @return void
    */
   public function __construct($email, $subject, $notice){
      $this->email = $email;
      $this->subject = $subject;
      $this->notice = $notice;
   }

   /**
    * Build the message.
    *
    * @return $this
    */
   public function build(){
      return $this->view('mail.contact')->with([
         'email' => $this->email,
         'subject' => $this->subject,
         'notice' => $this->notice
      ]);
   }
}
