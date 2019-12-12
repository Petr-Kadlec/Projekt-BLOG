<?php
namespace App\Http\Controllers;
use App\Post;


class PagesController extends Controller {

         public function getIndex(){
                  $posts = Post::orderBy('created_at' , 'desc')->limit(4)->get();

            return view('Pages.welcome')->withPosts($posts);
         }
         public function getAbout(){
             $first = "petr";
             $last = "kadlec";
             $fullname = $first . " " . $last; 
             $email = "petr@seznam.cz";
             $data = [];
             $data["email"] = $email;
             $data["fullname"] = $fullname;
            return view('Pages.About')->withData($data);
         }
         public function getContact(){
            return view('Pages.Contact');
         }
         public function postContact(){
           
        }
}
