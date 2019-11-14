<?php
namespace App\Http\Controllers;


class PagesController extends Controller {

         public function getIndex(){
            return view('Pages.welcome');
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
