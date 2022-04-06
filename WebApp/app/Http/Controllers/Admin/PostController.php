<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
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
        return view('admin.posts.index', [
            'posts' => $posts,
            'comments' => $comments
        ]);
    }





    public function create()
    {
        return view('admin.posts.create');
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
            //'customer_image' => 'file|image'
        ]);




        //Makes a Post Object
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->name = $request->input('name');
        //$customer->image_location =  $filename;


        //Puts them in the customer variable
        //Customer is now an object
        //Saves it to the database
        $post->save();

        //Then goes back to index if everything is correct
        return redirect()->route('admin.posts.index');
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('admin.posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
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
