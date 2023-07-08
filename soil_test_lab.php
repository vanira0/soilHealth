<?php
include('config/dbconnect.php');
$sql = "SELECT * FROM soil_test_lab";
$result = mysqli_query($conn, $sql);
$soil_test_lab = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
// print_r($soil_test_lab);
// Add Search option
?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>

<div class="container-fluid bg-light p-3">

    <div class="container w-75">
        <h1 class="text-center">SOIL TEST LAB</h1>
        <table class="table table-striped">
            <thead>
                <tr class="table-success">
                    <th scope="col">Lab Name</th>
                    <th scope="col">District</th>
                    <th scope="col">State</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($soil_test_lab as $lab) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($lab['lab_name']) ?></td>
                        <td><?php echo htmlspecialchars($lab['district']) ?></td>
                        <td><?php echo htmlspecialchars($lab['state']) ?></td>
                        <td><?php echo htmlspecialchars($lab['email']) ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<?php include('templates/footer.php') ?>

</html>