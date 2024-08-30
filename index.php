<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AL salam Hospital</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/JannaLTRegular.css">
</head>

<body>
    <div class="main">
        <div class="logo">
            <img src="image/logo.png" alt="loading">
            <h2>مستشفى السلام</h2>
        </div>
        <div class="book">
            <p>اهلا بيك فى المستشفى يا مريض</p>
            <form action="index.php" method="post">
                <input type="text" placeholder="enter name" name="name">
                <input type="email" placeholder="enter email" name="email">
                <input type="date" name="date">
                <input type="submit" value="احجز يا تعبان" name="send">
            </form>
            <?php
            // connect to database
            $dbName = "hospital";
            $connection = mysqli_connect('localhost', 'root', '', $dbName);

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userName = $_POST['name'];
                $userEmail = $_POST['email'];
                $userDate = $_POST['date'];
                $userSend = $_POST['send'];
                if ($userSend) {
                    $query = "INSERT INTO patients(name,email,date)VALUES('$userName','$userEmail','$userDate')";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        echo "<p style='color:green'>تم الحجز بشكل صحيح</p>";
                    } else {
                        echo "<p style='color:red'>حدثت مشكلة أثناء الحجز، حاول مرة أخرى</p>";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>