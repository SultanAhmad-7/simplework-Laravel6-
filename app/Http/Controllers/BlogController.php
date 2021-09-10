<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('tag')) {
            $blogs = Tag::where('tag_name',request('tag'))->firstOrFail()->blogs;
        }else {
            $blogs = Blog::latest()->get();
        }
        return view('about',['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('blog.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog =  new Blog($this->validateRecord());
        $blog->user_id = 1;
        $blog->save();
        $blog->tag()->attach(request('tags'));
        return redirect('/about');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //$blog = Blog::find($id);
        return view('blogshow',['blog' => $blog,
                                'blogs' => Blog::orderBy('id','desc')->take(4)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        
        return view('blog.edit',['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Blog $blog)
    {
        $blog->update($this->validateRecord());
        return redirect(route('blog.show',$blog->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        return redirect($blog->path());
    }

    public function validateRecord()
    {
        return request()->validate([
            'title' => 'required|min:5|max:100',
            'excerpt' => 'required|min:5|max:200',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
