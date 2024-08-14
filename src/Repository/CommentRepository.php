<?php

namespace App\Repository;

use App\Model\Comment;
use App\Util\Database;

/**
 * Class CommentRepository
 * Handles operations related to the Comment entity.
 */
class CommentRepository {
	private $db;

	public function __construct( Database $db ) {
		$this->db = $db;
	}

	public function findAll() {
		$stmt = $this->db->getPdo()->query( 'SELECT * FROM comment' );
		$rows = $stmt->fetchAll( \PDO::FETCH_ASSOC );

		$comments = [];
		foreach ( $rows as $row ) {
			$comments[] = new Comment( $row['id'], $row['body'], $row['created_at'], $row['news_id'] );
		}

		return $comments;
	}

	public function add( Comment $comment ) {
		$stmt = $this->db->getPdo()->prepare( 'INSERT INTO comment (body, created_at, news_id) VALUES (:body, :created_at, :news_id)' );
		$stmt->execute( [
			':body'       => $comment->getBody(),
			':created_at' => $comment->getCreatedAt(),
			':news_id'    => $comment->getNewsId(),
		] );

		return $this->db->getPdo()->lastInsertId();
	}

	public function delete( $id ) {
		$stmt = $this->db->getPdo()->prepare( 'DELETE FROM comment WHERE id = :id' );
		$stmt->execute( [ ':id' => $id ] );

		return $stmt->rowCount();
	}
}
