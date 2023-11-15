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

            $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
            $ingredients = isset($_POST['ingredients']) ? htmlspecialchars($_POST['ingredients']) : '';
            $instructions = isset($_POST['instructions']) ? htmlspecialchars($_POST['instructions']) : '';
            $creator = isset($_POST['creator']) ? htmlspecialchars($_POST['creator']) : '';
            $prep_time = isset($_POST['prep_time']) ? htmlspecialchars($_POST['prep_time']) : '';
            $category_id = isset($_POST['category_id']) ? htmlspecialchars((int) $_POST['category_id']) : 0;

            $uploadedImage = $_FILES['image'];
            $image_path = '/../images/' . basename($uploadedImage['name']);

            move_uploaded_file($uploadedImage['tmp_name'], 'images/' . $uploadedImage['name']);

            $recipe = new Recipe();
            $recipe->setTitle($title);
            $recipe->setIngredients($ingredients);
            $recipe->setInstructions($instructions);
            $recipe->setCreator($creator);
            $recipe->setPrepTime($prep_time);
            $recipe->setImagePath($image_path);
            $recipe->setCategoryId($category_id);

            $this->recipeService->addRecipe($recipe);
            $cmsMessage = 'New recipe added';
            $_SESSION['message'] = $cmsMessage;
            header('Content-Type: application/json');
            echo json_encode(['message' => $cmsMessage]);
        }
    }

    public function editRecipe()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = isset($_POST['id']) ? htmlspecialchars((int) $_POST['id']) : null;
            $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
            $ingredients = isset($_POST['ingredients']) ? htmlspecialchars($_POST['ingredients']) : '';
            $instructions = isset($_POST['instructions']) ? htmlspecialchars($_POST['instructions']) : '';
            $creator = isset($_POST['creator']) ? htmlspecialchars($_POST['creator']) : '';
            $prep_time = isset($_POST['prep_time']) ? htmlspecialchars($_POST['prep_time']) : '';
            $category_id = isset($_POST['category_id']) ? htmlspecialchars((int) $_POST['category_id']) : 0;
            $image_path = isset($_POST['image_path']) ? htmlspecialchars($_POST['image_path']) : '';

            $uploadedImage = $_FILES['image'];
            if (!empty($uploadedImage['name'])) {
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

            $this->recipeService->editRecipe($recipe);

            $cmsMessage = 'Recipe updated';
            $_SESSION['message'] = $cmsMessage;
            header('Content-Type: application/json');
            echo json_encode(['message' => $cmsMessage]);

        }
    }

    public function deleteRecipe($recipe_id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $this->recipeService->deleteRecipe($recipe_id);

            header('Content-Type: application/json');
            echo json_encode(['success' => 'Recipe deleted']);
        }
    }
}    
?>