<?php
include"config.php";
$id=$_SESSION['user_id'];
if(isset($_POST["submit"])){
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    if($pass1 == $pass2){
        if( $pass1!= "CMS@123"   ){
        mysqli_query($conn,"update `login` set password='$pass2' where reg_id=$id");
        echo '<script>alert("Your Password Has Been Changed Successfully");
        window.location.href="admin_dashboard.php"</script>';
        }
        else {
            echo '<script>alert("Use Some Other Password")</script>';
        }
    }
    else{
        echo '<script>alert("Your Password Does Not Match")</script>';
    }
} 
?>


<html>

<head>

<link rel="stylesheet" href="CSS/cms.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>E-Learning</title>

</head>

<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center mb-4">
                  <img src="https://seeklogo.com/images/G/graduated-online-education-logo-2327B5F5C0-seeklogo.com.png" style="width: 185px;" alt="logo">
                </div>

                <form method="POST" action="change_password.php">
                  <p><strong>Enter New Password</strong></p>

                  <div class="form-outline mb-4">
                    <input type="text" name="pass1"  class="form-control" placeholder="New Password"/>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="pass2" class="form-control" placeholder="Confirm Password"/>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input class="btn btn-primary btn-sm gradient-custom-2 mb-3" type="submit" name="submit" value="Submit"/>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4 text-center">Next Gen Learning</h4>
                <p class="small mb-0"> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
