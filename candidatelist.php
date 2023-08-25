<?php
include('dbcon.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>  
    <div class="container-fluid">
    <h2>Candidate Information</h2>
    <div class="divcsss ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
    <table id="data"  class="table table-bordered text-center mb-0 table-striped  table-hover"  >
           
            <thead>
                <th>ID</th>
                <th>Interview Date</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Email Address</th>
                <th>Photo</th>
            </thead>
            <tbody>
                <?php
                 $sql="SELECT * FROM form";
                 $run=sqlsrv_query($conn,$sql);
                 while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
               
                 ?>
                 <tr>
                    <td><?php echo $row['ID']  ?></td>
                    <td><?php echo $row['Interview_date']->format('d-m-Y')  ?></td>
                    <td><?php echo $row['Name']  ?></td>
                    <td><?php echo $row['Mobile_no']  ?></td>
                    <td><?php echo $row['Email_address']  ?></td>
                    <td><img src="image-upload/<?php echo $row['Photo']?>" width="60" height="55"></td>
               
                 </tr>
<?php
} ?>
                </tbody>
    </table>
    </div>
    </div>    
    </div>
    </div>
</body>
</html>

<?php
if(isset($_SESSION['pwd'])){
    ?>
<script>
    $('#data').show();
</script>
  
    <?php

    }

 if(!isset($_SESSION['pwd'])){
    ?>
    <script>
        
         $('#data').hide();
         $(document).ready(function(){
 
  let pwd = prompt("Please enter password:", "");
 
  if (pwd == 123) {
    $('#data').show();
  
  } else {
    alert("wrong pwd");
  }
  $.ajax(
        {                                   
            url:'login.php',
            type:'post',
            data:{pwd:pwd},       
                                                
            success:function(response)
            {            
                                                
                 $('#data').html(response);         
            }
        })

  
 });


<?php
}
?>


 

</script>

