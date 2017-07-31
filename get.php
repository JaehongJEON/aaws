<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$link=mysqli_connect("localhost","root","@jh890821","Android");
if(!$link)
{
  echo "MySQL 접속 에러 : ";
  echo mysqli_connect_error();
  exit();
}

mysqli_set_charset($link,"utf8");

$sql="select * from BOOKMARK";

$result=mysqli_query($link, $sql);
$data=array();

if($result){
  while($row=mysqli_fetch_array($result)){
    array_push($data, array('name'=>$row[0], 'url'=>$row[1]));
  }
    //echo "<pre>"; print_r($data); echo '</pre>';
    header('Content-Type: application/json; charset=utf8');
    $json=json_encode(array("bookmark_data"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    echo $json;
}
else{
  echo "SQL문 처리중 에러 발생:";
  echo mysqli_error($link);
}
mysqli_close($link);
?>

