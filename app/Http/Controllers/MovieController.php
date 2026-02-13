<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function api($params)
    {
        $params['apikey'] = env('OMDB_API_KEY');
        return json_decode(file_get_contents(
            env('OMDB_BASE_URL').'?'.http_build_query($params)
        ));
    }

    public function index()
    {
        return view('movies.index');
    }

    public function search(Request $request)
    {
        $page = $request->page ?? 1;

        $data = $this->api([
            's'=>$request->keyword,
            'page'=>$page
        ]);

        return response()->json($data);
    }

    public function detail($id)
    {
        $movie = $this->api(['i'=>$id]);
        return view('movies.detail',compact('movie'));
    }
}
