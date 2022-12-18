
<?php

if (isset( $_POST['dangky'])) {
    $taikhoan = (isset($_POST['username'])) ? $_POST['username'] : "";
    $matkhau = (isset($_POST['password'])) ? $_POST['password'] : "";
    $matkhaulai = (isset($_POST['nhaplai'])) ? $_POST['nhaplai'] : "";
    $email = (isset($_POST['email'])) ? $_POST['email'] : "";

    if ($taikhoan === "" || $matkhau === "" || $matkhaulai === "" || $email === "") {
        echo '<script> alert("Vui lòng nhập đầy đủ thông tin đăng kí! "); </script>';
    } else {
        // die();
        $servername1 = "localhost";
        $username1 = "root";
        $password1 = "";
        $dbname1 = "admin";

        // Create connection
        $conn1 = new mysqli($servername1, $username1, $password1, $dbname1);
        // Check connection
        $sqlloi = 'select * from user where email = "'.$email.'" ';
        $resultloi = $conn1->query($sqlloi);
        if ($resultloi->num_rows > 0) {
            echo '<script> alert("Tài khoản đã tồn tại! "); </script>';
            header("location: dangky.php");
        } else {
            $sqlloi1 = "select * from user where email ='" . $email . "'";
            $resultloi1 = $conn1->query($sqlloi1);
            if ($resultloi1->num_rows > 0) {
                echo '<script> alert("Gmail này đã được sử dụng! "); </script>';
            } else {
                if ($matkhau != $matkhaulai) {
                    echo '<script> alert("Mật khẩu không trùng! "); </script>';
                } else {
                    $sql = "INSERT INTO user ( username, password, email) VALUES ('$taikhoan','$matkhau','$email')";
                    mysqli_query($conn1, $sql);
                    echo '<script> alert("Đăng kí thành công! "); </script>';
                    header("location: login.php");
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MOWO - MOTO WORLD </title>
    <link href="../CSS/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../JS/scripts.js"></script>
</head>

<body>
    <div id="layoutAuthentication" style="background-image: url('http://maxmoto.com.vn/wp-content/uploads/2019/12/21MY_Ninja_ZX-10R_GN1_action_11.jpg');">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4"> <strong> ĐĂNG KÝ </strong> </h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="./dangky.php">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress"> FULL NAME </label>
                                            <input class="form-control py-4" id="username" name="username" type="text" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress"> EMAIL </label>
                                            <input class="form-control py-4" id="email" name="email" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword"> PASSWORD </label>
                                            <input class="form-control py-4" id="password" name="password" type="password" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword"> CONFIRM </label>
                                            <input class="form-control py-4" id="password" name="nhaplai" type="password" />
                                        </div>

                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" name="dangky" type="submit" value="Đăng ký">
                                            <a class="small" href="#"> Quên mật khẩu ?</a>
                                        </div>
                                        <div>
                                            <p class="Login_dontHaveAcc__pjOMZ">Bạn đã có tài khoản ?
                                                <a href="./login.php">Đăng nhập</a>
                                            </p>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutAuthentication_footer " style="opacity: 0.8;" >
            <footer class="py-4 bg-dark mt-auto ">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"> Copyright &copy; MOWO - MOTO WORLD 2021 </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- <form action="" method='post'>
        <table>
            <tr>
                <td>Tên tài khoản</td>
                <td><input type="text" name="taikhoan"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="matkhau"></td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu</td>
                <td><input type="password" name="nhaplai"></td>
            </tr>
            <tr>
                <td>Gmail</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td colspan='2'><input type="submit" value="Đăng kí" name="dangki"></td>
            </tr>
        </table>
    </form> -->
</body>

</html>