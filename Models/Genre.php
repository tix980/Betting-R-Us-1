<?php

namespace BettingRUs\Models;

class Genre
{
    public function getAllGenre($db){
        $sql = "SELECT distinct genre FROM movies";
        $pdostm = $db ->prepare($sql);
        $pdostm->execute();
        $m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

        return $m;
    }
    public function getMoviesInGenre($db, $genre){
        $sql = "SELECT * FROM movies where genre  = :genre";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':genre', $genre);
        $pdostm->execute();
        $m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

        return $m;
    }

}