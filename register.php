<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'login');

    $stmt = $con->prepare("INSERT INTO users (id, name, email, password) VALUES (NULL, ?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Contact Records Inserted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register Page</title>
</head>

<body class="bg-info-subtle">
    <div class="d-flex align-self-end mt-2">
        <div class="container">
            <div class="row d-flex justify-content-center  border border-info-subtle rounded-pill bg-white mt-5 pb-2">
                <div class="d-flex justify-content-center mt-3">
                    <h3 style="font-style: italic;">Register Page</h3>
                </div>
                <div class="col-6 mt-3">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm your Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill">Register</button>
                        <p class="p-0 mt-1">Access your account <a href="index.php"> Clicking Here!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>