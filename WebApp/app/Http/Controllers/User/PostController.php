<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Advertisement;
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
        $posts = Post::all();
        $advertisements = Advertisement::all();
        $comments = Comment::all();

        return view('user.posts.index', [
            'posts' => $posts,
            'comments' => $comments,
            'advertisements' => $advertisements
        ]);
    }


    public function show($id)
    {

        $count = Comment::where('post_id', $id)->count();
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();
        $advertisements = Advertisement::all();
        return view('user.posts.show',compact('count'), [
            'post' => $post,
            'comments' => $comments,
            'advertisements' => $advertisements

        ]);
    }





    public function create()
    {
        return view('user.posts.create');
    }




    public function store(Request $request)
    {
        // when user clicks submit on the create view above
        // the customer will be stored in the DB
        $request->validate([
            'title' => 'required',
            'description' =>'required|max:300',
            'body' => 'required|max:10000',
            'name' => 'required|min:3'
        ]);




        //Makes a Post Object
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->name = $request->input('name');
        //$customer->image_location =  $filename;
        $post->save();

        return redirect()->route('user.posts.index');
    }



    public function storeComment(Request $request)
    {
        // when user clicks submit on the create view above
        // the customer will be stored in the DB
        $request->validate([
            'title' => 'required',
            'body' => 'required|max:10000',
            'user_id' => 'required',
            'post_id' => 'required',
            'name' => 'required'

        ]);


        $comments = new Comment();
        $comments->title = $request->input('title');
        $comments->body = $request->input('body');
        $comments->user_id = $request->input('user_id');
        $comments->post_id = $request->input('post_id');
        $comments->name = $request->input('name');

        $comments->save();

        return redirect()->route('user.posts.index');
    }








}
