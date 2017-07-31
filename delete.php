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

//POST 읽어오기.
$name=isset($_POST['name']) ? $_POST['name']:'';

if($name !=""){
  $sql="delete from  BOOKMARK where name like '$name'";
  $result=mysqli_query($link, $sql);

  if($result){
    echo "DB Delete Success";
  }
  else{
    echo "DB Delete Fail";
    echo mysqli_error($link);
  }
}else{
  echo "데이터를 입력하세요";
}

mysqli_close($link);
?>

<?php

$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

if(!$android){
?>

<html>
  <body>
    <form action="<?php $_PHP_SELF ?>" method="POST">
      Name: <input type = "text" name = "name" />
      <input type = "submit" />
    </form>
  </body>
</html>
<?php
}
?>
