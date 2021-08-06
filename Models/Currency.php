<?php
namespace BettingRUs\Models;
class Currency{
	public function updateWallet($id,$money, $targetToken,$db){
		$sql = "UPDATE wallet SET token = :targetToken, canadian_dollars = :money WHERE id = :id ";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':targetToken',$targetToken);
		$pdostm->bindParam(':money',$money);
		$pdostm->bindParam(':id',$id);

		$count = $pdostm ->execute();
		return $count;
	}

	public function updateWalletReverse($id,$targetMoney, $token ,$db){
		$sql = "UPDATE wallet SET token = :token , canadian_dollars = :targetMoney WHERE id = :id ";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':token',$token);
		$pdostm->bindParam(':targetMoney',$targetMoney);
		$pdostm->bindParam(':id',$id);

		$count = $pdostm ->execute();
		return $count;
	}

	public function selectedWallet($id,$db){
		$sql="SELECT token, canadian_dollars FROM wallet WHERE id = :id";
		$pdostm = $db->prepare($sql);
		$pdostm->bindParam(':id',$id);
		$pdostm->execute();
		$count = $pdostm->fetch(\PDO::FETCH_OBJ);
		return $count;
	}
}