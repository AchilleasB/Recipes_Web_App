<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/category.php';

class CategoryRepository extends Repository
{

    function getAllCategories()
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, title, description, image_path FROM categories");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
            $categories = $stmt->fetchAll();

            return $categories;

        } catch (PDOException $e) {
            echo $e;
        }
    }
}

?>