<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = session('favorites',[]);
        return view('favorite.index',compact('favorites'));
    }

    public function add(Request $request)
    {
        $favorites = session('favorites',[]);
        $favorites[$request->imdbID] = $request->movie;
        session(['favorites'=>$favorites]);

        return response()->json(['success'=>true]);
    }

    public function remove(Request $request)
    {
        $favorites = session('favorites',[]);
        unset($favorites[$request->imdbID]);
        session(['favorites'=>$favorites]);

        return response()->json(['success'=>true]);
    }
}
