<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\addHostel;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public $filename;


    //ADD BLOG
function add_blog(){
    return view('Dashboard.add-blog');
}


//View BLOG
function view_blog(){

    $blogs =   Blog::all();
    return view('Dashboard.blog-view' , compact('blogs'));
}



    function store(Request $request)
    {

        // Validate input
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publish_date' => 'required|date',
            'description' => 'required',
        ]);


        // Handle image upload
        if($request->hasfile('image')){

            $file =  $request->file('image');
            $filename =  $file->getClientOriginalName();

            $path = 'blog/';
            $name  = $path . $filename;

            $file->move($path, $name);


          Blog::create([
            "title" => request('title'),
            "author" => request('author'),
            "publish_date" => request('publish_date'),
            "image" => $name,
            "description" => request('description'),
        ]);

        return redirect(route('view_blog'))->with('message', 'Blog Added Successfuly.');

    }

        return back()->with('message', 'Blog didnot added.');
    }



    function editblog() {

  $blog = Blog::find(request('id'));

        return view('Dashboard.update-blog' , compact('blog'));

    }



    function updateblog($id , Request $request) {

        request()->validate([
            "title" => 'required',
            "author" => 'required',
            "publish_date" => 'required',
            "image" => 'required',
            "description" => 'required',
        ]);

if($request->file('image')){
    $file =  $request->file('image');
    $this->filename =  $file->getClientOriginalName();

    $path = '/image';
    $file->move(public_path($path), $this->filename);
}


        Blog::where('id' , $id)->update([
            "title" => request('title'),
            "author" => request('author'),
            "publish_date" => request('publish_date'),
            "image" =>  $this->filename,
            "description" => request('description'),
        ]);

        return back()->with('message' , 'Blog Updated Successfully');

    }



    function deleteblog(){

        Blog::destroy(request('id'));

        return back()->with('deletemessage' , 'Blog Deleted Sucessfully');


    }
}
