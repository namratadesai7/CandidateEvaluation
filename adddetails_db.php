<?php
include('dbcon.php');

if(isset($_POST['save'])){

    $id=$_POST['id'];
    $date=$_POST['date'];
    $name=$_POST['fullName'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];

    if($_FILES['img']['name'] != ''){
        $img = $_FILES['img']['name'];//name is keyboard
        $imgExt = substr($img, strripos($img, '.')); // get file extention
        $imgname = $name . $imgExt;
        move_uploaded_file($_FILES["img"]["tmp_name"], "image-upload/".$imgname);
    }else{
        $imgname = $imageName;
    }   

    $sql="INSERT INTO Form ( ID,Interview_date,Name,Mobile_no,Email_address,Photo) VALUES('$id','$date','$name','$phone','$email','$imgname')";
    $run=sqlsrv_query($conn,$sql);
    if($run){
        ?>
        <script>
            alert('updated Successfully');
            window.open('index.php','_self');
        </script>
        <?php
    }else{
        print_r(sqlsrv_errors());
    }
}




?>