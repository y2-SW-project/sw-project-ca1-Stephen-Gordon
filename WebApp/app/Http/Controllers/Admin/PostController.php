<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Advertisement;
use Illuminate\Http\Request;



class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }




    public function index()
    {
        $posts = Post::all();

        $comments = Comment::all();
        $advertisements = Advertisement::all();
        return view('admin.posts.index', [
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

        return view('admin.posts.show',compact('count'), [
            'post' => $post,
            'comments' => $comments,
            'advertisements' => $advertisements
        ]);
    }


    public function create()
    {
        return view('admin.posts.create');
    }





    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' =>'required|max:300',
            'body' => 'required|max:10000',
            'name' => 'required|min:3'
        ]);




        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->name = $request->input('name');

        $post->save();

        return redirect()->route('admin.posts.index');
    }


    public function storeComment(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required|max:10000',
            'user_id' => 'required',
            'post_id' => 'required'

        ]);


       // $comments = Comment::where('post_id', $id)->get();
        $comments = new Comment();
        $comments->title = $request->input('title');
        $comments->body = $request->input('body');
        $comments->user_id = $request->input('user_id');
        $comments->post_id = $request->input('post_id');

       // $comments->post_id = $request->input('post_id');
        $comments->save();

        return redirect()->route('user.posts.index');
    }






    public function edit($id)
    {
        // get the customer by ID from the Database. passes through the function

        //Find or Fail check is it exists

        $post = Post::findOrFail($id);

        // Load the edit view and pass the customer to
        // that view
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }



      public function update(Request $request, $id)
    {

        // first get the existing customer that the user is update
        //Id is passed through to make sure we update the right customer

        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' =>'required|max:300',
            'body' => 'required|max:10000',
            'name' => 'required|min:3'
        ]);



        // if validation passes then update existing customer
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->name = $request->input('name');
        //$customer->image = $request->input('image');
        $post->save();


        return redirect()->route('admin.posts.index');
    }




    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
