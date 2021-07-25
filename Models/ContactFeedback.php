<?php
namespace BettingRUs\Models;
class ContactFeedback {
public function addContactFeedback($firstname, $lastname,$email,$contactNumber,$enquiry,$message, $db)
{
$sql = "INSERT INTO contact_feedbacks (first_name, last_name,email,contact_number,enquiry_type,message)
VALUES (:firstname, :lastname, :email,:contactNumber,:enquiry,:message) ";
$pst = $db->prepare($sql);

$pst->bindParam(':firstname', $firstname);
$pst->bindParam(':lastname', $lastname);
$pst->bindParam(':email', $email);
$pst->bindParam(':contactNumber', $contactNumber);
$pst->bindParam(':enquiry', $enquiry);
$pst->bindParam(':message', $message);

$count = $pst->execute();
return $count;
}



    public function getAllContactFeedback($dbcon){
    $sql = "SELECT * FROM contact_feedbacks";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $contactfeedback = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $contactfeedback;
    }


    public function deleteContactFeedback($id, $db){
        $sql = "DELETE FROM contact_feedbacks WHERE id = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;

    }
    public function getContactFeedbackById($id, $db){
        $sql = "SELECT * FROM contact_feedbacks where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }


    public function updateContactFeedback ($id, $firstname, $lastname,$email,$contactNumber,$enquiry,$message,$status, $db){
        $sql = "UPDATE contact_feedbacks
                SET first_name = :firstname,
                last_name = :lastname,
                email = :email,
                contact_number = :contactNumber,
                enquiry_type = :enquiry,
                message = :message,
               status = :status
               WHERE id = :id
        
        ";

        $pst =  $db->prepare($sql);

        $pst->bindParam(':firstname', $firstname);
        $pst->bindParam(':lastname', $lastname);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':contactNumber', $contactNumber);
        $pst->bindParam(':enquiry', $enquiry);
        $pst->bindParam(':message', $message);
        $pst->bindParam(':status', $status);
        $pst->bindParam(':id', $id);


        $count = $pst->execute();

        return $count;
    }

}