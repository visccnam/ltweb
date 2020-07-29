<?php
include ('views/shared/headerAdmin.php');
include('mysqli_connect.php');

$rooms=mysqli_query($con,"select * from room ")->fetch_assoc();
?>
<section id="main-site">
    <div id="contents">
        <div class="row ">
            <form class="form-inline" id="search-form" method="post" >
                <input class="form-control mr-sm-2" type="text" placeholder="Search room" id="searchIn">
                <input class="col-md-3 bg-primary" type="button" value="Search" id="search">
            </form>
            <input type="text" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>" id="emailuser" name="email" hidden>
            <input type="text" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>" id="iduser" name="id" hidden>
            <input class="col-md-2 bg-primary" type="button" value="Quản lý Phòng" id="roommanage">
            <input class="col-md-2 bg-primary" type="button" value="Quản lý user" id="usermanage">
            <input class="col-md-2 bg-primary" type="button" value="Quản lý Đặt phòng" id="bookmanage">

        </div>
        <div id="bookingRoom"></div>


    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#roommanage').on('click',function () {
            fetch_data();
        })
        $('#usermanage').on('click',function () {
            var iduser=$('#iduser').val();
            $.ajax({
                url:'booking_action.php',
                method:'POST',
                data:{iduser:iduser},
                success:function (data) {
                    $('#bookingRoom').html(data);
                }
            })
        })
        $('#bookmanage').on('click',function () {
            var emailuser=$('#emailuser').val();
            $.ajax({
                url:'booking_action.php',
                method:'POST',
                data:{emailuser:emailuser},
                success:function (data) {
                    $('#bookingRoom').html(data);
                }
            })
        })
        $('#search').on('click',function () {
            var searchIn=$('#searchIn').val();
            $.ajax({
                url:'booking_action.php',
                method:'POST',
                data:{searchIn:searchIn},
                success:function (data) {
                    $('#bookingRoom').html(data);
                }
            })
        })
        fetch_data();
        function fetch_data(){
            $.ajax({
                url:'booking_action.php',
                method:'POST',
                success:function (data) {
                    $('#bookingRoom').html(data);
                }
            })
        }
        function fetch_data_book(){
            $.ajax({
                url:'booking_action.php',
                method:'POST',
                success:function (data) {
                    $('#bookingRoom').html(data);
                }
            })
        }
        $(document).on('click','.del_user',function () {
            var idxoa=$(this).data('id_xoa')
            $.ajax({
                url:'booking_action.php',
                method:'POST',
                data:{idxoa:idxoa},
                success:function (data) {
                    alert('Delete thanhf cong')
                }
            })
        })
        $(document).on('click','.del_checkout',function () {
            var idcheckout=$(this).data('id_checkout')
            $.ajax({
                url:'booking_action.php',
                method:'POST',
                data:{idcheckout:idcheckout},
                success:function (data) {
                    alert('Checkout thanh cong')
                    fetch_data();
                }
            })
        })
    })
</script>
<?php
include "views/shared/footer.php";
?>
