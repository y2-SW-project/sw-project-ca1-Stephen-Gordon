<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Advertisement;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function dublin()
    {


        $categories= Category::all();
        $advertisements = Advertisement::all();

        $posts = Post::where('category_id', 1)->get();
        return view('admin.categories.dublin', [
            'categorys' => $categories,
            'posts' => $posts,
            'advertisements' => $advertisements
        ]);
    }


    public function cork()
    {


        $categories= Category::all();
        $advertisements = Advertisement::all();

        $posts = Post::where('category_id', 2)->get();
        return view('admin.categories.cork', [
            'categorys' => $categories,
            'posts' => $posts,
            'advertisements' => $advertisements
        ]);
    }



    public function galway()
    {


        $categories= Category::all();
        $advertisements = Advertisement::all();

        $posts = Post::where('category_id', 3)->get();
        return view('admin.categories.galway', [
            'categorys' => $categories,
            'posts' => $posts,
            'advertisements' => $advertisements
        ]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {

        $post = Post::where('category_id', $id)->get();
        $comments = Comment::where('post_id', $id)->get();
        return view('admin.posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function edit($id)
    {
        //
    }

}
