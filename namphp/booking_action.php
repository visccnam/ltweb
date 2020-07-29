<?php
include('mysqli_connect.php');
include('helper.php');
if(isset($_POST['typeRoom'])){
    $typeRoom=$_POST['typeRoom'];
    $checkin=$_POST['checkin'];
    $checkout=$_POST['checkout'];
    $mota=$_POST['mota'];
    $iduser=$_POST['iduser'];
    $room=mysqli_query($con,"select id from room where loai='$typeRoom' limit 1")->fetch_assoc();
    $idroom=$room['id'];
    $rs=mysqli_query($con,"update room set isFree=0 where id=$idroom and loai='$typeRoom'");
    $result=mysqli_query($con,"insert into booking(idUser,idRoom,checkin,checkout,mota) 
                                        values($iduser,$idroom,'$checkin','$checkout','$mota') ");
}
else ('huhuhuhuhu');
if(isset($_POST['idxoa'])){
    $idxoa=$_POST['idxoa'];
    $result=mysqli_query($con,"delete from user where id=$idxoa");
}

if(isset($_POST['idcheckout'])){
    $idcheckout=$_POST['idcheckout'];
    $result=mysqli_query($con,"update room set isFree=1 where id=$idcheckout");
    $result1=mysqli_query($con,"delete from booking where idRoom=$idcheckout");
}

if(isset($_POST['iduser'])){
    $output='';
    $selectUser=mysqli_query($con,"select * from user where email !='admin@gmail.com'");
    $output.='
    <table class="table table-bordered">
            <tr>
                <th>
                    <input type="checkbox" name="checkbox-delete-all">
                </th>
                <th>ID</th>
                <th>FullName</th>
                <th>Email</th>
                <th>Date of Bith</th>
                <th>Gender</th>
                <th></th>
             </tr>
            

        
';
    if(mysqli_num_rows($selectUser)>0){
        while($rows=mysqli_fetch_assoc($selectUser)){
            $output.='
            <tr>
                <th>'.$rows['id'].'</th>
                <th>'.$rows['lastName'].$rows['firstName'].'</th>
                <th>'.$rows['email'].'</th>
                <th>'.$rows['ngaysinh'].'</th>
                <th>'.$rows['gender'].'</th>
                <th><input type="button" value="Delete" data-id_xoa='.$rows['id'].' class="btn-danger del_user"></th>
            </tr>
        ';
            }
    }else{
        $output.='
    ';
    }
    $output.='

</table>
';
    echo $output;

}
else {
    if (isset($_POST['searchIn'])) {
        $str = $_POST['searchIn'];
        $output = '';
        $selectR = mysqli_query($con, "select * from room where loai like '%$str%'");
        $output .= '
    <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Loại Phòng</th>
                <th>Giá Phòng</th>
                <th>Tình Trạng</th>
                
              </tr>
            

        
';
        if (mysqli_num_rows($selectR) > 0) {
            while ($rows = mysqli_fetch_assoc($selectR)) {
                $output .= '
            <tr>
                <th>' . $rows['id'] . '</th>
                <th>' . $rows['loai'] . '</th>
                <th>' . $rows['gia'] . '</th>
                <th>' . $rows['isFree'] . '</th>
                
            </tr>
        ';

            }
        } else {
            $output .= '
    ';
        }
        $output .= '

</table>
';
        echo $output;
    } else {
        $output = '';
        $selectRoom = mysqli_query($con, "select * from room");
        $output .= '
    <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Loại Phòng</th>
                <th>Giá Phòng</th>
                <th>Tình Trạng</th>
              
            </tr>
            

        
';
        if (mysqli_num_rows($selectRoom) > 0) {
            while ($rows = mysqli_fetch_assoc($selectRoom)) {
                $output .= '
            <tr>
                <th>' . $rows['id'] . '</th>
                <th>' . $rows['loai'] . '</th>
                <th>' . $rows['gia'] . '</th>
                <th>' . $rows['isFree'] . '</th>
             </tr>
        ';

            }
        } else {
            $output .= '
    ';
        }
        $output .= '

</table>
';
        echo $output;
    }
}
if(isset($_POST['emailuser'])){
    $emai=$_POST['emailuser'];
    $output = '';
    $selectBook = mysqli_query($con, "select * from booking");
    $output .= '
    <table class="table table-bordered">
            <td>
                <th>Khách hàng</th>
                <th>Loại phòng</th>
                <th>Checkin Date</th>
                <th>Checkout Date</th>
                <th>Checkout</th>
            </td>
            

        
';
    if (mysqli_num_rows($selectBook) > 0) {
        while ($rows = mysqli_fetch_assoc($selectBook)) {
            $idu=$rows['idUser'];
            $idr=$rows['idRoom'];
            $u=mysqli_query($con,"select * from user where  id=$idu")->fetch_assoc();
            $r=mysqli_query($con,"select * from room where  id=$idr")->fetch_assoc();
            $output .= '
            <tr>
                <th></th>
                <th>'.$u['lastName'].$u['firstName'].'</th>
                <th>' . $r['loai'] . '</th>
                <th>' . $rows['checkin'] . '</th>
                <th>' . $rows['checkout'] . '</th>
                <th><input type="button" value="Checkout" data-id_checkout='.$r['id'].' class="btn-danger del_checkout"></th>
            </tr>
        ';

        }
    } else {
        $output .= '
    ';
    }
    $output .= '

</table>
';
    echo $output;

}
?>

