<?php

namespace App\Http\Controllers;
use  App\Models\blog;

use Illuminate\Http\Request;

class blogsController extends Controller
{

    public function index(){

        $blogs =  blog :: get();


        return view('blogs.index',['blogsData' => $blogs]);
    }

    public function create()
    {

        return   view('blogs.createBlog');
    }


    public function store(Request $request)
    {

        $blogData = $this->validate($request, [
            'title'       => 'required|string',
            'content'     => 'required|min:50',
            'image'       => 'required|file|image|mimes:png,jpg,jpeg,gif'
        ]);

        $title = $request->title."<br>";
        $content = $request->content."<br>";
        $image = $request->file('image');
        $newImageName = md5(rand(0,100000)).'.'.$image->getClientOriginalExtension();
        $image->move(public_path("images/blogs"),$newImageName);


        $op =  blog :: create($blogData);

        if($op){
            $message = "Blog Created Successfully";
            session()->flash('Message-success',$message);
        }else{
            $message = "Blog Not Created";
            session()->flash('Message-error',$message);

        }

        return redirect(url('Blogs/Create'));

    }

}
