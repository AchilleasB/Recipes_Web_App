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

    public function getLoggedInUserFavoriteRecipesId($loggedInUserId)
    {
        return $this->favoriteRepository->getLoggedInUserFavoriteRecipesId($loggedInUserId);
    }

    public function getUserFavoriteRecipes($favorites)
    {
        $recipes = array();
        foreach ($favorites as $favorite) {
            $recipeId = $favorite->getRecipeId();
            $recipe = $this->favoriteRepository->getFavoriteRecipe($recipeId);
            if ($recipe) {
                array_push($recipes, $recipe);
            }
        }
        return $recipes;
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

