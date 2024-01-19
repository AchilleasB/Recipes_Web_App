<?php
require __DIR__ . '/../repositories/favoriteRepository.php';


class FavoriteService
{
    private $favoriteRepository;

    function __construct()
    {
        $this->favoriteRepository = new FavoriteRepository();
    }

    public function getAllFavoriteRecipesData()
    {
        return $this->favoriteRepository->getAllFavoriteRecipesData();
    }

    public function getFavoriteRecipesId($loggedInUserId)
    {
        return $this->favoriteRepository->getFavoriteRecipesId($loggedInUserId);
    }

    public function getUserFavoriteRecipes($favorites)
    {
        $recipes = array();
        foreach ($favorites as $favorite) {
            $recipe_id = $favorite->getRecipeId();
            $recipe = $this->favoriteRepository->getFavoriteRecipe($recipe_id);
            if ($recipe) {
                array_push($recipes, $recipe);
            }
        }
        return $recipes;
    }

    public function getFavRecipeTitle($recipe_id)
    {
        $recipe = $this->favoriteRepository->getFavoriteRecipe($recipe_id);
        return $recipe[0]->getTitle();
    }
    
    public function addToFavorites($favorite)
    {
        return $this->favoriteRepository->addToFavorites($favorite);
    }

    public function removeFromFavorites($favorite)
    {
        return $this->favoriteRepository->removeFromFavorites($favorite);
    }

    public function existsInFavorites($favorite)
    {
        return $this->favoriteRepository->existsInFavorites($favorite);
    }
}

