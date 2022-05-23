<?php
    
session_start();
include 'ketnoi.php';
$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];
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
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="./CSS/style-homeuser-2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script language="javascript" src="./main.js"></script>

    <style> 
        .home-product-list {
            display: flex;
            flex-wrap: wrap;
        }
        .home-product-item:first-child {
            margin-left: 16px;
        }

        .home-product-item {
            width: 18%;
        }
        .home-product-item-1 {
            overflow: hidden;
        }
        .home-product-item__img:hover {
            transform: scale(2);
            transition: 0.5s;
        }
        .container__banner img {
            border-radius: 0;
            height: 480px;
            margin-top: 86px;
        }
        .lol2 {
            display: none;
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
                            <a href="" class="header__navbar-item-icon-link">
                               <i class="header__navbar-icon fab fa-facebook-square"></i>
                            </a>
                            <a href="" class="header__navbar-item-icon-link">
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
                            <a href="dangxuatuser.php" class="header__navbar-item-link">
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
                        <a href="dangnhapnew.php">
                            <i class="header__cart-icon fas fa-shopping-cart"></i>
                            <span class="header__cart-notice"><span class="header__cart-notice"><?php echo count($cart) ?></span></span>
                            </a>
                        </div>
                    </div>   
                </div>


            </div>

        </header>
                            <button class="header__button"> <a class="logout__hover" href="dangxuatuser.php">ĐĂNG XUẤT</a></button>
                        </li>
                    </ul>
                </nav> 
            </div>
        </header>
        <!-- BANNER -->
        <div class="container__banner" id="slider">
            <img class="slide" src="https://www.sporter.vn/wp-content/uploads/2021/07/Banner-bong-da-1.png" stt="0">
            <img class="slide" src="https://www.sporter.vn/wp-content/uploads/2021/07/Banner-bong-da-2.png" stt="1" style="display:none">
            <img class="slide" src="https://www.sporter.vn/wp-content/uploads/2021/07/Banner-bong-da-3.png" stt="2" style="display:none">
            <button class="lol2 ok1 lol2-left" id="phai">
                <i class="fas fa-angle-left cc"></i>
            </button>
            <button class="lol2 lol2-right" id="trai">
                <i class=" fas fa-angle-right"></i>
            </button>
        </div>
        


            <div class="size_container">

                               
        
            <div class="famous__place">
                    <div class="home-product-list">

<?php
if (isset($_POST['timkiem'])) {
    $_tukhoa = $_POST['tukhoa'];
    $sql = "select * from sanpham where (TenSP like '%".$_tukhoa."%') OR (Gia like '%".$_tukhoa."%')";
    //$sql = "select * from sanpham";
    $thucthi = mysqli_query($conn,$sql);
    if(mysqli_num_rows($thucthi)<=0){
        echo ' <div><h4 class="home-product-item__name">Không có sản phẩm cần tìm</h4></div>';
    }
    while ($dulieu = mysqli_fetch_array($thucthi)) {
        echo'           <a class="home-product-item" href="chitietsanpham.php?IDSP='.$dulieu['IDSP'].'">
                            <div class="home-product-item-1">
                                <div class="home-product-item__img" style="background-image:url( photo/'.$dulieu['Anh'].')"></div>
                            </div>
                                <h4 class="home-product-item__name">'.$dulieu['TenSP'].'</h4>
                                <div class="home-product-item__price">
                                    
                                    <span class="home-product-item__price-current">Giá: '.number_format($dulieu['Gia'], 0, '.', '.').'đ</span>
                            </div>
                            <div class="home-product-item__origin">
                                <span class="home-product-item__brand">Sporter</span>
                                <span class="home-product-item__origin-name">Việt Nam</span>
                            </div>
                          
                        </a>     ';
                    if(isset($_GET['url']))
                        include($_GET['url']); 
                                }
                            }
?>
                        
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
</body>
</html>