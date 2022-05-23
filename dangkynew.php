<?php

include 'ketnoi.php';

error_reporting(0);

session_start();

if (isset($_POST['dangky'])) {
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $xacnhanmk = $_POST['xacnhanmatkhau'];
    $sdt = $_POST['sdt'];
    $ketqua = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM khachhang WHERE email = '$email'OR SDT = '$sdt'"));

    if ($matkhau !== $xacnhanmk) {
        echo "<script>alert('Mật khẩu không khớp')</script>";
    } elseif ($ketqua > 0) {
        echo "<script>alert('Tài khoản đã tồn tại')</script>";
    } else {
        $sql = "INSERT INTO khachhang (Ten, MatKhau, Email, SDT)
                VALUES ('$ten', '$matkhau', '$email', '$sdt')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Đăng ký thành công')</script>";
            echo '<script>window.location.href="dangnhapnew.php"</script>';
        } else {
            echo "<script>alert('Đăng ký thất bại')</script>";           
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
    <link rel="stylesheet" href="./CSS/style-homeuser-2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Đăng Ký</title>
    <style>
        .next-log-in-p {
            margin-top: 8px;
            font-size: 1.6rem;
            color: black;
            display: inline-block;
        }
        .next-log-in-a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 1.6rem;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html {
            color: #333;
            font-size: 62.5%;
            font-family: "Open Sans", sans-serif;
        }
        .form {
        width: 540px;
        min-height: 100px;
        padding: 32px 24px;
        text-align: center;
        background: #fff;
        border-radius: 2px;
        margin: 24px;
        align-self: center;
        box-shadow: 0 2px 5px 0 rgba(51, 62, 73, 0.1);
        }
        .form .heading {
        font-size: 2rem;
        }
        .form .desc {
        text-align: center;
        color: #636d77;
        font-size: 1.6rem;
        font-weight: lighter;
        line-height: 2.4rem;
        margin-top: 16px;
        font-weight: 300;
        }

        .form-group {
        display: flex;
        margin-bottom: 16px;
        flex-direction: column;
        }

        .form-label,
        .form-message {
        text-align: left;
        }

        .form-label {
        font-weight: 700;
        padding-bottom: 6px;
        line-height: 1.8rem;
        font-size: 1.4rem;
        }

        .form-control {
        height: 40px;
        padding: 8px 12px;
        border: 1px solid #b3b3b3;
        border-radius: 3px;
        outline: none;
        font-size: 1.4rem;
        }

        .form-control:hover {
        border-color: #1dbfaf;
        }

        .form-group.invalid .form-control {
        border-color: #f33a58;
        }

        .form-group.invalid .form-message {
        color: #f33a58;
        }

        .form-message {
        font-size: 1.2rem;
        line-height: 1.6rem;
        padding: 4px 0 0;
        }

        .form-submit {
        outline: none;
        background-color: var(--primary-color);
        margin-top: 12px;
        padding: 12px 16px;
        font-weight: 600;
        color: #fff;
        border: none;
        width: 100%;
        font-size: 14px;
        border-radius: 8px;
        cursor: pointer;
        }

        .form-submit:hover {
        background-color: #1ac7b6;
        }

        .spacer {
        margin-top: 36px;
        }

        .header-log-up {
            width: 1200px;
            margin: 0 auto;
            max-width: 100%;
            position: relative;
        }
        .header-log-up--head {
            display: inline-block;
            font-size: 3rem;
            margin-bottom: 0px;
            margin-left: 10px;
        }
        .body-log-in {
            background-color: #ff5722;
            margin-top: 30px;
            height: 662px;
        }
        .body-log-in-img {
            position: relative;
            height: 200px;
            width: 400px;
            margin: auto;
        }
        .body-log-in-img>img {
            position: absolute;
            top: 15%;
            margin-left: 91px;
        }
        .body-log-in-p {
            margin-top: 150px;
            font-size: 3.5rem;
            color: var(--white-color);
        }
        .logo-S {
            margin-top: -177px;
        }
    </style>    
</head>
<body>
    <header class="header-log-up mt">
        <img src="https://www.sporter.vn/wp-content/uploads/2017/05/logo.png" alt="">
        <h1 class="header-log-up--head">Đăng ký</h1>
    </header>

    <div class="body-log-in ">
        <div class="header-log-up row">
            <div class="col body-log-in-img ">
                <img class="logo-S" src="https://apprecs.org/gp/images/app-icons/300/03/com.shopee.vn.jpg" alt="">
                <p class = "body-log-in-p">Quần áo thể thao chính hãng</p>
            </div>
            <div class="col">
                <form action="" method="POST" class="form" id="form-1">
                        <h3 class="heading">ĐĂNG KÝ</h3>

                        <div class="form-group">
                            <label for="fullname" class="form-label">Tên đầy đủ</label>
                            <input id="fullname" name="ten" type="text" placeholder="VD: Nguyễn Văn Nam" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="sdt" class="form-label">Số điện thoại</label>
                            <input id="sdt" name="sdt" type="phone" placeholder="VD: 0345454545" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input id="password" name="matkhau" type="password" placeholder="Nhập mật khẩu" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                            <input id="password_confirmation" name="xacnhanmatkhau" placeholder="Nhập lại mật khẩu" type="password" class="form-control" required>
                        </div>
                        <button type="submit" name="dangky" class="form-submit">Đăng Ký</button>
                        <p class="next-log-in-p" >Bạn đã có tài khoản?</p>
                        <a class="next-log-in-a" href="dangnhapnew.php">Đăng nhập</a>

                </form>
            </div>
        </div>
    </div>

    <!-- VISA -->
    <div class="footer_brand">
    <div class="footer_brand-left" >
        <h3 class="footer_header-col1--h3">SECURE YOUR TRANSACTION</h3>
        <div class="footer_brand-left-image" >
            <img src="./IMG/visa.png" alt="">
            <img src="./IMG/mastercard.png" alt="">
            <img src="./IMG/masetro.png" alt="">
        </div>
    </div>
    <div class="footer_brand-center">
        <h3 class="footer_header-col1--h3">CRETIFICATION</h3>
        <div class="footer_brand-center-image">
            <a href=""><img src="./IMG/ddki.png" alt=""></a>
            <a href=""><img src="./IMG/dma.png" alt=""></a>
        </div>
    </div>
    <div class="footer_brand-right">
        <h3 class="footer_header-col1--h3">FOLLOW US</h3>
        <a href=""><img src="./IMG/ig.png" alt=""></a>
        <a href=""><img src="./IMG/yt.png" alt=""></a>
        <a href=""><img src="./IMG/fb.png" alt=""></a>

    </div>
</div>
    
</body>
</html>