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
        public function addUser($username, $firstname, $lastname, $email, $password, $membership, $dob, $db) {
            $query = "INSERT INTO users (username, firstname, lastname, email, user_password, membership, date_of_birth, user_since) VALUES (:username, :firstname, :lastname, :email, :user_password, :membership, :dob, NOW())";
            $pdostm = $db->prepare($query);

            $pdostm->bindParam(':username', $username);
            $pdostm->bindParam(':firstname', $firstname);
            $pdostm->bindParam(':lastname', $lastname);
            $pdostm->bindParam(':email', $email);
            $pdostm->bindParam(':user_password', $password);
            $pdostm->bindParam(':membership', $membership);
            $pdostm->bindParam(':dob', $dob);

            $count = $pdostm->execute();

            return $count;
        }

        // Update a User within the database
        public function updateUser($id, $username, $firstname, $lastname, $email, $password, $dob, $db) {
            $query = "UPDATE users SET username = :username, firstname = :firstname, lastname = :lastname, email = :email, user_password = :user_password, date_of_birth = :dob WHERE id = :id";

            $pdostm = $db->prepare($query);

            $pdostm->bindParam(':username', $username);
            $pdostm->bindParam(':firstname', $firstname);
            $pdostm->bindParam(':lastname', $lastname);
            $pdostm->bindParam(':email', $email);
            $pdostm->bindParam(':user_password', $password);
            $pdostm->bindPara(':dob', $dob);
            $pdostm->bindParam(':id', $id);

            $count = $pdostm->execute();
            return $count;
        }

        // Delete a User from the database
        public function deleteUser($id, $db) {
            $query = "DELETE FROM users WHERE id = :id";

            $pdostm = $db->prepare($query);
            $pdostm->bindParam(":id", $id);

            $count = $pdostm->execute();

            return $count;
        }
    }