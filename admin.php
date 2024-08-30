<?php
include("header.php");
?>

<table>
    <tr>
        <th>الرقم</th>
        <th>اسم المريض</th>
        <th>البريد الالكترونى</th>
        <th>التاريخ</th>
    </tr>

    <?php
    $dbName = "hospital";
    $connection = mysqli_connect('localhost', 'root', '', $dbName);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["deleteAll"])) {
        $query = "DELETE FROM patients";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<p style='color:green'>All records deleted successfully.</p>";
        } else {
            echo "<p style='color:red'>Error: " . mysqli_error($connection) . "</p>";
        }
    }

    $query = "SELECT * FROM patients";
    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
    ?>

    <div class="button-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="submit" value="Delete All" name="deleteAll">
        </form>
    </div>
</table>