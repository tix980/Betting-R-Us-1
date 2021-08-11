<?php
namespace BettingRUs\Models;

class Donation
{

    public function addDonation($donation_amount, $cc_number, $cc_name, $cc_code, $cc_expiry_month, $cc_expiry_year, $phone_number,
                                $email, $charity, $db)
{
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

}