<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;



class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }




    public function index()
    {
        $advertisements = Advertisement::all();
        return view('admin.posts.index', [
            'advertisements' => $advertisements
        ]);
    }





    public function create()
    {
        return view('admin.advertisements.create');
    }





    public function store(Request $request)
    {
        // when user clicks submit on the create view above
        // the customer will be stored in the DB
        $request->validate([
            'title' => 'required',
            'description' =>'required|max:800',
            'body' => 'required|max:10000',
            'business_name' => 'required'
        ]);




        //Makes a Post Object
        $advertisement = new Advertisement();
        $advertisement->title = $request->input('title');
        $advertisement->description = $request->input('description');
        $advertisement->body = $request->input('body');
        $advertisement->business_name = $request->input('business_name');

        $advertisement->save();

        return redirect()->route('admin.posts.index');
    }


    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);

        return view('admin.advertisements.show', [
            'advertisement' => $advertisement

        ]);
    }



    public function edit($id)
    {
        // get the customer by ID from the Database. passes through the function

        //Find or Fail check is it exists

        $advertisement = Advertisement::findOrFail($id);

        // Load the edit view and pass the customer to
        // that view
        return view('admin.advertisements.edit', [
            'advertisement' => $advertisement
        ]);
    }



      public function update(Request $request, $id)
    {

        // first get the existing customer that the user is update
        //Id is passed through to make sure we update the right customer

        $advertisement = Advertisement::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' =>'required|max:800',
            'body' => 'required|max:10000',
            'business_name' => 'required'
        ]);



        // if validation passes then update existing customer
        $advertisement->title = $request->input('title');
        $advertisement->description = $request->input('description');
        $advertisement->body = $request->input('body');
        $advertisement->business_name = $request->input('business_name');
        //$customer->image = $request->input('image');
        $advertisement->save();


        return redirect()->route('admin.posts.index');
    }




    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();

        return redirect()->route('admin.posts.index');
    }
}
