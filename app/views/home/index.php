<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php
    // if (!isset($_SESSION['categories'])) {
    //     $_SESSION['categories'] = array();
    // }
    
    include __DIR__ . '/../header.php';

    ?>
    <main>
        <div class="container-fluid bg-yellow-light" id="wrapper">
            <div class="container fluid mt-4">
                <div class="bg-yellow-light ">
                    <div class="home-title">
                        <h2 class="text-center">Cool recipes created by famous chefs</h2>
                        <p class="text-center mt-2 mb-5">Delicious dishes to easily cook at home for family and friends
                        </p>
                    </div>
                    <div class="search-form">
                        <form class="d-flex" role="search" action="/recipe/ingredient" method="post">
                            <div class="row g-2 form-group">
                                <input class="form-control" type="search" name="ingredient"
                                    placeholder="Choose your preferred ingredient" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container fluid mb-5" id="categories">
                <div class="row gap-3">
                    <?php foreach ($model as $category) {
                        $_SESSION['categories'][$category->getId()] = $category->getTitle(); ?>
                        <div class="col">
                            <div class="card">
                                <img src="<?= ucfirst($category->getImagePath()) ?>" class="card-img-top"
                                    alt="Some image related to food">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $category->getTitle() ?>
                                    </h5>
                                    <p class="card-text">
                                        <?= $category->getDescription() ?>
                                    </p>
                                    <a href="/recipe/<?= $category->getTitle() ?>" class="btn btn-primary"
                                        id="view-btn">View</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <?php
    include __DIR__ . '/../footer.php';
    ?>