<?php
require __DIR__ . '/../repositories/recipeRepository.php';

class RecipeService
{

    private $recipeRepository;

    function __construct()
    {
        $this->recipeRepository = new RecipeRepository();
    }

    public function getAllRecipes()
    {
        return $this->recipeRepository->getAllRecipes();
    }

    public function getRecipeById($recipe_id)
    {
        return $this->recipeRepository->getRecipeById($recipe_id);
    }

    public function addRecipe($recipe)
    {
        return $this->recipeRepository->addRecipe($recipe);
    }

    public function editRecipe($recipe)
    {
        return $this->recipeRepository->editRecipe($recipe);
    }

    public function deleteRecipe($recipe_id)
    {
        return $this->recipeRepository->deleteRecipe($recipe_id);
    }

    public function getRecipesByIngredient($ingredient)
    {
        return $this->recipeRepository->getRecipesByIngredient($ingredient);
    }

}

?>