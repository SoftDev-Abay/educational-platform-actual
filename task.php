<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="before.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<style>
.form_window{
  text-align: center;
  margin-top:70px;
  opacity :0.95;
  /* background-color:red; */
}
/* iframe{
    background-color:black;
}
iframe .office-form-content {
    -webkit-overflow-scrolling: touch;
    height: 100%;
    overflow: none;
    padding-top: 0px;
    width: 100%;
} */
  /* body {
    background: url(https://thumbs.dreamstime.com/b/assignment-text-notepad-concept-background-assignment-text-notepad-concept-background-221185258.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
} */
iframe
  {
      position:relative;
      bottom:50px;
      padding-top:0px;
  }
 .iframe-window {
    padding-left: 0;
}
  </style>
  </head>
  <body>
  <?php
    include "index_before.php";
    ?>
    <section class="main-con">
    <script>
    document.getElementById('frametest').style.padding= "0px";
    </script>
<?php 
session_start();


require_once 'connection.php'; // подключаем скрипт
	 // подключаемся к серверу
	 $link = mysqli_connect($host, $user, $password, $database) 
	 or die("Ошибка " . mysqli_error($link));
	 mysqli_query($link,"SET CHARACTER SET 'utf8'");//эта строчка
     mysqli_query($link,"SET SESSION collation_connection ='utf8_unicode_ci'");//и эта строчка для того, чтобы кириллица добавлялась в БД
	 // выполняем операции с базой данных
     //$query = "Select * from  tbl_assignments WHERE Assignment_ID='".$_SESSION['assignment_ID']."'";  
	$query = "Select * from  tbl_assignments WHERE Assignment_ID='".$_GET['assignmentID']."'";  
     $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
     $row = mysqli_fetch_row($result);
     $_SESSION['data_array_assignment'] =$row;
echo '



<div class="form_window">

<iframe  id="frametest" class="iframe-window" width="1200px" height="1000px"  src="'.  $_SESSION['data_array_assignment'][4].'"  style="border: none; max-width:100%; max-height:600vh" > </iframe> 
</div>


';
?>
</section>
</div>
  </body>





