<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','destroy']);
    }
    public function index(){
    //    $posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(5); 
       $posts = Post::latest()->with(['user','likes'])->paginate(5); 
        return view('posts.index',[
            'posts'=> $posts
        ]);
    }

    public function show(Post $post){
        return view('posts.show',[
            'post'=> $post
        ]);
    }
    public function store(Request $request){

        $this->validate($request,[
            'body' => 'required'
        ]);
    

        //create post
        // Post::create([
        //     'user_id'=> Auth::id(),
        //     'body'=> $request->body
        // ]);
        
            $request->user()->posts()->create([
                    //user_id is automatically handled by laravel
                  "body"=> $request->body  
            ]);

        return back();
    }

    public function destroy(Post $post,Request $request){
       $this->authorize("delete",$post);
        $post->delete();
        return back();
    }
}
