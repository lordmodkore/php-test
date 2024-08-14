<?php
namespace App\Service;

use App\Repository\CommentRepository;
use App\Model\Comment;
use App\Util\Database;

/**
 * Class CommentService
 * Provides business logic related to comments.
 */
class CommentService
{
	private $repository;

	public function __construct(CommentRepository $repository)
	{
		$this->repository = $repository;
	}

	public function listComments()
	{
		return $this->repository->findAll();
	}

	public function addComment($body, $newsId)
	{
		$comment = new \App\Model\Comment(null, $body, date('Y-m-d'), $newsId);
		return $this->repository->add($comment);
	}

	public function deleteComment($id)
	{
		return $this->repository->delete($id);
	}
}
