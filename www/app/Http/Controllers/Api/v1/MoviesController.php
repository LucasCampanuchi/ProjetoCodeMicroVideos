<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movies;

class MoviesController extends Controller
{

    public function index()
    {
        return Movies::all();
    }

    public function store(Request $request)
    {
        Movies::create($request->all());
        return Movies::all();  
    }

    public function show($id)
    {
        $recebeFilme = Movies::find($id);

        if($recebeFilme == ""){
            return response()->error('Filme nao encontrado', 404);   
        }
        else{
            return $recebeFilme;
        }
    }

    public function update(Request $request, $id)
    {
        $movies = Movies::findOrFail($id);
        $movies->update($request->all());

        return Movies::findOrFail($id);
    }


    public function destroy($id)
    {
        $movies = Movies::findOrFail($id);
        $movies->delete();

        return Movies::all();
    }
}
