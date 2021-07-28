<?php
namespace BettingRUs\Models;

class Faq{

    public function getAllFaqs($db) {
        $sql = "SELECT * FROM faqs";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        $faqs = $pdostm->fetchAll(\PDO::FETCH_ASSOC);
        return $faqs;
    }

    public function getFaqWithId($id, $db){
        $sql = "SELECT * FROM faqs where id = :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();

        $faqs = $pdostm->fetch(\PDO::FETCH_OBJ);
        return $faqs;
    }

    public function addFaq($question, $answer, $db){
        $sql = "INSERT INTO faqs(question, answer) values (:question, :answer)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':question', $question);
        $pdostm->bindParam(':answer', $answer);

        $count = $pdostm->execute();
        return $count;
    }

    public function updateFaq($id, $question, $answer, $db){
        $sql = "UPDATE faqs SET 
                question = :question,
                answer = :answer
                WHERE id = :id";

        $pdostm = $db->prepare($sql);

        $pdostm->bindParam(':question', $question);
        $pdostm->bindParam(':answer', $answer);
        $pdostm->bindParam(':id', $id);

        $count = $pdostm->execute();
        return $count;
    }

    public function deleteFaq($id, $db){
        $sql = "DELETE FROM faqs WHERE id= :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }

    public function searchFaq($db, $str){
        $sql = "SELECT * FROM faqs WHERE question = :str";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':str', $str);
        $count = $pdostm->execute();

        return $count;
    }
}