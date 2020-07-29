<?php
include('views/shared/header.php');
include('mysqli_connect.php');
$roomF=mysqli_query($con,"select count(id) as countF from room where loai='first class' and isFree=1")->fetch_assoc();
$roomD=mysqli_query($con,"select count(id) as countD from room where loai='deluxue room' and isFree=1")->fetch_assoc();
$roomS=mysqli_query($con,"select count(id) as countS from room where loai='suite room' and isFree=1")->fetch_assoc();

?>
<section id="main-site">
    <div class="container py-5 col-md-12">
        <div class="row">
            <div class="col-4 offset-4 shadow py-4">
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <img class="img rounded-circle" style="width: 200px; height: 200px;" src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './assets/profile/beard.png'; ?>" alt="">
                        <h4 class="py-3">
                            <?php
                            if(isset($user['firstName'])){
                                printf('%s %s', $user['firstName'], $user['lastName'] );
                            }
                            ?>
                        </h4>
                    </div>
                </div>

                <div class="user-info px-3">
                    <ul class="font-ubuntu navbar-nav">
                        <li class="nav-link"><b>First Name: </b><span id="ss"><?php echo isset($user['firstName']) ? $user['firstName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Last Name: </b><span id="sss"><?php echo isset($user['lastName']) ? $user['lastName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Email: </b><span><?php echo isset($user['email']) ? $user['email'] : ''; ?></span></li>
                        <li><b>Đặt phòng:</b></li>
                    </ul>
                </div>
                <br>

                <div class="d-flex justify-content-center">

                    <form method="POST"  id="bookingRoom">
                        <div class="form-group">
                            <input type="text" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>" id="iduser" name="id" hidden>
                            <span>Loại Phòng</span>
                            <select class="form-control col-md-9" name="typeRoom" id="typeRoom" required>
                                <option value="first class"><?php  if($roomF['countF']==0) echo 'first class is out of room';
                                    else echo 'first class';  ?></option>
                                <option value="deluxue room"><?php  if($roomD['countD']==0) echo 'deluxue room is out of room';
                                    else echo 'deluxue room';  ?></option>
                                <option value="suite room"><?php  if($roomS['countS']==0) echo 'suite room is out of room';
                                    else echo 'suite room';  ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <legend class="bv-no-focus-ring col-form-label pt-0">Ngày checkin</legend>
                            <div class="bv-no-focus-ring">
                                <input type="date" name="checkin" class="form-control col-md-9" value="" id="checkin" required>
                            </div>
                            <div class="clear-fix"></div>
                        </div>
                        <div class="form-group">
                            <legend class="bv-no-focus-ring col-form-label pt-0 ">Ngày checkout</legend>
                            <div class="bv-no-focus-ring">
                                <input type="date" name="checkout" class="form-control col-md-9" value="" id="checkout" required>
                            </div>
                            <div class="clear-fix"></div>
                        </div>
                        <div class="form-group">
                            <legend class="bv-no-focus-ring col-form-label pt-0">Mô tả</legend>
                            <div class="bv-no-focus-ring">
                                <textarea name="mota" class="form-control" value="" id="mota" required></textarea>
                            </div>
                            <div class="clear-fix"></div>
                        </div>
                        <div class="submit-btn text-center my-5">
                            <!--                            <button type="reset" class="btn btn-warning rounded-pill text-dark px-5" id="update">Sửa</button>-->
                            <input type="button" name="book" value="Đặt phòng" class="btn btn-warning rounded-pill text-dark px-5" id="book">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#book').on('click',function () {
            var iduser=$('#iduser').val();
            var typeRoom=$('#typeRoom').val();
            var checkin=$('#checkin').val();
            var checkout=$('#checkout').val();
            var mota=$('#mota').val();
            $.ajax({
                url:'booking_action.php',
                method:'POST',
                data:{iduser:iduser,typeRoom:typeRoom,checkin:checkin,checkout:checkout,mota:mota},
                success:function (data) {
                    alert("Đặt phòng thành công")
                    $('#bookingRoom')[0].reset();
                }
            })
        })
    })
</script>
<?php
include "views/shared/footer.php";
?>

