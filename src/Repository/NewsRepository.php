<?php
namespace App\Repository;

use App\Model\News;
use App\Util\Database;

/**
 * Class NewsRepository
 * Handles operations related to the News entity.
 */
class NewsRepository
{
	private $db;

	public function __construct(Database $db)
	{
		$this->db = $db;
	}

	public function findAll()
	{
		$stmt = $this->db->getPdo()->query('SELECT * FROM news');
		$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		$news = [];
		foreach ($rows as $row) {
			$news[] = new News($row['id'], $row['title'], $row['body'], $row['created_at']);
		}

		return $news;
	}

	public function add(News $news)
	{
		$stmt = $this->db->getPdo()->prepare('INSERT INTO news (title, body, created_at) VALUES (:title, :body, :created_at)');
		$stmt->execute([
			':title' => $news->getTitle(),
			':body' => $news->getBody(),
			':created_at' => $news->getCreatedAt(),
		]);

		return $this->db->getPdo()->lastInsertId();
	}

	public function delete($id)
	{
		// Delete associated comments
		$commentRepo = new CommentRepository($this->db);
		$comments = $commentRepo->findAll();

		foreach ($comments as $comment) {
			if ($comment->getNewsId() == $id) {
				$commentRepo->delete($comment->getId());
			}
		}

		$stmt = $this->db->getPdo()->prepare('DELETE FROM news WHERE id = :id');
		$stmt->execute([':id' => $id]);

		return $stmt->rowCount();
	}
}
