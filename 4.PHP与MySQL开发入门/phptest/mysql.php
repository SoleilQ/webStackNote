<?php
header("Content-type: application/json; charset=utf-8");
$con = mysqli_connect("localhost", "root", "", "phplesson");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo "mysql connect ok";
  mysqli_query($con, "set names 'utf8'");
  // $newstitle = $_REQUEST['newstitle'];
  // $newsimg = $_REQUEST['newsimg'];
  // $newscontent = $_REQUEST['newscontent'];
  // $addtime = $_REQUEST['addtime'];
  // $sql = "INSERT INTO `news`(`newstitle`, `newsimg`, `newscontent`, `addtime`) VALUES (
  //   '".$newstitle."', '".$newsimg."', '".$newscontent."', '".$addtime."')";
  //$sql = "DELETE  FROM `news` WHERE newsid=2";
  //$sql = "UPDATE `news` SET `newstitle`='更改的title',`newsimg`='更改的img' WHERE newsid=6";
  $sql = "SELECT * FROM news";
  // if (mysqli_query($con, $sql)) {
  //   echo "success";
  // } else {
  //   echo "Error";
  // }
  $result = mysqli_query($con, $sql);
  $arr = array();
  while($row = mysqli_fetch_assoc($result)) {
    //echo $row["newstitle"]. " " . $row["newsimg"]. "<br>";
    array_push($arr, array("newstitle"=> $row["newstitle"], "newsimg"=>$row["newsimg"]));
  }
  $result = array("errcode"=> 0, "result" => $arr);
  echo json_encode($result);
}
mysqli_close($con);
?>