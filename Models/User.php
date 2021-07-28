<?php 
    namespace BettingRUs\Models;

    class User {
        // Retrieve all Users from the database
        public function getAllUsers($db) {
            $query = "SELECT * FROM users";
            $pdostm = $db->prepare($query);
            $pdostm->execute();

            $users = $pdostm->FetchAll(\PDO::FETCH_OBJ);

            return $users;
        }

        // Find a User by id
        public function getUserID($id, $db) {
            $query = "SELECT * FROM users WHERE id = :id";
            $pdostm = $db->prepare($query);

            $pdostm->bindParam(":id", $id);
            $pdostm->execute();
            
            return $pdostm->fetch(\PDO::FETCH_OBJ);
        }

        // Add a User to the database
        public function addUser($username, $firstname, $lastname, $email, $password, $dob, $user_since, $db) {
            $query = "INSERT INTO users (username, firstname, lastname, email, password, date_of_birth, user_since) VALUES (:username, :firstname, :lastname, :email, :password, :dob, :user_since)";
            $pdostm = $db->prepare($query);

            $pdostm->bindParam(':username', $username);
            $pdostm->bindParam(':firstname', $firstname);
            $pdostm->bindParam(':lastname', $lastname);
            $pdostm->bindParam(':email', $email);
            $pdostm->bindParam(':password', $password);
            $pdostm->bindParam(':dob', $dob);
            $pdostm->bindParam(':user_since', $user_since);

            $count = $pdostm->execute();

            return $count;
        }

        // Update a User within the database

        // Delete a User from the database
    }