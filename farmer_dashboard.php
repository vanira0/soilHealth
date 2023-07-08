<!DOCTYPE html>
<html lang="en">

<?php
include('templates/header.php');
// session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
include('config/dbconnect.php');
$id = $_SESSION['id'];
$sql = "SELECT * FROM farmer WHERE farmer_id = '$id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
$sql = "SELECT * FROM soil_sample WHERE farmer_id = '$id' ";
$result = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_close($conn);
// print_r($row);
// $id = $_SESSION['id'];
?>
<!-- SELECT CustomerName, Address + ', ' + PostalCode + ' ' + City + ', ' + Country AS Address
FROM Customers; -->

<div class="bg-light p-3">
    <div class="container-fluid ">
        <div class="container my-3">
            <div class="container text-white bg-opacity-75 rounded bg-success bg-gradient border-bottom mb-3">
                <h4 class="text-capitalize p-4">Welcome - <?php echo htmlspecialchars($row[0]['farmer_name']) ?></h4>
                <hr>
                <h4 class="pb-4 px-4">Your Id - <?php echo $_SESSION['id']  ?></h4>


            </div>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://images.unsplash.com/photo-1609252509102-aa73ff792667?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase fs-3"><?php echo htmlspecialchars($row[0]['farmer_name']) ?></h5>
                            <p class="card-text">

                            <p class="my-2"><b>Phone number:</b> <?php echo htmlspecialchars($row[0]['phone_no']) ?> </p>
                            <p class="my-2"><b>Email Id: </b> <?php echo htmlspecialchars($row[0]['email']) ?> </p>
                            <p class="my-2"><b>Address: </b><?php echo 'house no.' . htmlspecialchars($row[0]['house_no']) . ', ' . htmlspecialchars($row[0]['village']) . ', ' . htmlspecialchars($row[0]['district']) . ', ' . htmlspecialchars($row[0]['state']) . ', ' . htmlspecialchars($row[0]['pincode']) ?> </p>
                            </p>
                            <p class="card-text"><small class="text-body-secondary"></small></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container text-dark bg-opacity-25 rounded bg-success bg-gradient border-bottom mb-3">
                <p class="text-center fs-1 fw-bold font-monospace mb-3 text-success-emphasis">SOIL SAMPLE</p>

                <table class="table p-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Farm Area</th>
                            <th scope="col">Irrigation Status</th>
                            <th scope="col">khasra Number</th>
                            <th scope="col">Village</th>
                            <th scope="col">District</th>
                            <th scope="col">Date of collection</th>
                        </tr>
                    </thead>
                    <?php foreach ($row2 as $row) { ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo htmlspecialchars($row['sample_id']) ?></th>
                                <td><?php echo htmlspecialchars($row['farm_area']) ?></td>
                                <td><?php echo htmlspecialchars($row['irrigation_status']) ?></td>
                                <td><?php echo htmlspecialchars($row['khasra_no']) ?></td>
                                <td><?php echo htmlspecialchars($row['village']) ?></td>
                                <td><?php echo htmlspecialchars($row['district']) ?></td>
                                <td><?php echo htmlspecialchars($row['date_of_collection']) ?></td>

                            </tr>

                        </tbody>
                    <?php } ?>

                </table>


            </div>
        </div>

    </div>


</div>

</div>

<?php include('templates/footer.php') ?>

</html>