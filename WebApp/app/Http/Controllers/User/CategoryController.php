<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index($category_id)
    {

        $categories= Category::all();
        $posts = Post::where('category_id', $category_id)->get();
        //$posts = Post::all();
        return view('user.categories.index', [
            'categorys' => $categories,
            'posts' => $posts
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

    /* public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('user.posts.show', [
            'category' => $category
        ]);
    } */

    public function show($id)
    {
        $post = Post::where('category_id', $id)->get();
        $comments = Comment::where('post_id', $id)->get();
        return view('user.posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function edit($id)
    {
        //
    }

}
