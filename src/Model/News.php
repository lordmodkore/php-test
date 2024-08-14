<?php

namespace App\Model;

/**
 * Class News
 * Represents a news entity.
 */
class News {
	private $id;
	private $title;
	private $body;
	private $createdAt;

	public function __construct( $id = null, $title = '', $body = '', $createdAt = null ) {
		$this->id        = $id;
		$this->title     = $title;
		$this->body      = $body;
		$this->createdAt = $createdAt;
	}

	// Getters and setters...

	public function getId() {
		return $this->id;
	}

	public function setId( $id ) {
		$this->id = $id;

		return $this;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle( $title ) {
		$this->title = $title;

		return $this;
	}

	public function getBody() {
		return $this->body;
	}

	public function setBody( $body ) {
		$this->body = $body;

		return $this;
	}

	public function getCreatedAt() {
		return $this->createdAt;
	}

	public function setCreatedAt( $createdAt ) {
		$this->createdAt = $createdAt;

		return $this;
	}
}
