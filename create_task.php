<!DOCTYPE html>
<html>
<head>
<link href="before.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<meta charset="UTF-8">
<style>


.button {
    display: inline-block;
    background: #0066ff;
    border-radius: 5px;
    height: 48px;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease
}

.button a {
    display: block;
    font-size: 18px;
    font-weight: 400;
    line-height: 48px;
    color: #FFFFFF;
    padding-left: 35px;
    padding-right: 35px
}

.button:hover {
    opacity: 0.8
}









.contact_form {
    padding: 65px;
      
}


.contact_form_inputs {
    margin-bottom: 30px;
}

.input_field {
    width: calc((100% - 60px) / 3);
    height: 50px;
    padding-left: 25px;
    border: solid 1px #e5e5e5;
    border-radius: 5px;
    outline: none;
    color: #0e8ce4;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease
}

.input_field:focus,
.text_field:focus {
    border-color: #b2b2b2
}

.input_field:hover,
.text_field:hover {
    border-color: #b2b2b2
}

.input_field::-webkit-input-placeholder,
.text_field::-webkit-input-placeholder {
    font-size: 16px;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.3)
}

.input_field:-moz-placeholder,
.text_field:-moz-placeholder {
    font-size: 16px;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.3)
}

.input_field::-moz-placeholder,
.text_field::-moz-placeholder {
    font-size: 16px;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.3)
}

.input_field:-ms-input-placeholder,
.text_field:-ms-input-placeholder {
    font-size: 16px;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.3)
}

.input_field::input-placeholder,
.text_field::input-placeholder {
    font-size: 16px;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.3)
}
.contact_form_title{
    font-size:40px;
    text-align:center;
    margin-bottom:20px;
    font-family: "Gill Sans", sans-serif;
    color: #FFFFFF;
    background:#97cbfa;
}
.text_field {
    width: 100%;
    height: 160px;
    padding-left: 25px;
    padding-top: 15px;
    border: solid 1px #e5e5e5;
    border-radius: 5px;
    color: #0e8ce4;
    outline: none;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease
}

.contact_submit_button {
    padding-left: 35px;
    padding-right: 35px;
    color: #FFFFFF;
    font-size: 18px;
    border: none;
    outline: none;
    cursor: pointer;
    margin-top: 24px
}

.panel {
    width: 100%;
    height: 50px;
    background: #fafafa;
    margin-top: 120px
}
.create-task-container{
    margin-left:auto;
    margin-right:auto;
    margin-top:auto;
    margin-bottom:auto;
    background:#97cbfa;
    border-radius:10px;
    height:70%;
}
.fa-clipboard-list
{
    color: #0080ff;
}
a:hover .fa-clipboard-list
{
    color: #0080ff;
}
</style>
  </head> 
<body>
<?php

    include "index_before.php";
    // echo'adasdasdad';
?>
    <!-- <section class="main-con"> -->
<?php
if(isset($_POST['assignment_submit']))
 {
	 
	 
	 require_once 'connection.php'; // подключаем скрипт
	 // подключаемся к серверу
	 $link = mysqli_connect($host, $user, $password, $database) 
	 or die("Ошибка " . mysqli_error($link));
	 mysqli_query($link,"SET CHARACTER SET 'utf8'");//эта строчка
     mysqli_query($link,"SET SESSION collation_connection ='utf8_unicode_ci'");//и эта строчка для того, чтобы кириллица добавлялась в БД
	 // выполняем операции с базой данных
	  $query ="INSERT INTO tbl_assignments (Name_assignments, Grade, Link, Deadline) 
	 values ('".$_POST['name_assignment']."', '".$_POST["grade"]."', 
	 '".$_POST["link"]."','".$_POST["deadline"]."')";
       
       
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
     
	 if($result)
	 {
       
		 //header('Refresh: 1; lessons.php');
       echo "<script> window.location.replace('lessons.php');</script>";
         
   
    	
	 }		 
	 // закрываем подключение
	 mysqli_close($link);
    
     
 }
  
  
  
  
  else
    {
    echo  '
    <div class="create-task-container">
 <div class="contact_form">
     <div class="container">
         <div class="row">
             <div class="col-lg-10 offset-lg-1">
                 <div class="contact_form_container">
                     <div class="contact_form_title">Assignment</div>
                     <form action="create_task.php" method="post" id="contact_form">
                         <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between"> 
                           <input type="text" id="contact_form_name" name="name_assignment" class="contact_form_name input_field" placeholder="Name" required="required" data-error="Name is required."> 
                           <input type="text" id="contact_form_email"  name ="grade"class="contact_form_email input_field" placeholder="Grade" required="required" data-error="Grade is required."> 
                           <input type="date" id="contact_form_phone" class="contact_form_phone input_field" required="required"  name="deadline"> 
                         </div>
                         <div class="contact_form_text"> 
                           <textarea id="contact_form_message" class="text_field contact_form_message" name="link" rows="4" placeholder="Link of the assignmnet form" required="required" data-error="Please fill in this line."></textarea> </div>
                         <div class="contact_form_button"> <button type="submit" class="button contact_submit_button " name="assignment_submit">Create assignmnet </button> </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
   </div> 
   </div>
  </div>
  ';
    }
?>
    </section>
    </div>
  </body>