<?php
include "../includes/config.php";	
$res = mysqli_query($conn, "SELECT `faculty_id`, `faculty_name`, `dept_id`, `phone`, `DOB`, `email`, `address` FROM `faculty` where `faculty_id`='f012'");
$row = mysqli_fetch_array($res);
$dept_id=$row['dept_id'];
$dept_name = mysqli_query($conn, "SELECT `dept_name` FROM `department` WHERE `dept_id`='$dept_id'");
$dept_name = mysqli_fetch_array($dept_name);
$dept_name=$dept_name['dept_name'];
$address_arr=explode("#",$row['address']);
?> 
<html>
<head>
	   <link rel="stylesheet" href="../CSS/profile_css.css">
       <?php include '../includes/cdn.php'; ?> 
</head>
<body>
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body mt-5">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
				<h5 class="user-name"><?php echo $row['faculty_name'];?></h5>
				<h6 class="user-email"><?php echo $row['email'];?></h6>
				<button type="button" class="btn btn-link" onclick="editProfile()">Edit Profile</button>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" class="form-control" id="fullName" placeholder="Enter full name" value="<?php echo $row['faculty_name']?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" placeholder="Enter email ID" value="<?php echo $row['email']?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" id="phone" placeholder="Enter phone number" value="<?php echo $row['phone']?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="DOB">DOB</label>
					<input type="text" class="form-control" id="date" value="<?php echo $row['DOB']?>" disabled >
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Address</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Street</label>
					<input type="name" class="form-control" id="Street" placeholder="Enter Street" value="<?php echo $address_arr[0]?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">City</label>
					<input type="name" class="form-control" id="ciTy" placeholder="Enter City" value="<?php echo $address_arr[1]?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">State</label>
					<input type="text" class="form-control" id="sTate" placeholder="Enter State" value="<?php echo $address_arr[2]?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Zip Code</label>
					<input type="text" class="form-control" id="zIp" placeholder="Zip Code" value="<?php echo $address_arr[3]?>" disabled>
				</div>
			</div>
		</div>
        <div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">College</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="registration">Registration Number</label>
					<input type="name" class="form-control" id="Street" placeholder="Enter Registration" value="<?php echo $row['faculty_id']?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="dept">Depratment</label>
					<input type="name" class="form-control" id="dept" placeholder="Enter Depratment" value="<?php //echo $dept_name;?>" disabled>
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right mt-4" style="float:right">
                    <button type="button" id="submit" name="submit" class="btn btn-warning" hidden>Update</button>
					<button type="button" id="submit" name="submit" class="btn btn-danger" onclick="cancleEdit()" hidden>Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<script>
	function editProfile(){
		let tmp=document.getElementsByTagName("input");
		tmp[0].disabled=false;
		tmp[1].disabled=false;
		tmp[2].disabled=false;
		tmp[3].disabled=false;
		tmp[4].disabled=false;
		tmp[5].disabled=false;
		tmp[6].disabled=false;
		tmp[7].disabled=false;
		let btn=document.getElementsByTagName("button");
		btn[1].hidden=false;
		btn[2].hidden=false;
	}
	function cancleEdit(){
		let tmp=document.getElementsByTagName("input");
		tmp[0].disabled=true;
		tmp[1].disabled=true;
		tmp[2].disabled=true;
		tmp[3].disabled=true;
		tmp[4].disabled=true;
		tmp[5].disabled=true;
		tmp[6].disabled=true;
		tmp[7].disabled=true;
		let btn=document.getElementsByTagName("button");
		btn[1].hidden=true;
		btn[2].hidden=true;
	}

</script>
</body>
</html>