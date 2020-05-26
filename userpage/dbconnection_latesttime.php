<?php
$mysqli = new mysqli("3.133.100.99", "kang851216", "rkdrudals1", "RAWDATA");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT time FROM data WHERE id = (SELECT MAX(id) FROM data)";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($latestt);
$stmt->fetch();
$stmt->close();

echo $latestt;

?>