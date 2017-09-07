<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller{

   public function getIndex(){
      $posts = Post::paginate(5);
      return view('blog.index')->withPosts($posts);
   }

   public function getSingle($slug){
      //fetch from the db based on slug
      $post = Post::where('slug', '=', $slug)->first();
      //return he view and pass in the post object
      return view('blog.single')->withPost($post);
   }
}
