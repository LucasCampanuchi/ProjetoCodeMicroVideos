<?php

use App\Models\CastMember;


 $castmember = CastMember::where('id', $id)->first();
 try {
     echo "<h1> Atores/Diretores </h1>";
     echo "<p>Nome: {$castmember->name}</p>";
     if($castmember->type == 1){
         echo "<p>Tipo: Ator</p>";
     }
     else if($castmember->type == 2){
         echo "<p>Tipo: Diretor</p>";
     }

     $movies = $castmember->movies()->get();

     if(count($movies) > 0){

        echo "<h3>Filmes que este Ator/Diretor participa</h3>";
        echo "<p>----------------------------------------------------------------</p>";
        foreach($movies as $movie){            
            echo "<p>Nome Filme: {$movie->name}</p>";
            echo "<p>Descricao Filme: {$movie->description}</p>";
            echo "<p>Sinopse Filme: {$movie->synopsis}</p>";

            $genres = $movie->moviesGenres()->first();

            echo "<p>Gênero Filme: {$genres->name}</p>";

            echo "<p>----------------------------------------------------------------</p>";


        }   
    }
     

 } catch (\Throwable $th) {

     if(!$castmember){
         echo "Não há ator com esse ID";
     }
     else{
         echo $th;
     }
     
 }       
?>