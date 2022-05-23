<?php
session_start();
include 'ketnoi.php';
$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];
$IDSP = $_GET['IDSP'];

$sql="select * from sanpham where IDSP='$IDSP'";
$thucthi=mysqli_query($conn,$sql);
$dulieu = mysqli_fetch_array($thucthi);
$IDSP = $dulieu['IDSP'];
$TenSP = $dulieu['TenSP'];
$Gia = $dulieu['Gia'];
$image = $dulieu['Anh'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sporter</title>
    <script type="text/javascript"  src="./jquery-3.6.0.min.js"></script>
    <link rel="icon" href="./IMG/logo_1.jpg" sizes="20x20" type="image/jpg" > 
    <link rel="stylesheet" href="./CSS/style-homeuser-2.css">
    <link rel="stylesheet" href="./CSS/call.css">
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script language="javascript" src="./main.js"></script>
    
    <style>
        :root {
            --white-color: #fff;
            --black-color: #222222;
            --text-color: #333;
        }
        .container-mt-50{
            margin-top: 150px;
        }
        .detail-img {
            position: relative;
            width: 500px;
            height: 500px;
            border: 1px solid #ccc;
        }
        .detail-img img {
            width: 100%;
            background-size: contain;
            background-repeat: no-repeat;
        }
        .detail-body {
            font-size: 1.4rem;
            font
        }
        .home-product-item__sale-off {
            position: absolute;
            top: 0;
            left: 0;
            width: 40px;
            height: 36px;
            background-color: rgba(255, 216, 64, 0.94);
            text-align: center;
        }
        .home-product-item__sale-off::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            border-width: 0 20px 4px;
            border-style: solid;
            color: rgba(255, 216, 64, 0.94);
            border-color: transparent currentColor transparent currentColor;

        }
        .home-product-item__price {
            display: flex;
            align-items: baseline;
            flex-wrap: wrap;
        }
        .home-product-item__price-old {
            font-size: 1.4rem;
            margin-left: 10px;
            color: #666;
            text-decoration: line-through;
        }
        .home-product-item__price-current {
            font-size: 1.6rem;
            color: var(--primary-color);
            margin-left: 10px;

        }
        .form__set-main{
            margin-top: 15px;
        }
        .form__set-label{
            margin-left: 18px;
            margin-right: 5px;
            font-size: 1.6rem;
            font-weight: 500;
        }
        .form__set-date{
            width: 40%;
            margin-left: 18px;
            margin-top: 5px;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #e9e9e9;
            box-shadow: 0 2px 5px 0 rgba(51, 62, 73, 0.1);
        }
        .button1 {
            align-items: center;
            background-color: var(--primary-color);
            color: var(--white-color);
            border-radius: 6px;
            display: flex;
            justify-content: center;
            height: 45px;
            width: 291px;
            border: none;
            margin-left: 116px;
            margin-top: 20px;
        }
        .detail-body-head {
            margin-left:10px;

        }
        .detail-body-des {
            font-size: 2rem;
            margin-left: 10px;
        }
        .detail-body-des-body {
            font-size: 1.6rem;
            margin-left: 10px;
        }
        .list-size-style {
            border: none;
            width: 83px;
            height: 53px;
        }

        /* FOOTER */
        .footer-main {
            margin-top: 30px;
            color: white;
            background-color: black;
        }
        .footer-body {
            font-size: 1.8rem;
            color: var(--white-color);
            line-height: 1.6;
            margin: 20px 0px;
        }
        .footer-heading {
            margin-bottom: 15px;
        }
        /* VISA */
        .footer_brand{
            display: flex;
            flex-wrap: wrap;
            margin: 40px 0px;
        }
        .footer_brand-left{
            width: 40%;
            margin-left: 370px;  
        }
        .footer_brand-center{
            width: 20%;
            margin-left: -161px;
        }
        .footer_brand-right{
            width: 10%;
            margin-left: 83px;
        }
        .footer_brand-left-image img{
            margin: 0px 10px;
        }
        .footer_brand-center-image img{
            margin: 0px 8px;
        }
        .footer_brand-right{
            display: inline-block;
        }
    </style>

</head>
<body>
    <div class="main">
        <header class="header">
                <div class="grid">
                    <nav class="header__navbar">
                        <ul class="header__navbar-list">
                            <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                                SPORTER.VN: Quần áo thể thao chính hãng
                            </li>
                            <li class="header__navbar-item">
                                <span class="header__navbar-title--no-pointer">Kết nối</span>
                                <a href="https://www.facebook.com/DoTheThaoSporter.vn" class="header__navbar-item-icon-link">
                                <i class="header__navbar-icon fab fa-facebook-square"></i>
                                </a>
                                <a href="https://www.instagram.com/sportercom/?hl=en" class="header__navbar-item-icon-link">
                                    <i class="header__navbar-icon fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
        
                        <ul class="header__navbar-list">
                            <li class="header__navbar-item header__navbar-user">
                                <img src="./Img/logo user.jpg" alt="" class="header__navbar-user-img">
                                <span class="header__navbar-user-name">
                                <?php
                                if($_SESSION['Ten'] !="")
                                {
                                    echo $_SESSION['Ten'];
                                }
                            ?>
                                </span>
                            </li>

                            <li class="header__navbar-item">
                                <a href="" class="header__navbar-item-link">
                                    <i class="header__navbar-icon ti-shift-right"></i>
                                    Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </nav> 
                    <!-- Header With Search  -->
                    <div class="header-with-search">
                        <div class="header__logo">
                            <a href="homeuser.php" class="header__logo-link">
                                <img src="https://www.sporter.vn/wp-content/uploads/2017/05/logo.png" class="header__logo-img" alt="Hệ Thống Bán Lẻ Đồ Thể Thao Sporter.vn">
                            </a>
                        </div>
                        <form class="header__search search" action="timkiemuser.php" method="POST">
                        <div class="header__search-input-wrap">
                            <input type="text" name="tukhoa" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm">
                        </div>
                        <button type="submit" name="timkiem" class="header__search-btn">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                    </form>
                        <!-- Cart Layout -->
                        <div class="header__cart">
                            <div class="header__cart-wrap">
                            <a href="giohangmain.php">
                            <i class="header__cart-icon fas fa-shopping-cart"></i>
                            <span class="header__cart-notice"><?php echo count($cart) ?></span>
                            </a>
                            </div>
                        </div>   
                    </div>
                </div>
            </header>
    

    
        <div class="container container-mt-50">
            <div class="size_container">
                <div class="row">
                    <div class="col-5" >
                        <div class="detail-img">
                            <img  src="photo/<?php echo $dulieu['Anh'] ?>" alt=""> 
                        </div>
                    </div>
                        <div class="col-7 detail-body">
                            <h1 class="detail-body-head"><?php echo $dulieu['TenSP'] ?> </h1>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-current">Giá: <?php echo number_format($dulieu['Gia'], 0, '.', '.') ?>đ</span>
                            </div> 
                            <h4 class="detail-body-des">Mô tả:</h4>
                            <p class="detail-body-des-body"><?php echo $dulieu['MoTa'] ?><br/>
                                - Độ bền cao <br/>
                                - Chất liệu vải cao cấp <br/>
                                - Thấm hút mồ hôi tốt tạo cảm giác thoải mái khi thi đấu <br/>
                                - Ship toàn quốc <br/>
                                - Miễn phí in ấn <br/>
                                - Giá chỉ từ 90k <br/>
                            </p>
                            <img width="350px" height="260px"src="https://www.sporter.vn/wp-content/uploads/2017/06/Thong-tin-tu-van.png" alt="">
                            
                            <form method="GET" action="cart.php">
                            <div  class="row form__set-main">
                                <div class="col">
                                    <label class="form__set-label" for="">Số Lượng</label>
                            <input type="number" name="SoLuong" class="form__set-date" value="1"  placeholder="Số lượng" min="1" max="99" required="">
                                </div>

                                <div class="col">
                                    <label class="form__set-label" for="">Size: </label>
                                    <select name="Size" class="list-size-style" >
                                        <option value="S">Size S</option>
                                        <option value="M">Size M</option>
                                        <option value="L">Size L</option>
                                        <option value="XL">Size XL</option>
                                        <option value="XXL">Size XXL</option>
                                    </select>   
                                </div>
                                <input type="hidden" name="IDSP" class="form__set-date" value="<?php echo $dulieu['IDSP'] ?>">
                            </div>
                            
                            <input type="submit" class="button1" name="submit" value="Thêm vào giỏ hàng" >
                            
                            </form>
                        </div>
                    </div>
                </div>                  
            </div>
        </div>
        <!-- FOOTER -->
        <div class="footer-main">
            <div class="size_container ">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="footer-body">
                            <h3 class="footer-heading">VỀ SPORTER.COM</h3>
                            <p>Sporter – chuyên bán quần áo thể thao giá rẻ các mặt hàng quần áo thể thao nam, hàng VNXK chính hãng cao cấp, chất lượng không vì lợi nhuận mà cung cấp sản phẩm kém chất lượng tới tay người tiêu dùng nên Quý khách hàng hoàn toàn yên tâm về sản phẩm tại Sporter Shop.
                                Quần áo thể thao nam tại Sporter may theo quy chuẩn hàng xuất nhập khẩu với tiêu chí đẹp rẻ xịn chất lượng được kiểm định an toàn với người tiêu dùng, đặc biệt giá cả luôn ở mức cạnh tranh thị trường. Với nguồn hàng đồ bộ thể thao nam hàng xuất nhập khẩu từ adidas, nike, porsche… nên Khách hàng hoàn toàn yên tâm về nguồn gốc xuất xứ tại Sporter Shop.</p>
                            <p>Địa chỉ: 123 Nhóm 6, Kim Giang, Thanh Xuân, Hà Nội, Việt Nam</p>
                            <p>HOTLINE: 0385 661 623</p>
                        </div>  
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-body">
                            <h3 class="footer-heading">CHỈ DẪN</h3>
                            <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.178293557398!2d105.81160521540187!3d20.98548899462884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad270d78b019%3A0xa4deecf66709a878!2zU1BPUlRFUiAtIFF14bqnbiDDoW8gdGjhu4MgdGhhbyBuYW0!5e0!3m2!1svi!2s!4v1652605012970!5m2!1svi!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
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
    </div>
    <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
            <a href="tel:0987654321" class="pps-btn-img">
                <img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Gọi điện thoại" width="50">
            </a>
            </div>
        </div>
    </div>
</body>
</html>