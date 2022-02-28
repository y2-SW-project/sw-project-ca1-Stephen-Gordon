<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;



class PostController extends Post
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }




    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', [
            // the view can see the customers (the green one)
            'posts' => $posts
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

        return view('admin.customers.show', [
            'post' => $post
        ]);
    }



    public function edit($id)
    {
        // get the customer by ID from the Database. passes through the function

        //Find or Fail check is it exists

        $customer = Customer::findOrFail($id);

        // Load the edit view and pass the customer to
        // that view
        return view('admin.customers.edit', [
            'customer' => $customer
        ]);
    }



    public function update(Request $request, $id)
    {

        // first get the existing customer that the user is update
        //Id is passed through to make sure we update the right customer

        $customer = Customer::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'address' =>'required|max:500',
            'email' => 'required|email',
            'phone' => 'required|min:6'
        ]);



        // if validation passes then update existing customer
        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        //$customer->image = $request->input('image');
        $customer->save();


        return redirect()->route('admin.customers.index');
    }




    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customers.index');
    }
}
