<?php 
class DB {

	private static function connect() {
		$pdo = new PDO('mysql:host=localhost;dbname=dashboard;charset=utf8', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public static function query($query, $params = array()) {
		$statement = self::connect()->prepare($query);
		$statement->execute($params);

		if (explode(' ', $query)[0] == 'SELECT' ) {
			$data = $statement->fetchAll();
			return $data;
		}
	}

	public static function create() {

		$sql = "CREATE TABLE IF NOT EXISTS `bookmarks` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(255) NOT NULL,
			`url` varchar(255) NOT NULL,
			`logo_path` varchar(255) DEFAULT NULL,
			`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1";
		self::connect()->exec($sql);

		$sql = "CREATE TABLE IF NOT EXISTS `cryptos` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`cmc_id` int(11) NOT NULL,
			`amount` int(11) NOT NULL,
			`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";
		self::connect()->exec($sql);

		$sql = "CREATE TABLE IF NOT EXISTS `todos` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`title` varchar(255) NOT NULL,
			`description` text,
			`priority` tinyint(1) NOT NULL DEFAULT '1',
			`done` tinyint(1) NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1";
		self::connect()->exec($sql);

		echo 'succesfully created DB';
	}

} 
?>