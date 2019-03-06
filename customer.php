<?php
  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'fitness';

  //Opening a connection
  $conn = new mysqli($hostname, $username, $password, $database);
  if ($conn->connect_error){
    die($conn->connect_error);
  }

  echo "ok";
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $more_info = '';
  if (isset($_POST['grpfit']))  $more_info = '1'; else $more_info = '0';
  if (isset($_POST['prtrain'])) $more_info = $more_info . '1'; else $more_info = $more_info . '0';
  if (isset($_POST['nutr'])) $more_info = $more_info . '1'; else $more_info = $more_info . '0';

  $reference = $_POST['reference'];
  $questions = $_POST['questions'];

  $query = "insert into customer(fName, lName, email, phone, more_info, reference, questions) values('$fName','$lName', '$email', '$phone', '$more_info', '$reference', '$questions')";

  $results = $conn->query($query);
  if (!$results) {
    echo "Insert failed";
  } else {
    echo "Insert successfully";
  }

  $query = "select * from customer";
  $results = $conn->query($query);

  if (!$results) echo "Select error";

  while ($row = mysqli_fetch_array($results)) {
    echo $row['fName'] .' '.$row['lName'] .' '.$row['email'] .' '.$row['phone'] .' '.$row['more_info'] .' '.$row['reference'] .' '.$row['questions'] ."<br/>";
  }









?>
