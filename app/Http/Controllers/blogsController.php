<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blogsController extends Controller
{
    public function create()
    {

        return   view('blogs.createBlog');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title'       => 'required|string',
            'content'     => 'required|min:50',
            'image'       => 'required|file|image|mimes:png,jpg,jpeg,gif'
        ]);

        $title = $request->title."<br>";
        $content = $request->content."<br>";
        $image = $request->file('image');
        $newImageName = md5(rand(0,100000)).'.'.$image->getClientOriginalExtension();
        $image->move(public_path("images/blogs"),$newImageName);

        return back()->with(session()->put('success', "Blog Added Successfully"));

    }

}
