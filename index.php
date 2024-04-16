<?php
include('conection.php');


if (isset($_POST['email']) || isset($_POST['password'])) {
    if (strlen($_POST['email']) == 0) {
        echo "Put your email, please!";
    } else if (strlen($_POST['password']) == 0) {
        echo "Put your password, please!";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);

        $sql_code = "SELECT * FROM users WHERE email = '$email' AND password ='$password'";
        $sql_query = $mysqli->query($sql_code) or die("Error connecting to SQL: " . $mysqli->error);

        $quantity = $sql_query->num_rows;

        if ($quantity == 1) {

            $user = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header("Location: home.php");
        } else {
            echo 'Account not found! Email or password is wrong! Are you sure you are registered??';
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body class="bg-warning">
    <div class="d-flex align-self-end mt-5">
        <div class="container">
            <div class="row d-flex justify-content-center  border border-warning rounded-pill bg-white mt-5 pb-4">
                <div class="d-flex justify-content-center mt-5">
                    <h3 style="font-style: italic;">Login Page</h3>
                </div>
                <div class="col-6 mt-3">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill mt-3">Submit</button>
                        <p class="p-0 mt-1">If you are not registered: <a href="register.php"> Click Here!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>