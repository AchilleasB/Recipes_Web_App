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

            if (isset($_SESSION['user_id'])){
                $loggedInUserId = $_SESSION['user_id'];
            }else{
                $_SESSION['errorMessage'] = 'You need to log in first.';
                header('Location: /login');
                exit();  
            }

            $favorites = $this->favoriteService->getLoggedInUserFavoriteRecipesId($loggedInUserId);
            
            $recipes = $this->favoriteService->getUserFavoriteRecipes($favorites);
            
            header('Content-Type: application/json');
            echo json_encode($recipes);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $body = file_get_contents('php://input');
            $object = json_decode($body);

            if ($object === null && json_last_error() !== JSON_ERROR_NONE) {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Invalid JSON']);
                return;
            }

            $favorite = new Favorite();
            $favorite->setRecipeId(htmlspecialchars($object->recipe_id));
            $favorite->setUserId(htmlspecialchars($object->user_id));

            $success = $this->favoriteService->addToFavorites($favorite);

            if ($success) {
                http_response_code(200);
                echo json_encode(array("message" => "Recipe added to favorites successfully"));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Failed to add recipe to favorites"));
            }
            
        }

        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $body = file_get_contents('php://input');
            $object = json_decode($body);

            if ($object === null && json_last_error() !== JSON_ERROR_NONE) {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Invalid JSON']);
                return;
            }

            $favorite = new Favorite();
            $favorite->setRecipeId(htmlspecialchars($object->recipe_id));
            $favorite->setUserId(htmlspecialchars($object->user_id));

            $success = $this->favoriteService->removeFromFavorites($favorite);

            if ($success) {
                http_response_code(200);
                echo json_encode(array("message" => "Recipe removed from favorites successfully"));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Failed to remove recipe from favorites"));
            }
        }
    }

}