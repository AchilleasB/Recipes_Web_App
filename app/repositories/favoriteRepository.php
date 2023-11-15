<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/favorite.php';
require __DIR__ . '/../models/recipe.php';

class FavoriteRepository extends Repository
{
    public function getAllFavoriteRecipesData(){
        try {
            $stmt = $this->connection->prepare("SELECT id, user_id, recipe_id FROM favorites");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Favorite');
            $favorites = $stmt->fetchAll();

            return $favorites;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getFavoriteRecipe($recipe_id){
        try {
            $stmt = $this->connection->prepare("SELECT id, title, ingredients, instructions, creator, prep_time, image_path, category_id FROM recipes WHERE id = :recipe_id");
            $stmt->execute([
                'recipe_id' => $recipe_id
            ]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Recipe');
            $recipes = $stmt->fetchAll();

            return $recipes;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public  function getLoggedInUserFavoriteRecipesId($loggedInUserId){
        try {
            $stmt = $this->connection->prepare("SELECT recipe_id FROM favorites WHERE user_id = :user_id");
            $stmt->execute([
                'user_id' => $loggedInUserId
            ]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Favorite');
            $favorites = $stmt->fetchAll();

            return $favorites;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function addToFavorites(Favorite $favorite){
        try {
            $stmt = $this->connection->prepare("INSERT INTO favorites (user_id, recipe_id) VALUES (:user_id, :recipe_id)");
            $stmt->execute([
                'user_id' => $favorite->getUserId(),
                'recipe_id' => $favorite->getRecipeId()
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e;
        }

    } 

    public function removeFromFavorites(Favorite $favorite){
        try {
            $stmt = $this->connection->prepare("DELETE FROM favorites WHERE user_id = :user_id AND recipe_id = :recipe_id");
            $stmt->execute([
                'user_id' => $favorite->getUserId(),
                'recipe_id' => $favorite->getRecipeId()
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e;
        }
    }
}