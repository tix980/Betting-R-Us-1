<?php

namespace BettingRUs\Models;

class CurrentBet{
public function addCurrentBet($movieId, $betCloseDate,$betStatus, $db)
{
    $sql = "INSERT INTO current_bets (movie_id, bet_close_date,bet_status)
VALUES (:movieId, :betCloseDate, :betStatus) ";
    $pst = $db->prepare($sql);

    $pst->bindParam(':movieId', $movieId);
    $pst->bindParam(':betCloseDate', $betCloseDate);
    $pst->bindParam(':betStatus', $betStatus);

    $count = $pst->execute();
    return $count;
}

    public function getMovie($db){
        $query = "SELECT * FROM movies";
        $pdostm = $db->prepare($query);
        $pdostm->execute();

        //fetch all result
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    public function getCurrentBetByMovie($db, $movie){
        $query = "SELECT movies.title as movie_title, current_bets.id, current_bets.bet_close_date,current_bets.bet_status FROM current_bets inner join movies on movies.id = current_bets.movie_id WHERE movie_id = :movie";
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':movie', $movie, \PDO::PARAM_STR);
        $pdostm->execute();
        $s = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $s;
    }
public function getAllCurrentBets($dbcon){
    $sql = "SELECT movies.title, movies.release_date, movies.movie_background, current_bets.id,current_bets.movie_id,current_bets.bet_close_date,current_bets.bet_status FROM current_bets  inner JOIN movies ON movies.id = current_bets.movie_id";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->execute();

    $currentBets = $pdostm->fetchAll(\PDO::FETCH_OBJ);
    return $currentBets;
}



public function getCurrentBetsById($id, $db){
    $sql = "SELECT * FROM current_bets where id = :id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();
    return $pst->fetch(\PDO::FETCH_OBJ);
}


public function updateCurrentBet ($id,$movieId, $betCloseDate,$betStatus, $db){
    $sql = "UPDATE current_bets 
                SET movie_id = :movieId,
                bet_close_date = :betCloseDate,
                bet_status = :betStatus
                WHERE id = :id
        
        ";

    $pst =  $db->prepare($sql);

    $pst->bindParam(':movieId', $movieId);
    $pst->bindParam(':betCloseDate', $betCloseDate);
    $pst->bindParam(':betStatus', $betStatus);
    $pst->bindParam(':id', $id);


    $count = $pst->execute();

    return $count;
}

    public function deleteCurrentBet($id, $db){
        $sql = "DELETE FROM current_bets WHERE id = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;

    }

}
