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

    function addCategory($category)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INSERT INTO categories (title, description, image_path) VALUES (:title, :description, :image_path");
            $stmt->execute([
                'title' => $category['title'],
                'description' => $category['description'],
                'image_path' => $category['image_path']
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e;
        }

    }

    function deleteCategory($category)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM category WHERE id = :id");
            $stmt->execute([
                'id' => $category['id']
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e;
        }

    }
}

?>