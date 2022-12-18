<?php
session_start();
if (isset($_SESSION['USER'])) {
    $user = $_SESSION['USER'];
}
if (isset($_POST["doimk"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $email = (isset($_POST["email"])) ? $_POST["email"] : "";
    $matkhau = (isset($_POST["matkhau"])) ? $_POST["matkhau"] : "";
    $matkhaucu = (isset($_POST["matkhaucu"])) ? $_POST["matkhaucu"] : "";
    $matkhaunl = (isset($_POST["matkhaunl"])) ? $_POST["matkhaunl"] : "";

    if ($matkhau == "" || $matkhaunl == "") {
        echo '<script> alert("Vui lòng nhập đầy đủ thông tin! "); </script>';
    } else {

        if ($matkhau != $matkhaunl) {
            echo '<script> alert("Mật khẩu nhập lại sai! "); </script>';
        } else {
            $sqlloi = "select * from user where email ='" . $email . "' and password ='" . $matkhaucu . "'";
            $resultloi = $conn->query($sqlloi);
            if ($resultloi->num_rows > 0) {
                $sql = "UPDATE user SET password='$matkhau' WHERE email='" . $email . "'";

                if ($conn->query($sql) === TRUE) {
                    echo '<script> alert("Đổi thành công!"); </script>';
                    
                    header('Location: login.php');
                    die();
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo '<script> alert("Sai mật khẩu cũ!"); </script>';
            }
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> MOWO - MOTO WORLD </title>
    <link href="../CSS/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../JS/scripts.js"></script>
</head>
<style>
    .cachtren {
        margin-top: 100px;
    }
</style>

<body class="bg-primary " style="background-image: url('http://maxmoto.com.vn/wp-content/uploads/2019/12/21MY_Ninja_ZX-10R_GN1_action_11.jpg');">

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4"> <strong> ĐỔI MẬT KHẨU </strong> </h3>
                                </div>
                                <div class="card-body">

                                    <form action="" method='post'>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value='<?= $user['email'] ?>'>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mật khẩu cũ</label>
                                            <input name="matkhaucu" type="password" class="form-control" id="exampleInputPassword1" placeholder="Vui lòng nhập mật khẩu cũ">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mật khẩu</label>
                                            <input name="matkhau" type="password" class="form-control" id="exampleInputPassword1" placeholder="Vui lòng nhập mật khẩu mới">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mật khẩu nhập lại</label>
                                            <input name="matkhaunl" type="password" class="form-control" id="exampleInputPassword1" placeholder="Vui lòng nhập lại mật khẩu mới">
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" type="submit" name="doimk" value="Xác Nhận">
                                            <a class="small" href="./login.php"> Đăng nhập ?</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutAuthentication_footer " style="opacity: 0.8;">
            <footer class="py-4 bg-dark mt-auto ">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"> Copyright &copy; MOWO - MOTO WORLD 2021 </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>

</html>