<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Content Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles.css">

</head>

<body>
  <?php
  include __DIR__ . '/../header.php';
  ?>

  <div class="container">
    <h1 class="header mb-5">Content Management System</h1>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
      <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
      <label class="btn btn-outline-primary" for="btnradio1">Recipes</label>

      <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
      <label class="btn btn-outline-primary" for="btnradio2">Users</label>
    </div>
    <div class="container mt-5 mb-5" id="add-recipe-button">
    </div>
    <div class="container mt-5 mb-5" id="add-user-button">
    </div>
    <div class="container-lg" id="add-recipe-form-container">
    </div>
    <div class="container-lg" id="add-user-form-container">
    </div>
    <div class="container-lg" id="items-list">
    </div>
  </div>

  <script src="/../js/cms/index.js"></script>
  <script src="/../js/cms/addRecipe.js"></script>
  <script src="/../js/cms/addUser.js"></script>
  <script src="/../js/cms/editRecipe.js"></script>
  <script src="/../js/cms/editUser.js"></script>
  <script src="/../js/cms/deleteRecipe.js"></script>
  <script src="/../js/cms/deleteUser.js"></script>
  
