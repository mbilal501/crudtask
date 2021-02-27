<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try{
            $post = new Post;

             $post->post_title = $request->post_title;
             $post->post_description = $request->post_description;

            $post->save();


            return back()->with('message', 'Post Added Successfully!');
        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action!');
        }
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
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $post = Post::find($id);
         return view('posts.edit', compact('post'));
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
         try{
              $post = Post::find($id);

         if(empty($post))
         {
            return back()->with('message', 'Post Does Not Exist!');
        }
             if($request->has('post_title'))
             {
                   $post->post_title = $request->post_title;
             }
             if($request->has('post_description'))
             {
          
             $post->post_description = $request->post_description;
              }

            $post->save();



        return back()->with('message', 'Post Updated Successfully!');
    }catch(\Exception $e)
    {
        return back()->with('error', 'There is some trouble to proceed your action!');
    }

    }

    

    public function search (Request $request)
    { 

       $post = Post::where('id', $request->id)->first(); 

       if(empty($post))
       {
         return back()->with('message', 'Post ID Does Not Exists!');
       }

       return view('posts.show',compact('post')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
          try{

          Post::find($id)->delete();
          return back()->with('message', 'Post Deleted Successfully!');

      }catch(\Exception $e)
      {

        return back()->with('error', 'There is some trouble to proceed your action!');
    }
    }
}
