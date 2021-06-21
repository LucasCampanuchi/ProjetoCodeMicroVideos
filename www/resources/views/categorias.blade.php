<?php

use App\Models\Category;
use App\Models\Movies;


$categories = Category::where('id', $category)->first();     

try {
    echo "<h1> Categorias </h1>";
    echo "<p>Nome: {$categories->name}</p>";
    echo "<p>Descrição: {$categories->description}</p>";

    $moviesCategory = $categories->moviesCategory()->get();

    if(count($moviesCategory) > 0){

        echo "<h3>Filmes que tem esta Categoria</h3>";
        echo "<p>----------------------------------------------------------------</p>";
        foreach($moviesCategory as $movie){            
            echo "<p>Nome Filme; {$movie->name}</p>";
            echo "<p>Descricao Filme; {$movie->description}</p>";
            echo "<p>Sinopse Filme; {$movie->description}</p>";

            $genres = $movie->moviesGenres()->first();

            echo "<p>Gênero Filme; {$genres->name}</p>";

            echo "<p>----------------------------------------------------------------</p>";

        }        
    }



} catch (\Throwable $th) {
    if(!$categories){
        echo "Não há categoria com esse ID";
    }
    else{
        echo $th;
    }
}
?>