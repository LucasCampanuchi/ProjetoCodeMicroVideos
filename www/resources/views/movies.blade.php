<?php

use App\Models\Category;
use App\Models\Movies;

$movies = Movies::where('id', $id)->first();

try {

    echo "<h1> Filmes </h1>";
    echo "<p>Nome: {$movies->name}</p>";
    echo "<p>Descrição: {$movies->description}</p>";
    echo "<p>Sinopse: {$movies->synopsis}</p>";

    
    $moviesGenres = $movies->moviesGenres()->first();

    echo "<p>Gênero: {$moviesGenres->name}</p>";

    $moviesCategory = $movies->moviesCategory()->first();

    echo "<p>Categoria: {$moviesCategory->name}</p>";

    

    $cast_members = $movies->moviesCastMember()->get();
    
    if(count($cast_members) > 0){
        echo "<h3>Atores/Diretores que participaram desse filme</h3>";
        echo "<p>----------------------------------------------------------------</p>";
        foreach($cast_members as $cast_member){            
            echo "<p>Nome: {$cast_member->name}</p>";

            if($cast_member->type == 1){
                echo "<p>Tipo: Ator</p>";
            }
            else if($cast_member->type == 2){
                echo "<p>Tipo: Diretor</p>";
            }

            echo "<p>----------------------------------------------------------------</p>";
        }
    }  

} catch (\Throwable $th) {
    if(!$movies){
        echo "Não há fimes com este id";
    }
    else{
        echo $th;
    }
    
}    

?>