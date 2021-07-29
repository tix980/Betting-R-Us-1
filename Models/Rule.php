<?php


namespace BettingRUs\Models;


class Rule
{
    public function getAllRules($db) {
        $sql = "SELECT * FROM rules";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        $rules = $pdostm->fetchAll(\PDO::FETCH_ASSOC);
        return $rules;
    }

    public function getRuleWithId($id, $db){
        $sql = "SELECT * FROM rules where id = :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();

        $rules = $pdostm->fetch(\PDO::FETCH_OBJ);
        return $rules;
    }

    public function addRule($rule,  $db){
        $sql = "INSERT INTO rules(rule) values (:rule)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':rule', $rule);

        $count = $pdostm->execute();
        return $count;
    }

    public function updateRule($id, $rule,  $db){
        $sql = "UPDATE rules SET 
                rule = :rule
                WHERE id = :id";

        $pdostm = $db->prepare($sql);

        $pdostm->bindParam(':rule', $rule);
        $pdostm->bindParam(':id', $id);

        $count = $pdostm->execute();
        return $count;
    }

    public function deleteRule($id, $db){
        $sql = "DELETE FROM rules WHERE id= :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }

    public function searchRule($db, $str){
        $sql = "SELECT * FROM rules WHERE rule = :str";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':str', $str);
        $rules = $pdostm->setFetchMode(\PDO::FETCH_OBJ);
        $pdostm->execute();

        return $rules;
    }
}