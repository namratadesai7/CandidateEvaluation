<?php

session_start();
include('dbcon.php');

if(isset($_POST['pwd'])){
    $pwd=$_POST['pwd'];

    $sql="SELECT * FROM pass";
    $run= sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);

    if($pwd==$row['pwd']){
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['pwd']=$row['pwd'];
     
        ?>
        < <script>
            // alert('User logged in');
            window.open('candidatelist.php','_self');

        </script> 

<?php
    }
//     else{
// ?>
     <script>
//         alert('Password not match');
//         window.open('index1.php','_self');
//     </script>
 <?php
//     }



?>


    <?php
}
?>