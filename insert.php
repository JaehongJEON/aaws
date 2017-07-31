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
$url=isset($_POST['url']) ? $_POST['url']:'';

if($name !="" and $url !=""){
  $sql="insert into BOOKMARK(name,url) values('$name', '$url')";
  $result=mysqli_query($link, $sql);

  if($result){
    echo "DB Input Success";
  }
  else{
    echo "DB Input Fail";
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
      Url: <input type = "text" name = "url" />
      <input type = "submit" />
    </form>
  </body>
</html>
<?php
}
?>
