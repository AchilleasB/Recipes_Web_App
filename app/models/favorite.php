<?php
class Favorite implements jsonSerializable
{
	private $id;
	private $user_id;
	private $recipe_id;

    public function getId(){
      return $this->id;
    }

    public function getUserId(){
      return $this->user_id;

    }

    public function getRecipeId(){
      return $this->recipe_id;
    }

    public function setId($id){
      $this->id = $id;
    }

    public function setUserId($user_id){  
      $this->user_id = $user_id;
    }

    public function setRecipeId($recipe_id){  
        $this->recipe_id = $recipe_id;
    }

    public function jsonSerialize(): mixed
    {
        return [
          // 'id' => $this -> id,
          'user_id' => $this -> user_id,
          'recipe_id' => $this -> recipe_id
        ];
    }
}