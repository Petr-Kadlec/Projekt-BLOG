<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Post;
 use App\Category;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a varialbe and store all the blog post in it
        $posts = Post::orderBy('id', 'desc')->paginate(10);
       
        
        
        //return a view and pass a variable to it
        
        return view("posts.index")->withPosts($posts);
     

       
             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view("posts.create")->withCategories($categories);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
         $this->validate($request , array(
             "title" => "required|max:255", 
             "slug"  => "required|unique:posts,slug|alpha_dash|min:5|max:255|",
             "category_id" =>"required|integer",
             "body"  => "required"
         ));

        //store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
       
        
        
        $post->save();
        Session::flash("success" , "The blog post Was successfully saved !");

        //redirect to another page
        
        return redirect()->route("Posts.show", $post->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post = Post::find($id);
       return view("posts.show")->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save it as a variable
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }

        //return view and apass in the var
        return view('Posts.edit')->withPost($post)->withCategories($cats);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        //Validate the data
        if($request->input("slug") == $post->slug){
            $this->validate($request , array(
                "title" => "required|max:255", 
                "category_id" => "required|integer",
                "body" => "required"
            ));
        }else{
        $this->validate($request , array(
            "title" => "required|max:255", 
            "slug"  => "required|unique:posts,slug|alpha_dash|min:5|max:255|",
            "category_id" => "required|integer",
            "body" => "required"
    ));
    }

        //Save the data to the Database
        $post = Post::find($id);


        $post->title = $request->input("title");
        $post->body = $request->input("body");
        $post->category_id = $request->input("category_id");
        $post->slug = $request->input("slug");

        $post->save();

        //set flash data with success message
        Session::flash("success", "This post was succesfully updated : - ). ");

        //redirect with flash data to showrequest
                  return redirect()->route("Posts.show", $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        Session::flash("success", "This post was succesfully Deleted : - ). ");
       
        return redirect()->route("Posts.index");

    }
}
