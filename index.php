<?php
include('dbcon.php');
$sql="SELECT count(ID) AS ID FROM form";
$run=sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill up form</title>
     
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
   
</head>

<body>
    <h1>Interview Candidate Evaluation Form</h1>
    <div class="divcss">
    <form action="adddetails_db.php" method="post"  enctype="multipart/form-data">
       
            <h2>Personal Information</h2>
           
            <label class="form-label " for="id">ID:
            <input class="form-control"  name="id" type="number" id="id"  value="<?php echo $row['ID'] + 1 ?>" required readonly>
            </label>
            <label class="form-label" for="date">Date:
            <input class="form-control" type="date" name="date" id="date" value="<?php echo date('Y-m-d') ?>" required>
            </label>
            </label>
            <label class="form-label" for="fullName">Full Name:
            <input class="form-control" type="text" id="fullName" name="fullName" required>
            </label>
            <label class="form-label" for="phone">Phone Number:
            <input class="form-control" type="tel" id="phone" name="phone" required>
            </label>
            <label class="form-label" for="email">Email Address:
            <input class="form-control" type="email" id="email" name="email" required>
            </label>

            <!-- <div class="upload">
                <button type="button" class="btn-warning">
                    <i class="fa fa-upload"></i> Upload File
                    <input type="file">
                </button>
            </div> -->
            <div id="selectbanner" class="upload">
              <img src="noprofil.jpg" width=100 height=100 alt="">
              <div class="round">
                <input type="file" name="img" id="img">
                <i class="fa fa-camera" style="color:#fff;"></i>
              </div>
            </div>
            
                <label for="img">Image:
                <input type="file" class="form-control" name="img" id="img" /></label>
         
            <!-- <div id="selectedBanner"></div>   -->
            <div class="savebtn">
            <button  class="btn btn-success " type="submit" name="save">Save</button>
            </div>
    </form>
    </div>
   
</body>
</html>
<script>
      var selDiv = "";
      var storedFiles = [];
      $(document).ready(function () {
        $("#img").on("change", handleFileSelect);
        selDiv = $("#selectedBanner");
      });

      function handleFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function (f) {
          if (!f.type.match("image.*")) {
            return;
          }
          storedFiles.push(f);

          var reader = new FileReader();
          reader.onload = function (e) {
            var html =
              '<img src="' +
              e.target.result +
              "\" data-file='" +
              f.name +
              "alt='Category Image' height='200px' width='200px'>";
            selDiv.html(html);
          };
          reader.readAsDataURL(f);
        });
      }

      
    </script>


