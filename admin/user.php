<?php session_start(); ?>
<?php
if ($_SESSION['user'] == '') {
    header('Location: login.php');
}
?>

<?php
require_once('../db/dbhelper.php');
           
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> MOWO - MOTO WORLD </title>
    <link href="../CSS/styles_1.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../JS/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../JS/datatables-demo.js"></script>


</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!--Logo-->
        <a class="navbar-brand" href="admin.php"> Moto World </a>

        <!--Logout-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"> Đổi mật khẩu </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"> Đăng xuất </a>
                    </div>
                </li>
            </ul>
        </form>

        <!--Menu-->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"> DANH MỤC </div>
                        <a class="nav-link collapsed" href="product.jsp?id=1" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-motorcycle"></i></div>
                            SẢN PHẨM
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <?php
                                // lấy dữ liệu hãng ra
                                $sql = 'select * from hang';
                                $categoryList = executeResult($sql);
                                foreach ($categoryList as $item) {
                                    echo '<a class="nav-link" href="product.php?tenhang=' . $item['tenhang'] . '">' . $item['tenhang'] . '</a>';
                                }
                                ?>
                            </nav>
                        </div>

                        <a class="nav-link" href="category.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            HÃNG XE
                        </a>

                        <a class="nav-link" href="donhang.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            ĐƠN HÀNG
                        </a>

                        <a class="nav-link" href="user.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            KHÁCH HÀNG
                        </a>
                    </div>
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    //nếu có session tên dangnhap thì ta thực hiện lệnh dưới
                    if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {
                        echo $_SESSION['user'];
                    }
                    ?>
                </div>
            </nav>
        </div>

        <!--Content-->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4"> THÔNG TIN KHÁCH HÀNG
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="admin.php"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active">
                            QUẢN LÝ KHÁCH HÀNG
                        </li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-motorcycle"></i>
                            Dữ liệu tài khoản khách hàng
                            &emsp; &emsp;
                            
                        </div>
                        <div class="md-form mt-4" >
                            <form action="" method="post" style="display: flex;">
                            &emsp; &emsp;
                            <input class="form-control" name="tim" style="width: 25%;" type="text" placeholder="Search" name="btnTim" aria-label="Search">
                            &emsp; &emsp;
                            <input type="submit" class="btn btn-outline-primary" name="btnTim" value="Tìm kiếm">
                            </form>
                            
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_User</th>
                                            <th>Tên tài khoản</th>
                                            <th>Mật khẩu</th>
                                            <th>Gmail</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $servername1 = "localhost";
                                        $username1 = "root";
                                        $password1 = "";
                                        $dbname1 = "admin";

                                        // Create connection
                                        $conn1 = new mysqli($servername1, $username1, $password1, $dbname1);

                                        // $sql = "SELECT * FROM user";
                                        if (isset($_POST["btnTim"])) {
                                            $tim = (isset($_POST["tim"])) ? $_POST["tim"] : "";
                                            $sql = "SELECT * FROM user where username like '%" . $tim . "%'";
                                        } else {
                                            $sql = "SELECT * FROM user";
                                        } 
                                        $result1 = $conn1->query($sql);

                                        if ($result1->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result1->fetch_assoc()) {
                                        ?>
                                                <tr>
                                                    <td><?= $row["id"] ?></td>
                                                    <td><?= $row["username"] ?></td>
                                                    <td><?= $row["password"] ?></td>
                                                    <td><?= $row["email"] ?></td>
                                                    <td><a class="btn btn-info" href="xoauser.php?id=<?= $row["id"] ?>">Xóa</a></td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        $conn1->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"> Copyright &copy; MOWO - MOTO WORLD 2020 </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>