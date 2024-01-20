<?php
require __DIR__ . '/../repositories/categoryRepository.php';

class CategoryService
{

    private $categoryRepository;

    function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

}
