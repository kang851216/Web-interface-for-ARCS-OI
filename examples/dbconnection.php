<style>
table
{
    width: 100%;
    border-collapse: collapse;
}
table, td, th
{
    border: 1px solid black;
    padding: 5px;
}
th
{
    text-align: left;
}
</style>
<?php
$mysqli = new mysqli("3.133.100.99", "kang851216", "rkdrudals1", "RAWDATA");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT date, time, machineno, QRcode, weight
FROM data WHERE QRcode = '234'";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

echo "<table>";
while($res = $result->fetch_array(MYSQLI_ASSOC)){

    echo "<tr>";
    echo "<th>date</th>";
    echo "<td>" . $res['date'] . "</td>";
    echo "<th>time</th>";
    echo "<td>" . $res['time']  . "</td>";
    echo "<th>machineno</th>";
    echo "<td>" . $res['machineno']  . "</td>";
    echo "<th>QRcode</th>";
    echo "<td>" . $res['QRcode'] . "</td>";
    echo "<th>weight</th>";
    echo "<td>" . $res['weight'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>