<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('config/dbconnect.php');
    $username = $_POST["email"];
    $password = $_POST["password"];
    $sql = "Select * from farmer where email='$username' ";
    $result = mysqli_query($conn, $sql);
    // $farmer = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $row['farmer_id'];
                header("location: farmer_dashboard.php");
            } else {
                $showError = "Invalid Credentials";
            }
        }
    }
    // if ($num == 1) {
    //     $login = true;
    //     session_start();
    //     $_SESSION['loggedin'] = true;
    //     $_SESSION['username'] = $username;
    //     $_SESSION['id'] = $farmer['farmer_id'];
    //     header("location: farmer_dashboard.php");
    // } 
    else {
        $showError = "Invalid Credentials";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
<div class="container-fluid py-3 mx-auto bg-light">

    <?php if ($login) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }
    if ($showError) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?php echo $showError ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </button>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col">
            <div class="w-50 mx-auto rounded bg-success bg-opacity-10 border border-success p-4">
                <h2 class="text-center fs-1 fw-bold font-monospace mb-3 text-success-emphasis">LOGIN</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="mt-2">
                        <!-- <label class="form-label" for="email">Email Id</label> -->
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email id"><br>
                    </div>
                    <div class="mt-2">
                        <!-- <label class=" form-label" for="password">Password</label> -->
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"><br>
                    </div>
                    <div class="my-2 d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="login" value="login" class="btn btn-success my-2">Login</button>
                    </div>
                </form>

                <p class="text-center text-secondary-emphasis">Doesn't have account <a href=" register.php">Register</a> here. </p>
            </div>
        </div>
    </div>
</div>
<?php include('templates/footer.php') ?>

</html>