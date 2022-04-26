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


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' =>'required|max:300',
            'body' => 'required',
            'name' => 'required|min:3',
            'category_id' => 'required|max:1000'

        ]);



        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->name = $request->input('name');
       // $post->image_location = $request->input('image_location');
        $post->category_id = $request->input('category_id');

        $post->save();


        return redirect()->route('admin.posts.index');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' =>'required|max:300',
            'body' => 'required',
            'name' => 'required|min:3',
           // 'image_location' => 'max:1000',
            'category_id' => 'required|max:1000'
        ]);




        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->name = $request->input('name');
        $post->category_id = $request->input('category_id');
        //$post->image_location = $request->input('image_location');

        $post->save();

        return redirect()->route('admin.posts.index');
    }


    public function storeComment(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required',
            'post_id' => 'required',
            'name' => 'required',
          //  'image_location' => 'max:1000',
            'category_id' => 'required|max:1000'

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






    public function edit($id)
    {

        $post = Post::findOrFail($id);

        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }








    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
