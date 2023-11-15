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

    public function addCategory($category)
    {
        return $this->categoryRepository->addCategory($category);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->deleteCategory($id);
    }


}

?>