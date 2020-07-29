<?php


include ('views/shared/header.php');


//$user = array();
//
//
//if(isset($_SESSION['userID'])){
//    require ('mysqli_connect.php');
//    $user = get_user_info($con, $_SESSION['userID']);
//}

?>

<section id="main-site">
    <div id="contents">
        <div id="adbox">
            <img src="assets/sea-sound.jpg" alt="Img">
            <h1>Mùa hè thú vị</h1>
            <p>
                Ghé thăm chùa Long Sơn vào sáng sớm trước khi lấy một tô bún chả cá cho bữa trưa. Hãy dành buổi chiều tận hưởng bãi biển hoặc thư giãn bên hồ bơi tại Louisiane Brewhouse trước khi dừng chân ở Hòn Chồng vào buổi chiều muộn. Cuộc biểu tình cho một đêm đi chơi trên thị trấn....
                <a href="#">xem thêm</a>
            </p>
        </div>
        <div id="main">
            <div class="box">
                <div>
                    <div>
                        <h3>Blog</h3>
                        <ul>
                            <li>
                                <h4><a href="#">Cuộc thi hoa hậu bãi biển</a></h4>
                                <span>April 02, 2023</span>
                                <p>
                                    Cuộc thi hoa hậu bãi biển diễn ra với sự góp mặt của rất nhiều người mẫu nổi tiếng..
                                    <a href="#">xem thêm</a>
                                </p>
                            </li>
                            <li>
                                <h4><a href="https://nhatrangtoday.vn/tour-lan-bien-nha-trang-post716">Tour Lặn Biển Nha Trang</a></h4>
                                <span>May 29, 2023</span>
                                <p>
                                    Tour lặn biển Nha Trang này là tour lặn ngắm san hô được tổ chức hằng ngày dưới hình thức ghép đoàn. Người Biết Bơi hay không đều lặn được. Tour này đặc biệt rất thích hợp với những du khách muốn có nhiều thời gian để bơi lặn, khám phá đại dương và hòa mình cũng hàng ngàn loài san hô quý tại Khu Bảo Tồn Hòn Mun Nha Trang. Tour có nhiều lịch trình, có thể kết hợp tham quan đảo hoặc đi bộ dưới biển để quý khách lựa chọn..
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div id="sidebar">
            <div class="section">
                <a href="rooms.php"><img src="assets/rooms.png" alt="Img"></a>
            </div>
            <div class="section">
                <a href="#"><img src="assets/dive-site.png" alt="Img"></a>
            </div>
            <div class="section">
                <a href=hotel.foods"><img src="assets/food.png" alt="Img"></a>
            </div>
        </div>
    </div>
</section>

<?php
include "views/shared/footer.php";
?>
