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

        // /Find a User's friends
        public function getUserFriends($id, $db) {
            $query = "SELECT u.username FROM users u LEFT JOIN users_friends uf ON u.id = uf.friend_id WHERE uf.user_id = :id";
            $pdostm = $db->prepare($query);

            $pdostm->bindParam(":id", $id);
            $pdostm->execute();

            $friends = $pdostm->fetchAll(\PDO::FETCH_OBJ);

            return $friends;
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
        public function addUser($username, $firstname, $lastname, $email, $password, $dob, $db) {
            $query = "INSERT INTO users (username, firstname, lastname, email, user_password, date_of_birth, user_since) VALUES (:username, :firstname, :lastname, :email, :user_password, :dob, NOW())";
            $pdostm = $db->prepare($query);

            $pdostm->bindParam(':username', $username);
            $pdostm->bindParam(':firstname', $firstname);
            $pdostm->bindParam(':lastname', $lastname);
            $pdostm->bindParam(':email', $email);
            $pdostm->bindParam(':user_password', $password);
            $pdostm->bindParam(':dob', $dob);

            $count = $pdostm->execute();

            return $count;
        }

        // Update a User within the database
        public function updateUser($id, $username, $firstname, $lastname, $email, $dob, $db) {
            $query = "UPDATE users 
                     SET username = :username, 
                     firstname = :firstname, 
                     lastname = :lastname, 
                     email = :email,  
                     date_of_birth = :dob 
                     WHERE id = :id";

            $pdostm = $db->prepare($query);

            $pdostm->bindParam(':username', $username);
            $pdostm->bindParam(':firstname', $firstname);
            $pdostm->bindParam(':lastname', $lastname);
            $pdostm->bindParam(':email', $email);
            $pdostm->bindParam(':dob', $dob);
            $pdostm->bindParam(':id', $id);

            $count = $pdostm->execute();
            return $count;
        }
        public function updateMembership($id, $member,$expiry, $db) {
            $query = "UPDATE users 
                     SET membership = :member,
                         member_validity = :expiry
                      WHERE id = :id";
            $pdostm = $db->prepare($query);

            $pdostm->bindParam(':member', $member);
            $pdostm->bindParam(':expiry', $expiry);
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

        //Add a wallet
			public function createWallet($money,$token,$id,$db){
				$sql = "INSERT INTO wallet(token,canadian_dollars,user_id) VALUES(:token,:money,:id)";
				$pdostm = $db ->prepare($sql);
				$pdostm->bindParam(':money',$money);
				$pdostm->bindParam(':token',$token);
				$pdostm->bindParam(':id',$id);

				$count = $pdostm ->execute();
				return $count;
			}

			// Find last user id
			public function getLastUserID($db) {
				$query = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
				$pdostm = $db->prepare($query);
				$pdostm->execute();

				return $pdostm->fetch(\PDO::FETCH_OBJ);
			}



    }