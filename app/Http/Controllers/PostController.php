<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
        $post=Post::all();
        return view('post.index',compact('post'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
    return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'title'=>'required',
        'content'=>'required',
        'category_id'=>'required',
       // 'image'=>'required|image|max:2048|mimes:jpeg,png,jpg',
       'image'=>'sometimes|max:2048',
       ]);

       if($request->image){
        $imageName=time().'.'.$request->image->extension();
        $path=public_path('images/'.$imageName);
        $request->image->move(public_path('images'),$imageName);
    }

    //    NEW WAY TO INSERT DATA
    Post::create([
'title'=>$request->title,
'content'=>$request->content,
'category_id'=>$request->category_id,
//'image'=>$request->image->store('images','public'),
'user_id'=>auth()->id(),
 'image'=>$imageName
    ]);
    return redirect()->route('post.index')->with('sucess','post created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
// CODE TO EDIT FOR RESOURCE PROCESS

$categories=Category::all();
return view('post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
        {
            $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            'image'=>'sometimes|max:2048'
           ]);
        //try{
            //unlink(public_path('images/'.$post->image));
           // dd($request->image);
            if($request->image){
                $imageName=time().'.'.$request->image->extension();
                $path=public_path('images/'.$imageName);
                $request->image->move(public_path('images'),$imageName);
        }
        //    NEW WAY TO UPDATE  WHILE USING RESOURCE DATA

        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
//'image'=>$request->image->store('images','public'),
            'user_id'=>auth()->id(),
            'image'=>$imageName
            ]);

        return redirect()->route('post.index')->with('sucess','post updated sucessfully');
        //}
        // catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
            //}
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       // $employee = Employee::find($id);

     $post->delete();
     return redirect()->route('post.index')->with('success','post deleted sucessfully');
    }
}
