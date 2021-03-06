<?php
    
session_start();
include 'ketnoi.php';

$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];

$SDT=$_SESSION['SDT'];

$sql="select * from khachhang where SDT=$SDT";
$thucthi=mysqli_query($conn,$sql);
$dulieu = mysqli_fetch_array($thucthi);
$Ten = $dulieu['Ten'];
$SDT = $dulieu['SDT'];
$Email = $dulieu['Email'];

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
    <link rel="stylesheet" href="./CSS/call.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script language="javascript" src="./main.js"></script>
    <style>
        .mt-150 {
            margin-top: 150px;
        }
        .mt-30 {
            margin-top: 30px;
        }
        .mt-100 {
            margin-top: 100px;
        }
        .mb-30 {
            margin-bottom: 30px;
        }
        .heading_cart {
            color: var(--primary-color);
            font-size: 2.6rem;
            font-weight: 600;
        }
        .cart-img {
            width: 100px;
        }
        .table {
            margin-top: 10px;
        }
        .label-cart th {
            background-color: #403f40;
            font-size: 1.8rem;
            color: white;
        }
        .label-cart td {
            font-size: 1.8rem;
        }
        .delete-cart {
            border: none;
            color: var(--white-color);
            background-color: var(--primary-color);
            padding: 5px 10px;
        }
        .sum-cart {
            float: right;
            display: flex;
            font-size: 2rem;
            font-weight: 500;
        }
        .cart-total {
            color: var(--primary-color);
            padding-left: 5px;  
        }
        .group-body {
            margin-top: 10px;
        }
        .form-group-item {
            display: flex;
        }
        .form-group>input {
            padding-left: 10px;
        }
        .form-control {
            outline: none;
            padding: 5px 0;
            font-size: 2rem;
        }
        .summit-cart {
            float: right;
            font-size: 2rem;
            font-weight: 500;
            border: none;
            color: var(--white-color);
            background-color: var(--primary-color);
            padding: 10px 5px;
            margin-top: 10px;
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
                            SPORTER.VN: Qu???n ??o th??? thao ch??nh h??ng
                        </li>
                        <li class="header__navbar-item">
                            <span class="header__navbar-title--no-pointer">K???t n???i</span>
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
                            <a href="home.php" class="header__navbar-item-link">
                                <i class="header__navbar-icon ti-shift-right"></i>
                                ????ng xu???t
                            </a>
                        </li>
                    </ul>
                </nav> 
                <!-- Header With Search  -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="homeuser.php" class="header__logo-link">
                            <img src="https://www.sporter.vn/wp-content/uploads/2017/05/logo.png" class="header__logo-img" alt="H??? Th???ng B??n L??? ????? Th??? Thao Sporter.vn">
                        </a>
                    </div>
                    <form class="header__search search" action="timkiemuser.php" method="POST">
                        <div class="header__search-input-wrap">
                            <input type="text" name="tukhoa" class="header__search-input" placeholder="Nh???p ????? t??m ki???m s???n ph???m">
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
    </div> 
    <div class="container">
        <div class="size_container">

            <b class="mt-150">Gi??? h??ng</b>
            <div class="heading_cart mt-150">1. Gi??? h??ng c???a b???n</div>

            <table class="table">
                    <thead>
                        <tr class="label-cart">
                            <th>???nh</th>
                            <th>T??n s???n ph???m</th>
                            <th>S??? l?????ng</th>
                            <th>Size</th>
                            <th>????n gi??</th>
                            <th>T???ng gi??</th>
                            <th></th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $TongTien = 0; ?>
                    <?php foreach ($cart as $key => $dulieu):
                            $TongTien += ($dulieu['Gia'] * $dulieu['SoLuong']);
                        ?>
                        <form method="GET" action="cart.php">
                        <tr class="label-cart">
                            <td>
                                <img src="photo/<?php echo $dulieu['Anh'] ?>" class="cart-img"></img>
                            </td>
                            <td>
                                <span><?php echo $dulieu['TenSP'] ?></span>
                            </td>
                            <td>
                            <input  type="number" name="SoLuong" class="form__set-date" id="sau" placeholder="S??? l?????ng" min="1" max="99" required="" value="<?php echo $dulieu['SoLuong'] ?>">
                            </td>
                            <td>
                            <select name="Size" class="list-size-style" id="list-size">
                                    <option value ="<?php echo $dulieu['Size'] ?>" >Size <?php echo $dulieu['Size'] ?></option>
                                    <option value="S">Size S</option>
                                    <option value="M">Size M</option>
                                    <option value="L">Size L</option>
                                    <option value="XL">Size XL</option>
                                    <option value="XXL">Size XXL</option>
                            </select>   
                            </td>

                            <td>
                                <b><?php echo number_format($dulieu['Gia'], 0, '.', '.') ?>??</b>
                            </td>
                            <td>
                                <b><?php echo number_format($dulieu['Gia'] * $dulieu['SoLuong'], 0, '.', '.') ?>??</b>
                            </td>
                            <td>
                                <input type="hidden" name="IDSP"  value="<?php echo $dulieu['IDSP'] ?>">
                                <input type="hidden" name="action"  value="update">
                                <button class="delete-cart" type="submit" name="submit">C???p nh???t</button>
                                </form>
                                <a href = "cart.php?IDSP=<?php echo $dulieu['IDSP'] ?>&action=delete">
                                <button class="delete-cart">X??a</button>
                                </a>
                            </td>
                            
                        </tr>
                        
                        <?php endforeach ?>
                    </tbody>
                    
            </table>

            <div class="sum-cart">
                <span class="sum-label">T???ng Ti???n:</span>
                <span class="cart-total"><?php echo number_format($TongTien, 0, '.', '.') ?>??</span>  
            </div>  

            <div class="heading_cart mt-35">2. Th??ng tin kh??ch h??ng</div>  

            <div class="group-body">
                <div class="row">
                    <div class="form-group col-4">
                        <input type="text" class="form-control" value="<?php echo ''.$Ten.''?>" placeholder="H??? t??n *" required/>                  
                    </div>
                    <div class="form-group col-4">
                        <input type="text" class="form-control" value="<?php echo ''.$Email.''?>" placeholder="Email *" required/>                     
                    </div>
                    <div class="form-group col-4">
                        <input type="text" class="form-control" value="<?php echo ''.$SDT.''?>" placeholder="??i???n tho???i *" required/>                   
                    </div>
                </div>
            </div>

            <div class="group-body">
                <div class="row">
                    <div class="form-group col-6">
                        <input type="text" class="form-control" value="" placeholder="?????a ch??? nh???n h??ng *" required/>                  
                    </div>
                    <div class="form-group col-6">
                        <input type="text" class="form-control" value="" placeholder="Ghi ch??" />                     
                    </div>
                </div>
            </div>

            <!-- THANH TO??N -->
            <div>
                <button class="summit-cart">Ho??n T???t ?????t H??ng</button>
            </div>
                
        </div>    
    </div>
    <!-- FOOTER -->
    <div class="footer-main mt-100">
        <div class="size_container ">
            <div class="row">
                <div class="col-sm-8">
                    <div class="footer-body">
                        <h3 class="footer-heading">V??? SPORTER.COM</h3>
                        <p>Sporter ??? chuy??n b??n qu???n ??o th??? thao gi?? r??? c??c m???t h??ng qu???n ??o th??? thao nam, h??ng VNXK ch??nh h??ng cao c???p, ch???t l?????ng kh??ng v?? l???i nhu???n m?? cung c???p s???n ph???m k??m ch???t l?????ng t???i tay ng?????i ti??u d??ng n??n Qu?? kh??ch h??ng ho??n to??n y??n t??m v??? s???n ph???m t???i Sporter Shop.
                            Qu???n ??o th??? thao nam t???i Sporter may theo quy chu???n h??ng xu???t nh???p kh???u v???i ti??u ch?? ?????p r??? x???n ch???t l?????ng ???????c ki???m ?????nh an to??n v???i ng?????i ti??u d??ng, ?????c bi???t gi?? c??? lu??n ??? m???c c???nh tranh th??? tr?????ng. V???i ngu???n h??ng ????? b??? th??? thao nam h??ng xu???t nh???p kh???u t??? adidas, nike, porsche??? n??n Kh??ch h??ng ho??n to??n y??n t??m v??? ngu???n g???c xu???t x??? t???i Sporter Shop.</p>
                        <p>?????a ch???: 123 Nh??m 6, Kim Giang, Thanh Xu??n, H?? N???i, Vi???t Nam</p>
                        <p>HOTLINE: 0385 661 623</p>
                    </div>  
                </div>
                <div class="col-sm-4">
                    <div class="footer-body">
                        <h3 class="footer-heading">CH??? D???N</h3>
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
    
    <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <a href="tel:0987654321" class="pps-btn-img">
                    <img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="G???i ??i???n tho???i" width="50">
                </a>
            </div>
        </div>
    </div>
</body>
</html>