<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "admin";
    
    // Create connection
    $conn1 = new mysqli($servername1, $username1, $password1, $dbname1);
    $id = (isset($_GET["id"]))?$_GET["id"]:"";
    $sql = "delete from user where id='".$id."'";
    if ($conn1->query($sql) === TRUE) {
        header("location:user.php");
      } else {
        echo "Error deleting record: " . $conn->error;
      }
    
    ?>
</body>
</html>