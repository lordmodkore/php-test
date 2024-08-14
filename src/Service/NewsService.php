<?php
namespace App\Service;

use App\Repository\NewsRepository;
use App\Model\News;
use App\Util\Database;

/**
 * Class NewsService
 * Provides business logic related to news.
 */
class NewsService
{
	private $repository;

	public function __construct(NewsRepository $repository)
	{
		$this->repository = $repository;
	}

	public function listNews()
	{
		return $this->repository->findAll();
	}

	public function addNews($title, $body)
	{
		$news = new News(null, $title, $body, date('Y-m-d'));
		return $this->repository->add($news);
	}

	public function deleteNews($id)
	{
		return $this->repository->delete($id);
	}
}
