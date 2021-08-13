<?php
namespace BettingRUs\Models;

class Donation{

    public function getAllDonations($db) {
        $sql = "SELECT * FROM donations";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        $donations = $pdostm->fetchAll(\PDO::FETCH_ASSOC);
        return $donations;
    }

    public function getDonationWithId($id, $db){
        $sql = "SELECT * FROM donations where id = :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();

        $donations = $pdostm->fetch(\PDO::FETCH_OBJ);
        return $donations;
    }

    public function updateDonation($id, $donation_amount, $cc_number, $cc_name, $cc_code, $cc_expiry_month, $cc_expiry_year, $email,
    $phone_number, $charity, $db){
        $sql = "UPDATE donations SET 
                donation_amount = :donation_amount,
                cc_number = :cc_number,
                cc_name = :cc_name,
                cc_code = :cc_code,
                cc_expiry_month = :cc_expiry_month,
                cc_expiry_year = :cc_expiry_year,
                email = :email,
                phone_number = :phone_number,
                charity = :charity
                WHERE id = :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':donation_amount', $donation_amount);
        $pdostm->bindParam(':cc_number', $cc_number);
        $pdostm->bindParam(':cc_name', $cc_name);
        $pdostm->bindParam(':cc_code', $cc_code);
        $pdostm->bindParam(':cc_expiry_month', $cc_expiry_month);
        $pdostm->bindParam(':cc_expiry_year', $cc_expiry_year);
        $pdostm->bindParam(':email', $email);
        $pdostm->bindParam(':phone_number', $phone_number);
        $pdostm->bindParam(':charity', $charity);
        $pdostm->bindParam(':id', $id);

        $count = $pdostm->execute();
        return $count;
    }


    public function addDonation($donation_amount, $cc_number, $cc_name, $cc_code, $cc_expiry_month, $cc_expiry_year, $phone_number,
                                $email, $charity, $db){
        $sql = "INSERT INTO donations(donation_amount, cc_number, cc_name, cc_code, cc_expiry_month, cc_expiry_year, phone_number,
                      email, charity) values (:donation_amount, :cc_number, :cc_name, :cc_code,
        :cc_expiry_month, :cc_expiry_year, :phone_number, :email, :charity)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':donation_amount', $donation_amount);
        $pdostm->bindParam(':cc_number', $cc_number);
        $pdostm->bindParam(':cc_name', $cc_name);
        $pdostm->bindParam(':cc_code', $cc_code);
        $pdostm->bindParam(':cc_expiry_month', $cc_expiry_month);
        $pdostm->bindParam(':cc_expiry_year', $cc_expiry_year);
        $pdostm->bindParam(':phone_number', $phone_number);
        $pdostm->bindParam(':email', $email);
        $pdostm->bindParam(':charity', $charity);


        $count = $pdostm->execute();
        return $count;

    }

    public function deleteDonation($id, $db){
        $sql = "DELETE FROM donations WHERE id= :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;

    }


}