<?php

namespace App\Util;

use \PDO; // Use the global PDO class
use \PDOException;

/**
 * Class Database
 * Handles database connections.
 */
class Database {
	private $pdo;

	public function __construct() {
		$dsn      = $_ENV['DB_DSN'];
		$user     = $_ENV['DB_USER'];
		$password = $_ENV['DB_PASSWORD'];

		try {
			$this->pdo = new PDO( $dsn, $user, $password );
			$this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			throw new \RuntimeException( 'Database connection failed: ' . $e->getMessage() );
		}
	}

	public function getPdo() {
		return $this->pdo;
	}
}
