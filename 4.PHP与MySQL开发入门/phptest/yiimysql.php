<?php
header("Content-type: application/json; charset=utf-8");
$con = mysqli_connect("localhost", "root", "123456", "yii2basic");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo "mysql connect ok";
  $sql = "CREATE TABLE `country` (
    `code` CHAR(2) NOT NULL PRIMARY KEY,
    `name` CHAR(52) NOT NULL,
    `population`INT(11) NOT NULL DEFAULT '0'
  ) ENGINE = InnoDB DEFAULT CHARSET=utf8 ";
  mysql.query($con, $sql);
}
mysqli_close($con)
?>