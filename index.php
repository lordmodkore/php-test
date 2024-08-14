<?php

use Dotenv\Dotenv;
use App\Service\NewsService;
use App\Service\CommentService;
use App\Util\Database;

// Load environment variables
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__ . '/config');
$dotenv->load();

// Initialize the database connection
$database = new Database();

// Initialize services
$newsService = new NewsService(new \App\Repository\NewsRepository($database));
$commentService = new CommentService(new \App\Repository\CommentRepository($database));

// Display news and comments
foreach ($newsService->listNews() as $news) {
	echo("############ NEWS " . $news->getTitle() . " ############\n");
	echo($news->getBody() . "\n");
	foreach ($commentService->listComments() as $comment) {
		if ($comment->getNewsId() == $news->getId()) {
			echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
		}
	}
}

// Example: listing comments using CommentService
//$comments = $commentService->listComments();
