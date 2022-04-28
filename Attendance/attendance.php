<?php
include "../includes/config.php";
$role = $_SESSION['type'];
$pageName = basename($_SERVER['PHP_SELF']);
$course = $_GET["course"];
$courseAttendance = $course . 'p';
?>
<html>
<head>
  <title>Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include '../includes/cdn.php'; ?>
  <link rel="stylesheet" href="../CSS/discussion.css">
  <link rel="stylesheet" href="../CSS/sidebar.css">
</head>
<body>
  <?php include '../includes/sidebar.php'; ?>
  <section class="home">
    <div class="container">
      <?php
      $columns = mysqli_query($conn, "SELECT `COLUMN_NAME` 
                FROM `INFORMATION_SCHEMA`.`COLUMNS` 
                WHERE `TABLE_NAME`='$courseAttendance'");
      mysqli_fetch_array($columns);
      ?>
      <div class="row mt-4" id="table" style="height: 400px; overflow:auto">
        <table class="text-center table table-light" style="height: 10px;">
          <thead style="position: sticky; top:0;">
            <tr>
              <th>Registration Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone No</th>
              <th>Attendance % </th>
            </tr>
          </thead>
          <?php
          while ($id = mysqli_fetch_array($columns)) :
            $studentId = $id['COLUMN_NAME'];
            $totalLectures = 0;
            $selectedLectures = 0;
            $progress = mysqli_query($conn, "SELECT `$studentId` FROM `$courseAttendance`");
            while ($checked = mysqli_fetch_array($progress)) {
              $totalLectures++;
              if ($checked[$studentId]) {
                $selectedLectures++;
              }
            }
            if ($totalLectures == 0) {
              $percentage = 100;
            } else {
              $percentage = round(($selectedLectures / $totalLectures) * 100);
            }
            $studentId = substr($studentId, 0, strlen($studentId) - 1);
            $student = mysqli_query($conn, "SELECT `name`, `phone`, `email` FROM `student` WHERE `id`='$studentId' ");
            $student = mysqli_fetch_array($student);
          ?>
            <tr>
              <td><?php echo $studentId ?></td>
              <td><?php echo $student['name'] ?></td>
              <td><a href="mailto: <?php echo $student['email']?>" target="_blank"><?php echo $student['email'] ?></a></td>
              <td><?php echo $student['phone'] ?></td>
              <td><?php echo $percentage ?> %</td>
            </tr>
          <?php endwhile; ?>
        </table>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="../js/sidebar.js"></script>
</body>
</html>