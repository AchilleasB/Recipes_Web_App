<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/recipe.php';

class RecipeRepository extends Repository
{

    public function getAllRecipes()
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, title, ingredients, instructions, creator, prep_time, image_path, category_id FROM recipes");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Recipe');
            $recipes = $stmt->fetchAll();

            return $recipes;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getRecipeById($recipe_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, title, ingredients, instructions, creator, prep_time, image_path, category_id FROM recipes WHERE id = :id");
            $stmt->execute([
                'id' => $recipe_id
            ]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Recipe');
            $recipe = $stmt->fetch();

            return $recipe;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function addRecipe(Recipe $recipe)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO recipes (title, ingredients, instructions, creator, prep_time, image_path, category_id) VALUES (:title, :ingredients, :instructions, :creator, :prep_time, :image_path, :category_id)");
            $stmt->execute([
                'title' => $recipe->getTitle(),
                'ingredients' => $recipe->getIngredients(),
                'instructions' => $recipe->getInstructions(),
                'creator' => $recipe->getCreator(),
                'prep_time' => $recipe->getPrepTime(),
                'image_path' => $recipe->getImagePath(),
                'category_id' => $recipe->getCategoryId()
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function deleteRecipe($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM recipes WHERE id = :id");
            $stmt->execute([
                'id' => $id
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function editRecipe(Recipe $recipe)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE recipes SET title = :title, ingredients = :ingredients, instructions = :instructions, creator = :creator, prep_time = :prep_time, image_path = :image_path, category_id = :category_id WHERE id = :id");
            $stmt->execute([
                'id' => $recipe->getId(),
                'title' => $recipe->getTitle(),
                'ingredients' => $recipe->getIngredients(),
                'instructions' => $recipe->getInstructions(),
                'creator' => $recipe->getCreator(),
                'prep_time' => $recipe->getPrepTime(),
                'image_path' => $recipe->getImagePath(),
                'category_id' => $recipe->getCategoryId()
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getRecipesByIngredient($ingredient)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, title, ingredients, instructions, creator, prep_time, image_path, category_id FROM recipes WHERE ingredients LIKE :ingredient");
            $stmt->execute([
                'ingredient' => '%' . $ingredient . '%'
            ]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Recipe');
            $recipes = $stmt->fetchAll();

            return $recipes;

        } catch (PDOException $e) {
            echo $e;
        }
    }



}
