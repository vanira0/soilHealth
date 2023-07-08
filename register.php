<?php
include('config/dbconnect.php');
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farmer_name = $_POST['farmer_name'];
    $phone_no = $_POST["phone_no"];
    $email = $_POST["email"];
    $house_no = $_POST["house_no"];
    $village = $_POST["village"];
    $district = $_POST["district"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $existSql = "SELECT * FROM farmer WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError = "Username/Email Already Exists";
    } else {
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO farmer ( farmer_name, phone_no, email,house_no,village,district,state,pincode,password) VALUES ('$farmer_name','$phone_no','$email','$house_no','$village','$district','$state','$pincode','$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("location: login.php");
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
}

?>

<!DOCTYPE html>

<html>

<?php include('templates/header.php') ?>
<div class="bg-light container-fluid py-4">
    <?php
    if ($showAlert) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

            </button>
        </div>
    <?php }
    if ($showError) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col">
            <div class="w-50 mx-auto rounded bg-success bg-opacity-10 border border-success p-4">
                <h2 class="text-center fs-1 fw-bold font-monospace mb-3 text-success-emphasis border-2 border-bottom">FARMER'S REGISTRATION FORM</h2>
                <form action="register.php" method="post">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="mt-2 w-75 mx-auto">
                        <label for="farmer_name" class="form-label">Your name:</label>
                        <input type="text" class="form-control" name="farmer_name" id="farmer_name" placeholder="name" require>
                    </div>
                    <div class="mt-3 w-75 mx-auto">
                        <p class="fw-bold mb-0 text-center bg-success bg-opacity-25 rounded fs-5">Contact Details</p>
                        <div class="mt-2">
                            <label for="phone_no" class="form-label">Your Phone Number:</label>
                            <input type="tel" class="form-control" name="phone_no" id="phone_no" placeholder="phone number" require>
                        </div>
                        <div class="mt-2">
                            <label for=" email" class="form-label">Your Email id:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email id" require>
                            <div id="emailHelp" class="form-text">Your Email Id is your username.</div>
                        </div>
                    </div>
                    <div class="my-3 w-75 mx-auto">
                        <p class="fw-bold mb-0 text-center bg-success bg-opacity-25 rounded fs-5">Address Details</p>
                        <div class="mt-2">
                            <label for="house_no" class="form-label">House number:</label>
                            <input type="number" class="form-control" name="house_no" id="house_no" placeholder="House number">
                        </div>
                        <div class="mt-2">
                            <label for="village" class="form-label">Village:</label>
                            <input type="text" class="form-control" name="village" id="village" placeholder="Village">
                        </div>
                        <div class="mt-2">
                            <label for="district" class="form-label">District:</label>
                            <input type="text" class="form-control" name="district" id="district" placeholder="District">
                        </div>
                        <div class="mt-2">
                            <label for="state" class="form-label">State:</label>
                            <input type="text" class="form-control" name="state" id="state" placeholder="State">
                        </div>
                        <div class="mt-2">
                            <label for="pincode" class="form-label">Pincode:</label>
                            <input type="number" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
                        </div>
                    </div>
                    <div class="mt-2 w-75 mx-auto">
                        <p class="fw-bold mb-0 text-center bg-success bg-opacity-25 rounded fs-5">Set Password</p>
                        <div class="mt-2">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mt-2">
                            <label for="cpassword" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword">
                        </div>
                    </div>
                    <div class="my-4 d-grid gap-2 col-6 mx-auto">
                        <input type="submit" name="submit" class="btn btn-success" value="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('templates/footer.php') ?>

</html>