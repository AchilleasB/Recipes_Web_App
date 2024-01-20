<?php

require_once __DIR__ . '/controller.php';
require __DIR__ . '/../services/categoryService.php';

class HomeController extends Controller
{
    private $categoryService;

    function __construct()
    {
        $this->categoryService = new CategoryService();
    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        $this->displayView($categories);
    }

}
