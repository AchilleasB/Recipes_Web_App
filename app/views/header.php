<?php

$user_name = null;
if (isset($_SESSION['user_name'])) {
  $user_name = $_SESSION['user_name'];
}

$user_id = null;
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $href = '/recipe/favorites';
} else {
  $href = '/login';
}

// var_dump($user_name);
// var_dump($user_id);
?>

<script>
  var loggedInUserId = <?php echo json_encode($user_id); ?>; 
</script>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="/../icons/recipes_book.svg" alt="Icon of a recipes book" id="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <div class="nav-left-side">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/"><i class="fa-solid fa-house"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= $href ?>"><i class="fa-solid fa-heart"></i> My
              recipes</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" aria-current="page" role="button" data-bs-toggle="dropdown"
              aria-expanded="false"><i class="fa-solid fa-list"></i>
              Categories
            </a>
            <ul class="dropdown-menu" id="category">
              <?php
              if (isset($_SESSION['categories'])) {
                foreach ($_SESSION['categories'] as $categoryId => $categoryTitle) {
                  echo '<li><a class="dropdown-item" href="/recipe/' . $categoryTitle . '">' . $categoryTitle . '</a></li>';
                }
              }
              ?>
            </ul>
          </li>
        </ul>
      </div>
      <div class="nav-right-side">
        <ul class="navbar-nav">
          <?php if (!isset($user_name)) { ?>
            <li class="nav-item">
              <a class="nav-link" href="/login"><i class="fa-solid fa-right-to-bracket"></i> Log in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/signup"><i class="fa-solid fa-user-plus"></i> Sign up</a>
            </li>
          <?php } else { ?>
            <li class="nav-item ">
              <a class="nav-link" href="/recipe/favorites"><i class="fa-solid fa-user"></i>
                <?= $user_name ?>
              </a>
            </li>
            <?php if ($_SESSION['user_role'] == 'admin') { ?>
              <li class="nav-item">
                <a class="nav-link" href="/cms"><i class="fa-solid fa-clipboard"></i> CMS</a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="/login/logout"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>

  </div>
</nav>
<!-- end of navbar -->