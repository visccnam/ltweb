<?php
include('views/shared/header.php');


?>
    <div id="contents">
        <div class="box">
            <div>
                <div class="body">
                    <h1>Food</h1>
                    <ul id="foods">
                        <li>
                            <h2><a href="{{ route('hotel.foods') }}">Hải Sản</a></h2>
                            <div class="infos">
                                <a href="{{ route('hotel.foods') }}"><img src="assets/seafoods.jpg" alt="Img" height="169" width="780"><span class="cover"></span></a>
                                <p>
                                    <span> Fried Salmon Special</span> Tôi là tổng quan về sản phẩm. Tại đây bạn có thể viết thêm thông tin về sản phẩm của bạn. Người mua muốn biết ...
                                </p>
                            </div>
                        </li>
                        <li>
                            <h2><a href="{{ route('hotel.foods') }}R">Tráng miệng</a></h2>
                            <div class="infos">
                                <a href="{{ route('hotel.foods') }}"><img src="assets/desserts.jpg" alt="Img" height="169" width="780"><span class="cover"></span></a>
                                <p>
                                    <span> Sandwich kem Choco </span> Tôi là tổng quan về sản phẩm. Tại đây bạn có thể viết thêm thông tin về sản phẩm của bạn. Người mua muốn biết ...
                                </p>
                            </div>
                        </li>
                        <li>
                            <h2><a href="{{ route('hotel.foods') }}">Buffet</a></h2>
                            <div class="infos">
                                <a href="{{ route('hotel.foods') }}"><img src="assets/buffet.jpg" alt="Img" height="169" width="780"><span class="cover"></span></a>
                                <p>
                                    <span> Tiệc tự chọn hỗn hợp </span> Tôi là tổng quan về sản phẩm. Tại đây bạn có thể viết thêm thông tin về sản phẩm của bạn. Người mua muốn biết ...
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
include "views/shared/footer.php";
?>