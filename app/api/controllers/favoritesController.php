<?php
require __DIR__ . '/../../services/favoriteService.php';


class FavoritesController
{
    private $favoriteService;

    function __construct()
    {
        $this->favoriteService = new FavoriteService();
    }

    public function index()
    {
        $loggedInUserId = null;

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            if (isset($_SESSION['user_id'])) {
                $loggedInUserId = $_SESSION['user_id'];
            } else {
                $_SESSION['errorMessage'] = 'You need to log in first.';
                header('Location: /login');
                exit();
            }

            // recipe id and user id are fields in favorites database table 
            // access the favorites data using the user id and get the recipe data using the recipe id
            $favorites = $this->favoriteService->getFavoriteRecipesId($loggedInUserId);
            $recipes = $this->favoriteService->getUserFavoriteRecipes($favorites);

            header('Content-Type: application/json');
            echo json_encode($recipes);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->handleRequest('POST');
        }

        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $this->handleRequest('DELETE');
        }
    }

    public function handleRequest($request_type)
    {
        $body = file_get_contents('php://input');
        $object = json_decode($body);

        if ($object === null && json_last_error() !== JSON_ERROR_NONE) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Invalid JSON']);
            return;
        }

        $favorite = new Favorite();
        $favorite->setRecipeId($object->recipe_id);
        $favorite->setUserId($object->user_id);

        if ($request_type == 'POST') {
            if (!$this->favoriteService->existsInFavorites($favorite)) {
                $this->favoriteService->addToFavorites($favorite);
                $message = 'Recipe was added to favorites';
            }else{
                $message = 'Recipe already exists in favorites';
            }
        }

        if ($request_type == 'DELETE') {
            $this->favoriteService->removeFromFavorites($favorite);
            $message = 'Recipe was removed from favorites';
        }
        header('Content-Type: application/json');
        echo json_encode(['message' => $message ]);
    }

}