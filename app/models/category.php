<?php
class Category
{

	private $id;
	private $title;
	private $description;
	private $image_path;

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function setImagePath($image_path)
	{
		$this->image_path = $image_path;
	}

	public function getImagePath()
	{
		return $this->image_path;
	}


}

?>