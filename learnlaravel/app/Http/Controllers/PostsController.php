s<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\Photo;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "<h2 class='text-center'>Post | Main Page</h2> ";
        $posts = Post::latest();    
        return view('posts.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
        //return "hello";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
   {
        $input = $request->all();
        if($file = $request->file('thisfile')) {
            $name = $file->getClientOriginalName();
            $path = $file->move('images', $name);
        }
        //echo $path;
        $post = Post::create($input);
        $post->photos()->save(Photo::create(['path'=>$path]));

        ///File Upload:
        //$file = $request->file('thisfile');
        //echo $file->getClientOriginalName();

        ///Validation (if not using CreatePostRequest)
        // $this->validate($request, [
        //      'title'=>'required|min:5',
            //'content'=>'required'
        // ]);
        //return $request->title;
        //Post::create($request->all());

        ///Save in individual column:
        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();

         //return redirect('/posts');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::findOrFail($id);
         return view('posts.edit', compact('post'));
        //return "good";
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
        //return $request->all();
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/posts');
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
        $post = Post::findOrFail($id)->delete();

        return redirect('/posts');

    }

    ///testing
    // public function contact($id, $name, $hp)
    // {
        
    //     return view('contact', compact('id', 'name', 'hp'));

    // }

    public function contact_us()
    {
        $contact_persons = ['ali', 'abu', 'bakar', 'mat'];
        return view('contact', compact('contact_persons'));

    }






































}
