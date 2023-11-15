<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles.css">
</head>

<body>
  <?php
  include __DIR__ . '/../header.php';
  ?>
  <main>
    <div class="recipes-parent-container">
      <div class="container-fluid bg-yellow-light" id="recipes">
        <h3 class="text-center mt-5 mb-5">Meat</h3>
      </div>
    </div>
  </main>

  <script type="module" src="../js/recipe/index.js"></script>

  <?php
  include __DIR__ . '/../footer.php';
  ?>