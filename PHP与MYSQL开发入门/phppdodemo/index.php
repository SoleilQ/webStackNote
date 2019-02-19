<?php 
header("Content-type: text/html;charset=utf-8");
$dbms = "mysql";
$host = "localhost";
$dbName = "test";
$user = "root";
$pass = "";
$dsn = "$dbms:host=$host;dbname=$dbName";
try {
    //code...
  $dbh = new PDO($dsn, $user, $pass);
  echo "连接成功<br/>";
    // foreach($dbh->query("SELECT * FROM news") as $row){
    //   print_r($row);
    // };
  $query = "INSERT INTO `news`(`newstitle`, `newscontent`) VALUES (’laoyuan‘, ’laoyuan old‘)";
  $res = $dbh->exec($query);
  echo "数据库添加成功, 受影响得行数" . $res;
  $dbh = null;
} catch (PDOException $e) {
  die("Error:" . $e . getMessage() . "</br/>");
}
?>