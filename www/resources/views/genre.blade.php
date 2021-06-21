<?php

use App\Models\Genres;


$genres = Genres::where('id', $id)->first();
try {
    echo "<h1> Gêneros </h1>";
    echo "<p>Nome: {$genres->name}</p>";

    $moviesGenres = $genres->moviesGenres()->get();

    if(count($moviesGenres) > 0){
        echo "<h3>Filmes que tem este Gênero</h3>";
        echo "<p>----------------------------------------------------------------</p>";
        foreach($moviesGenres as $movie){            
            echo "<p>Nome Filme; {$movie->name}</p>";
            echo "<p>Descricao Filme; {$movie->description}</p>";
            echo "<p>Sinopse Filme; {$movie->synopsis}</p>";

            $categoria = $movie->moviesCategory()->first();

            echo "<p>Categoria Filme: {$categoria->name}</p>";
            echo "<p>----------------------------------------------------------------</p>";
        }
    }
    

} catch (\Throwable $th) {

    if(!$genres){
        echo "Não há gênero com esse ID";
    }
    else{
        echo $th;
    }
    
}
?>