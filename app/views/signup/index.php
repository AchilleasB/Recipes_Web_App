<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
        <div class="signup-container">
            <div class="container fluid mt-4">
                <h1 class="header mb-5 "> Sign up</h1>
                <?php
                if (isset($_SESSION['errorMessage'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errorMessage'] . '</div>';
                    unset($_SESSION['errorMessage']);
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="inputEmail" name="email"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" id="inputPassword" name="password" class="form-control"
                            aria-describedby="passwordHelpBlock">
                        <div id="passwordHelpBlock" class="form-text">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not
                            contain spaces,
                            special
                            characters, or emoji.
                        </div>
                    </div>
                    <button href="/login" type="submit" class="btn btn-primary mt-4 mb-3">Submit</button>
                </form>
            </div>
        </div>
    </main>
    <?php
    include __DIR__ . '/../footer.php';
    ?>