<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'comment'   =>  'required|min:5|max:2000'
            ));

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = false;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment was added');

        return redirect()->route('Blog.single', [$post->slug]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
    }
    public function approval(Request $request , $id)
    {

    	$comment= Comment::find($id);
    	$approveVal=$request->approved;
    	if($approveVal=="on"){
    		$approveVal=1;
    	}else{
    		$approveVal=0;
    	}

    	$comment->approved=$approveVal;
    	$comment->save();

    	return back();
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
        $comment = Comment::find($id);

        $this->validate($request, array('comment' => 'required'));

        $comment->comment = $request->comment;
       
    

   

        $comment->save();

        Session::flash('success', 'Comment updated');

        return redirect()->route('Posts.show', $comment->post->id);
    }
    public function approved( Request $request, $id ){
        $comment = Comment::find($id);
        

    
     
        $this->validate($request, array('approved'));
     
       
       

       $approveVal=$request->approved;
       if($approveVal=="on"){
           $approveVal=1;
       }else{
           $approveVal=0;
       }

       $comment->approved=$approveVal;
       
    
        

        $comment->save();

        Session::flash('success', 'Comment approved/disaproved');

        return redirect()->route('Posts.show', $comment->post->id);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success', 'Deleted Comment');

        return redirect()->route('Posts.show', $post_id);
    }
}
