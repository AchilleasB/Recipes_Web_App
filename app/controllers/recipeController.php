<?php
require __DIR__ . '/../services/recipeService.php';
require __DIR__ . '/controller.php';

class RecipeController extends Controller
{
    private $recipeService;

    function __construct()
    {
        $this->recipeService = new RecipeService();
    }

    public function salads()
    {
        $this->displayView($this);
    }

    public function pasta()
    {
        $this->displayView($this);
    }

    public function meat()
    {
        $this->displayView($this);
    }

    public function fish()
    {
        $this->displayView($this);
    }
    public function desserts()
    {
        $this->displayView($this);
    }
  
    public function favorites()
    {
        $this->displayView($this);
    }

    public function ingredient()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ingredient'])){
            $ingredient = htmlspecialchars($_POST['ingredient']);
            $_SESSION['ingredient'] = $ingredient;
            $recipes = $this->recipeService->getRecipesByIngredient($ingredient);
        }

        $this->displayView($recipes);
        
    }

}
?>