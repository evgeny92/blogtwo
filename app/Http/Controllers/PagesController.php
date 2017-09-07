<?php

namespace App\Http\Controllers;

use App\Mail\BlogMail;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller{

   public function getIndex(){
      $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
      return view('pages.welcome')->withPosts($posts);
   }

   public function getAbout(){
      return view('pages.about');
   }

   public function getContact(){
      return view('pages.contact');
   }

   public function postContact(Request $request){
      $this->validate($request, [
         'email' => 'required|email',
         'subject' => 'min:6',
         'notice' => 'min:10'
      ]);

      /*$data = [
         'email' => $request->email,
         'subject' => $request->subject,
         'message' => $request->message
      ];*/

      $email = $request->email;
      $subject = $request->subject;
      $notice = $request->notice;

      Mail::to('evgeny@mail.ru')->send(new BlogMail($email, $subject, $notice));
      Session::flash('success', 'The message was sent successfully.');
      return redirect('contact');
   }

}
