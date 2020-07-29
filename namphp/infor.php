<?php
include('views/shared/header.php');
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
                        <li class="nav-link"><b>Date of Bith: </b><span id="ssss"><?php echo isset($user['ngaysinh']) ? $user['ngaysinh'] : ''; ?></span></li>
                        <li class="nav-link"><b>Gender: </b><span id="sssss"><?php echo isset($user['gender']) ? $user['gender'] : ''; ?></span></li>
                        <li><b>Sửa thông tin cá nhân</b></li>
                    </ul>
                </div>

                <div class="d-flex justify-content-center">

                    <form method="POST"  id="update_infor">
                        <legend class="bv-no-focus-ring col-form-label pt-0 ">Full Name</legend>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>" id="iduser" name="id" hidden>
                                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col">
                                <input type="text" name="LastName" id="LastName" class="form-control" placeholder="Last Name">
                            </div>


                        </div>
                        <div class="form-group">
                            <legend class="bv-no-focus-ring col-form-label pt-0 ">Date of Bith</legend>
                            <div class="bv-no-focus-ring">
                                <input type="date" name="ngaysinh" class="form-control col-md-9" value="" id="ngaysinh" required>
                            </div>
                            <div class="clear-fix"></div>
                        </div>
                        <div class="form-group">
                            <legend class="bv-no-focus-ring col-form-label pt-0 ">Gender</legend>
                            <select class="form-control col-md-9" name="gender" id="gender" required>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                            <div class="clear-fix"></div>
                        </div>

                        <div class="submit-btn text-center my-5">
<!--                            <button type="reset" class="btn btn-warning rounded-pill text-dark px-5" id="update">Sửa</button>-->
                                <input type="button" name="update_btn" value="Sửa" class="btn btn-warning rounded-pill text-dark px-5" id="update">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {


    $('#update').on('click',function () {
        var firstName= $('#firstName').val();
        var LastName= $('#LastName').val();
        var iduser= $('#iduser').val();
        var ngaysinh=$('#ngaysinh').val();
        var gender=$('#gender').val();
        $.ajax({
             url:"update_action.php",
             method:"POST",
            data:{iduser:iduser,firstName:firstName,LastName:LastName,ngaysinh:ngaysinh,gender:gender},
            success:function (data) {
                alert('Cập nhập thông tin cá nhân thành công')
                $('#ss').text(firstName);
                $('#sss').text(LastName);
                $('#ssss').text(ngaysinh);
                $('#sssss').text(gender);
            }
        });




    })
    })
</script>

<?php
include('views/shared/footer.php');
?>

