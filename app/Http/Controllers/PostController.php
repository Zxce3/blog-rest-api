<?php

namespace App\Http\Controllers;
use Stephenjude\FilamentBlog\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // All Posts
       $posts = Post::all();   // Return Json Response
       return response()->json([
          'posts' => $posts
       ],200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // Post Detail 
      $post = Post::with(['author', 'category'])->find($id);
       if(!$post){
         return response()->json([
            'message'=>'Post Not Found.'
         ],404);
       }   // Return Json Response
       return response()->json([
          'post' => $post
       ],200);
    }
   public function recent(Post $post)
    {
        $recent = Post::query()->where('id', '!=', $post->id)->orderBy('created_at', 'desc')->with(['category', 'author'])->take(4)->get();
        return response()->json([
            'recent' => $recent
        ],200);
    }
    public function paginate(Post $post)
    {
      $data = Post::with(['author', 'category'])->paginate(1);
      return response()->json([
        'post' => $data
      ],200);
    }
    public function author($id)
    {
      $post = Post::with(['author', 'category'])->find($id);
      $author = $post->author;
      return response()->json([
        'data' => $author
      ],200);
    }
}
