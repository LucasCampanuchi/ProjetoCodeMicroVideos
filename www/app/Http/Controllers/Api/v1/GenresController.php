<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genres;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{

    public function index()
    {
        return Genres::all();

    }


    public function store(Request $request)
    {
        Genres::create($request->all());
        return Genres::all();
    }


    public function show($id)
    {
        $recebeGenero = Genres::find($id);

        if($recebeGenero == ""){
            return response()->error('Genero nao encontrado', 404);   
        }
        else{
            return $recebeGenero;
        }
    }



    public function update(Request $request, $id)
    {
        $genres = Genres::findOrFail($id);
        $genres->update($request->all());

        return Genres::findOrFail($id);
    }


    public function destroy($id)
    {
        $genres = Genres::findOrFail($id);
        $genres->delete();

        return Genres::all();
    }
}
