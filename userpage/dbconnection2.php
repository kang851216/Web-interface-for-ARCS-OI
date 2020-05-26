<?php
$mysqli = new mysqli("3.133.100.99", "kang851216", "rkdrudals1", "RAWDATA");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT machineno, doorstat, hopperstat 
FROM data WHERE machineno = ? ";
$sql2 = "SELECT machineno, location, firmupdatedate
FROM machineinfo WHERE machineno = ? ";

$stmt1 = $mysqli->prepare($sql);
$stmt1->bind_param("s", $_GET['q']);
$stmt1->execute();
$result1 = $stmt1->get_result();
$stmt2 = $mysqli->prepare($sql2);
$stmt2->bind_param("s", $_GET['q']);
$stmt2->execute();
$result2 = $stmt2->get_result();
$res2 = $result2->fetch_array(MYSQLI_BOTH);

while($res1 = $result1->fetch_array(MYSQLI_BOTH)){
  echo "<tr>";
  echo "<td>" . $res1['machineno'] . "</td>";
  echo "<td>" . $res2['location'] . "</td>";
  echo "<td>" . $res2['firmupdatedate'] . "</td>";
  echo "<td>" . $res1['doorstat'] . "</td>";
  echo "<td>" . $res1['hopperstat'] . "</td>";
  echo "</tr>";
}
$stmt1->close();
$stmt2->close();
?>