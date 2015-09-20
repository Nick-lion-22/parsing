<?php
/* Подключение к базе данных ODBC, используя вызов драйвера */
function conect($dom){
$dsn = 'mysql:dbname=u166302776_parsi;host=localhost';
$user = 'u166302776_parsi';
$password = 'mister.sty23';
//var_dump($dom);
try {

    $dbh = new PDO($dsn, $user, $password);
    $query = $dbh->prepare("TRUNCATE TABLE vizaparsing");
    $query->execute();

} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
     for($n=0;$n<count($dom);$n++){
    $date=$dom[$n]['date'];
    $time=$dom[$n]['time'];
//    echo $date;
//    echo $time;
//    $id='1';
    $query = $dbh->prepare("INSERT INTO vizaparsing(date, time) VALUES (?, ?)");
//    $query = $dbh->prepare("UPDATE  vizaparsing SET VALUE date= (?)");
//    $sql = "UPDATE vizaparsing SET  time= ".$time." WHERE id = ".$id.";";
//    $query = $dbh->prepare($sql);
    $query->execute(array($date,$time));
     }
//    $query->execute();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $query = $dbh->prepare("SELECT * FROM vizaparsing");
    $query->execute();
//    $query->execute(array('21/08/2014'));
echo
"<form method='get' action='https://adm.tlscontact.com/ae2dk/index.php?fg_id=4253314'>
<table border='2' border-color='rgb(0, 0, 206)' >
<tr>
<th>id</th>
<th>date</th>
<th>time</th>

</tr>";
for($i=0; $row = $query->fetch(); $i++){
    echo "<tr>"."";
  echo "<td>" . $row['id'] . "</td>";
//  echo "<td>" . $row['country'] . "</td>";
//  echo "<td>" . $row['type'] . "</td>";
//  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['time'] . "</td>";
//  echo "<td>" . $row['status'] . "</td>";
//  echo "<td>" . $row['Available'] . "</td>";
  echo "<td> <input type=\"submit\" style=\"background-color: rgb(43, 253, 43);\" value=\"Assign\"onClick=\accept.php?id=" . $row['id'] . "&start=true></td>";
}
echo "</tr>";
echo "</table>";
echo "</form>";
//print_r(PDO::getAvailableDrivers());
}

?>
