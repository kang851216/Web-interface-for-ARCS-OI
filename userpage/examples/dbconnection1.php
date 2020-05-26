<?php
$mysqli = new mysqli("3.133.100.99", "kang851216", "rkdrudals1", "RAWDATA");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT date, time, machineno, identification, weight 
FROM data ORDER BY time desc";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

while($res = $result->fetch_array(MYSQLI_BOTH)){
  $met = $res['identification'];
  if(substr($met,0,6) == ("wxp://")){ 
    $method = "QRcode";}
  
  else{
    $method = "RFID";}
  
  echo "<tr>";
  echo "<td>" . $res['date'] . "</td>";
  echo "<td>" . $res['time'] . "</td>";
  echo "<td>" . $res['machineno'] . "</td>";
  echo "<td>" . $method . "</td>";
  echo "<td>" . $res['identification'] . "</td>";
  echo "<td>" . $res['weight'] . "</td>";
  echo "</tr>";
}
$stmt->close();
?>