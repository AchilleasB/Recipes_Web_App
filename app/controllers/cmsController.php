<?php

require_once __DIR__ . '/controller.php';
require __DIR__ . '/../services/recipeService.php';
require __DIR__ . '/../services/userService.php';

class CmsController extends Controller {

    private $recipeService;
    private $userService;

    function __construct() {
        $this->recipeService = new RecipeService();
        $this->userService = new UserService();
    }
    
    public function index(){ 
        $this->displayView($this);
    }
    
}