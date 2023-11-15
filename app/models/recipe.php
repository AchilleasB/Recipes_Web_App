<?php
class Recipe implements jsonSerializable
{
	private $id;
	private $title;
	private $ingredients;
	private $instructions;
	private $creator;
	private $prep_time;
	private $image_path;
	private $category_id;

	public function getId(): int
	{
		return $this->id;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getIngredients(): string
	{
		return $this->ingredients;
	}

	public function getInstructions(): string
	{
		return $this->instructions;
	}

	public function getCreator(): string
	{
		return $this->creator;
	}

	public function getPrepTime(): string
	{
		return $this->prep_time;
	}

	public function getImagePath(): string
	{
		return $this->image_path;
	}

	public function getCategoryId(): int
	{
		return $this->category_id;
	}

	public function setId(int $id): void
	{
		$this->id = $id;
	}

	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	public function setIngredients(string $ingredients): void
	{
		$this->ingredients = $ingredients;
	}

	public function setInstructions(string $instructions): void
	{
		$this->instructions = $instructions;
	}

	public function setCreator(string $creator): void
	{
		$this->creator = $creator;
	}

	public function setPrepTime(string $prep_time): void
	{
		$this->prep_time = $prep_time;
	}

	public function setImagePath(string $image_path): void
	{
		$this->image_path = $image_path;
	}

	public function setCategoryId(int $category_id): void
	{
		$this->category_id = $category_id;
	}

	public function jsonSerialize(): mixed
	{

		return [
			'id' => $this->id,	
			'title' => $this->title,
			'ingredients' => $this->ingredients,
			'instructions' => $this->instructions,
			'creator' => $this->creator,
			'prep_time' => $this->prep_time,
			'image_path' => $this->image_path,
			'category_id' => $this->category_id
		];
	}

}

?>