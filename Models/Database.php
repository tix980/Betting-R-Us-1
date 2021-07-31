<?php

namespace BettingRUs\Models;
class Database{
	private static $user ='sSvxnR4pIY';
	private static $password = 'X6pf4eYSUa';
	private static $dsn ='mysql:host=remotemysql.com:3306;dbname=sSvxnR4pIY';
	private static $db;

	private function __construct()
	{
	}

	public static function getDb()
	{
		if (!isset(self::$db)) {
			try {
				self::$db = new \PDO(self::$dsn, self::$user, self::$password);
				self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				self::$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
			} catch (\PDOException $e) {
				$msg = $e->getMessage();
				echo "Something went wrong!";
				exit();
			}
		}
		return self::$db;
	}
}