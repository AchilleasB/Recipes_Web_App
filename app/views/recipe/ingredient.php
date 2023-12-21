<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingredient recipes</title>
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
      <div class="container-fluid bg-yellow-light">
        <h3 class="text-center mt-5 mb-5">Recipes with the preffered ingredient</h3>
        <div class="container d-flex fluid mb-5" id="recipes">
          <div class="row gap-3">
            <?php foreach ($model as $recipe) { ?>
              <div class="col">
                <div class="card">
                  <img src="<?= ucfirst($recipe->getImagePath()) ?>" class="card-img-top"
                    alt="Some image related to food">
                  <div class="card-body">
                    <h5 class="card-title">
                      <?= $recipe->getTitle() ?>
                    </h5>
                    <h5>Ingredients:</h5>
                    <p class="card-text">
                      <?= $recipe->getIngredients() ?>
                    </p>
                    <h5>Instructions:</h5>
                    <p class="card-text">
                      <?= $recipe->getInstructions() ?>
                    </p>
                    <h5>Preparation time:</h5>
                    <p class="card-text">
                      <?= $recipe->getPrepTime() ?>
                    </p>
                    <h5>Creator:</h5>
                    <p class="card-text">
                      <?= $recipe->getCreator() ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include __DIR__ . '/../footer.php';
  ?>