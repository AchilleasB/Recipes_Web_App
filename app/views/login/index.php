
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles.css">
</head>

<body>
<?php
include __DIR__ . '/../header.php';
?>
<div class="login-container">
    <div class="container fluid mt-4 high-full mb-5">
        <h1 class="header mb-5 ">Log in</h1>
        <?php
            if (isset($_SESSION['errorMessage'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errorMessage'] . '</div>';
                unset($_SESSION['errorMessage']);
            }

            if (isset($_SESSION['successMessage'])) {
                echo '<div class="alert alert-success" id="successMessage" role="alert">' . $_SESSION['successMessage'] . '</div>';
                unset($_SESSION['successMessage']);
            }
            ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control"
                    aria-describedby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces,
                    special characters, or emoji.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            document.getElementById('successMessage').style.display = 'none';
        }, 2000);
    });
</script>


<?php
include __DIR__ . '/../footer.php';
?>