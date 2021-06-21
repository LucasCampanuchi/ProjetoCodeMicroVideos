<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CastMember;
use App\Models\Movies;
use App\Api\errorMessage;

class CastMemberController extends Controller
{

    public function index()
    {
        return CastMember::all();
    }

    public function store(Request $request)
    {
        CastMember::create($request->all());
        return CastMember::all();
    }

    public function show($id)
    {

        $recebeCastMember = CastMember::find($id);

        if($recebeCastMember == ""){
            return response()->error('Ator/Diretor nao encontrado', 404);   
        }
        else{
            return $recebeCastMember;
        }
        
        
    }


    public function update(Request $request, $id)
    {
        $castmember = CastMember::findOrFail($id);
        $castmember->update($request->all());

        return CastMember::findOrFail($id);
    }

    public function destroy($id)
    {
        $castmember = CastMember::findOrFail($id);
        $castmember->update($request->all());

        return CastMember::delete();
    }
}
