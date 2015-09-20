<?php
/* Подключение к базе данных ODBC, используя вызов драйвера */
include_once('simple_html_dom.php');
function conect($dom){
    $dsn = 'mysql:dbname=xaxax.com;host=localhost';
    $user = 'xaxax.com';
    $password = 'YeAyA3USsq';
//var_dump($dom);
    try {

        $dbh = new PDO($dsn, $user, $password);
        $query = $dbh->prepare("TRUNCATE TABLE portugales");
        $query->execute();

} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
     for($n=0;$n<count($dom);$n++){
    $date=$dom[$n][0];
    $day=$dom[$n][1];
//    echo $date;
//    echo $time;
//    $id='1';
    $query = $dbh->prepare("INSERT INTO portugales(date, day) VALUES (?, ?)");
//    $query = $dbh->prepare("UPDATE  vizaparsing SET VALUE date= (?)");
//    $sql = "UPDATE vizaparsing SET  time= ".$time." WHERE id = ".$id.";";
//    $query = $dbh->prepare($sql);
    $query->execute(array($date,$day));
     }
//    $query->execute();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $query = $dbh->prepare("SELECT * FROM portugales");
    $query->execute();
//    $query->execute(array('21/08/2014'));
echo
"<form method='GET' action='http://www.secomunidades.pt/vistos/index.php?option=com_content&view=article&id=204&Itemid=161&lang=en'>
<table border='2' border-color='rgb(0, 0, 206)' >
<tr>
<th>id</th>
<th>date</th>
<th>day</th>

</tr>";
for($i=0; $row = $query->fetch(); $i++){
    echo "<tr>"."";
  echo "<td>" . $row['id'] . "</td>";
//  echo "<td>" . $row['country'] . "</td>";
//  echo "<td>" . $row['type'] . "</td>";
//  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['day'] . "</td>";
//  echo "<td>" . $row['status'] . "</td>";
//  echo "<td>" . $row['Available'] . "</td>";
//  echo "<td> <input type=\"submit\" style=\"background-color: rgb(43, 253, 43);\" value=\"Assign\"&start=true></td>";
    echo "<td> <input type=\"submit\" style=\"background-color: rgb(43, 253, 43);\" value=\"Assign\"></td>";
}
echo "</tr>";
echo "</table>";
echo "</form>";
//print_r(PDO::getAvailableDrivers());
}



?>
