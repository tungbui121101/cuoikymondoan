<!DOCTYPE html>
<?php session_start(); ?>

<?php
if ($_SESSION['user'] == '') {
    header('Location: login.php');
}
?>
<?php
require_once('../db/dbhelper.php');
if (isset($_POST["btnTim"])) {    
    $tim = (isset($_POST["tim"])) ? $_POST["tim"] : "";
    $sqldonhang = "SELECT * FROM donhang where ten like '%" . $tim . "%'";
} else {
    $sqldonhang = "SELECT * FROM donhang";
}

?>

<html lang="vi">

<head>
    <meta charset="UTF-8" />
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
    </nav>

    <!--Menu-->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"> DANH MỤC </div>
                        <a class="nav-link collapsed" href="product.jsp" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
                                $index = 1;
                                foreach ($categoryList as $item) {
                                    echo '<a class="nav-link" href="product.php?tenhang=' . $item['tenhang'] . '">' . $item['tenhang'] . '</a>';
                                }
                                ?>
                            </nav>
                        </div>

                        <a class="nav-link" href="category.php">
                            <div class="sb-nav-link-icon"> <i class="fas fa-warehouse"> </i></div>
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
                    if (isset($_SESSION['']) && $_SESSION[''] != NULL) {
                        echo $_SESSION[''];
                    }
                    ?>
                </div>
            </nav>
        </div>

        <!--Content-->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4"> ĐƠN HÀNG
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="admin.php"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active">
                            QUẢN LÝ ĐƠN HÀNG
                        </li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-shopping-cart"></i>
                            Dữ liệu đơn hàng
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
                                <table class="table table-bordered " id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> Chức năng </th>
                                            <th> ID </th>
                                            <th> ID_User </th>
                                            <th> Tên </th>
                                            <th> Tổng tiền </th>
                                            <th> Số điện thoại </th>
                                            <th> Email </th>
                                            <th> Địa chỉ </th>
                                            <th> Ghi chú </th>
                                            <th> Trạng thái</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php                                        
                                        // lấy dữ liệu hãng ra
                                                                              
                                        $donhangList = executeResult($sqldonhang);
                                        foreach ($donhangList as $item) {
                                            echo '<tr>
                                                        <td> 
                                                            <div class="btn-group">
                                                                <div class="btn-group" >                            
                                                                    <form method="post" action="xoadonhang.php">                                                                    
                                                                        <input value="' . $item['id'] . '" type="hidden" name="id" id="id">
                                                                        <button class="btn btn-primary" name="xoa" id="xoa"> Xóa  &emsp;</button>                                                                                                                                        
                                                                    </form >    
                                                                </div>
                                                                &emsp;
                                                                <div class="btn-group">
                                                                    <form action="./giohang.php" method="post" >                                                                    
                                                                        <input value="' . $item['id'] . '" type="hidden" name="id" id="id">
                                                                        <button class="btn btn-primary"  name="sanpham" id=""> Sản Phẩm </button>                                                                    
                                                                    </form>  
                                                                </div>
                                                            </div>
                                                        </td> 
                                                        <td>' . $item['id'] . '</td>
                                                        <td>' . $item['id_user'] . '</td>  
                                                        <td>' . $item['ten'] . '</td>  
                                                        <td>' . $item['tongtien'] . '</td>
                                                        <td>' . $item['sdt'] . '</td>
                                                        <td>' . $item['email'] . '</td>  
                                                        <td>' . $item['diachi'] . '</td>  
                                                        <td>' . $item['ghichu'] . '</td> 
                                                        ';
                                            if ($item['trangthai'] == 0) {
                                                echo '<td>Chưa xử lý</td>';
                                            } else {
                                                echo '<td>Hoàn Thành</td>';
                                            }
                                            echo '                                                     
                                                        
                                                  </tr>';
                                        }
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
                        <div class="text-muted"> Copyright &copy; MOWO - MOTO WORLD 2021 </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>