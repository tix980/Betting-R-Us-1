<?php

namespace BettingRUs\Models;

class PlaceBet
{

    public function getAllCurrentBets($dbcon){
        $sql = "SELECT movies.id as movie_id, movies.title, movies.release_date, movies.movie_background, current_bets.id,current_bets.bet_close_date,current_bets.bet_status FROM current_bets  inner JOIN movies ON movies.id = current_bets.movie_id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $currentBets = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $currentBets;
    }
    public function getCurrentBetById($id, $db){
        $sql = "SELECT movies.title, movies.release_date, movies.movie_background, current_bets.id,current_bets.bet_close_date,current_bets.bet_status FROM current_bets  inner JOIN movies ON movies.id = current_bets.movie_id where current_bets.id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
    public function getBetsInCurrentBet($db, $currentbet){

        $query = "SELECT movies.title as bet_movie ,users.username as username , current_bets.bet_status, place_bets.amount, place_bets.bet_type, place_bets.id FROM movies INNER JOIN current_bets ON movies.id = current_bets.movie_id inner join place_bets on current_bets.id = place_bets.current_bet_id inner join users on users.id = place_bets.user_id WHERE current_bet_id = :currentbet";

        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':currentbet', $currentbet, \PDO::PARAM_STR);
        $pdostm->execute();
        $s = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $s;
    }

    public function getAllBets($db) {
        $sql = "SELECT movies.title as bet_movie ,users.username as username , current_bets.bet_status, place_bets.amount, place_bets.bet_type,place_bets.result,place_bets.earning_loss,place_bets.bet_won_lost,place_bets.result_status,place_bets.date, place_bets.id FROM movies INNER JOIN current_bets ON movies.id = current_bets.movie_id inner join place_bets on current_bets.id = place_bets.current_bet_id inner join users on users.id = place_bets.user_id ";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        $bets = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $bets;
    }

    public function getBetWithId($id, $db){
        $sql = "SELECT movies.title as bet_movie ,users.username as username , current_bets.bet_status, place_bets.amount, place_bets.bet_type,place_bets.current_bet_id, place_bets.id FROM movies INNER JOIN current_bets ON movies.id = current_bets.movie_id inner join place_bets on current_bets.id = place_bets.current_bet_id inner join users on users.id = place_bets.user_id where place_bets.id = :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();

        $bet = $pdostm->fetch(\PDO::FETCH_OBJ);
        return $bet;
    }

    public function addBet($currentbetid, $userid, $amount, $bettype,  $db){
        $sql = "INSERT INTO place_bets(current_bet_id, user_id, amount, bet_type) values (:currentbetid, :userid, :amount, :bettype)";
        $pdostm = $db->prepare($sql);

        $pdostm->bindParam(':currentbetid',$currentbetid);
        $pdostm->bindParam(':userid',$userid);
        $pdostm->bindParam(':amount', $amount);
        $pdostm->bindParam(':bettype',$bettype);


        $count = $pdostm->execute();
        return $count;
    }

    public function updateBet($id, $amount, $bet_movie, $bettype,$result,$earningloss,$betwonlost,$resultstatus, $db){
        $sql = "UPDATE place_bets SET
                amount = :amount,
                current_bet_id = :betmovie,
                bet_type = :bettype,
                result = :result,
                earning_loss = :earningloss,
                   bet_won_lost = :betwonlost,
                      result_status = :resultstatus
                      
                WHERE id = :id";

        $pdostm = $db->prepare($sql);

        $pdostm->bindParam(':amount', $amount);
        $pdostm->bindParam(':betmovie',$bet_movie);
        $pdostm->bindParam(':bettype',$bettype);
        $pdostm->bindParam(':result',$result);
        $pdostm->bindParam(':earningloss',$earningloss);
        $pdostm->bindParam(':betwonlost',$betwonlost);
        $pdostm->bindParam(':resultstatus',$resultstatus);
        $pdostm->bindParam(':id', $id);

        $count = $pdostm->execute();
        return $count;
    }

    public function deleteBet($id, $db){
        $sql = "DELETE FROM place_bets WHERE id= :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }

    public function searchBet($db, $str){
        $sql = "SELECT * FROM place_bets WHERE amount = :str";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':str', $str);
        $bets = $pdostm->setFetchMode(\PDO::FETCH_OBJ);
        $pdostm->execute();

        return $bets;
    }


    public function  listPlaceBetsOngoingStatusByUserId ($id,$db){
        $sql = "SELECT movies.title, movies.release_date, movies.movie_background, current_bets.id,current_bets.bet_close_date,current_bets.bet_status FROM current_bets  inner JOIN movies ON movies.id = current_bets.movie_id where current_bets.id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
    

}
