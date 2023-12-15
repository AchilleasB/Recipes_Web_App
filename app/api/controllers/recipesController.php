<?php
require __DIR__ . '/../../services/recipeService.php';

class RecipesController
{
    private $recipeService;

    function __construct()
    {
        $this->recipeService = new RecipeService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $recipes = $this->recipeService->getAllRecipes();
            header('Content-Type: application/json');
            echo json_encode($recipes);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
            $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
            $ingredients = isset($_POST['ingredients']) ? htmlspecialchars($_POST['ingredients']) : '';
            $instructions = isset($_POST['instructions']) ? htmlspecialchars($_POST['instructions']) : '';
            $creator = isset($_POST['creator']) ? htmlspecialchars($_POST['creator']) : '';
            $prep_time = isset($_POST['prep_time']) ? htmlspecialchars($_POST['prep_time']) : '';
            $image_path = isset($_POST['image_path']) ? htmlspecialchars($_POST['image_path']) : '';
            $category_id = isset($_POST['category_id']) ? (int) $_POST['category_id'] : 0;

            if (!empty($_FILES['image']['name'])) {
                $uploadedImage = $_FILES['image'];
                $image_path = '/../images/' . basename($uploadedImage['name']);
                move_uploaded_file($uploadedImage['tmp_name'], 'images/' . $uploadedImage['name']);
            }

            $recipe = new Recipe();
            $recipe->setId($id);
            $recipe->setTitle($title);
            $recipe->setIngredients($ingredients);
            $recipe->setInstructions($instructions);
            $recipe->setCreator($creator);
            $recipe->setPrepTime($prep_time);
            $recipe->setImagePath($image_path);
            $recipe->setCategoryId($category_id);

            if ($id === 0) {
                if ($this->recipeService->addRecipe($recipe)) {
                    $message = $recipe->getTitle() . ' was added successfully';
                } else {
                    $message = $recipe->getTitle() . ' was not added';
                }
            } else {
                if ($this->recipeService->editRecipe($recipe)) {
                    $message = $recipe->getTitle() . ' was updated successfully';
                } else {
                    $message = $recipe->getTitle() . ' was not updated';
                }
            }

            header('Content-Type: application/json');
            echo json_encode(['message' => $message]);

        }

        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $body = file_get_contents('php://input');
            $object = json_decode($body);

            if ($this->recipeService->deleteRecipe($object->id)) {
                $message = $object->title . ' was deleted';
            } else {
                $message = $object->title . ' was not deleted';
            }

            header('Content-Type: application/json');
            echo json_encode(['message' => $message]);
        }
    }

}
?>