<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;



class AdvertisementController extends Controller
{

    public function index()
    {
        $advertisements = Advertisement::all();
        return view('user.posts.index', [
            'advertisements' => $advertisements
        ]);
    }



    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);

        return view('user.advertisements.show', [
            'advertisement' => $advertisement

        ]);
    }
}
