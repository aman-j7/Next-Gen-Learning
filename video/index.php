<?php
include('config.php');
include('api.php');
if(isset($_POST["video_meeting"]))
{
	$getdate=$_POST['date'];
    $gettime=$_POST['time'];
    $date=date($getdate.' '.$gettime);
	$arr['topic']=$_POST["topic"];
	$arr['start_date']=$date;
	$arr['duration']=$_POST["duration"];
	$arr['password']=$_POST["password"];
	$arr['type']='2';
	$result=createMeeting($arr);
	if(isset($result->id)){
		echo "Join URL: <a href='".$result->join_url."'>".$result->join_url."</a><br/>";
		echo "Password: ".$result->password."<br/>";
		echo "Start Time: ".$result->start_time."<br/>";
		echo "Duration: ".$result->duration."<br/>";
	}else{
		echo '<pre>';
		print_r($result);
	}
}

?>
<html>
	<body>
	<form role="form" action="index.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label>Topic</label>
                                <input type="text" class="form-control input1" name="topic" placeholder="Enter meeting name"  required>
                            </div>
                            <div class="form-group">
                                <label> Start Date</label>
                                <input type="date" class="form-control input1" placeholder="Enter start date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label> Start time</label>
                                <input type="time" class="form-control input1" placeholder="Enter start time" name="time" required>
                            </div>
                            <div class="form-group">
                                <label>Duration</label>
                                <input type="integer" class="form-control input1" placeholder="Enter duration" name="duration"  required>
                            </div>
							<div class="form-group">
                                <label>password</label>
                                <input type="text" class="form-control input1" placeholder="Enter password" name="password"  required>
                            </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-default btn-success input1" name="video_meeting"/>
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
	</body>
</html>