
<head>
  <link href="before.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  
  <style> 
  .fa-book-open
{
    color: #0080ff;
}
a:hover .fa-book-open
{
    color: #0080ff;
}
    .container_lessons
    {
      display:flex;
      flex-wrap:wrap;
      width:80%;
      height:80%;
      flex-direction: row;
      margin-left:5%;
     /* border:solid brown ;  */
      background-image:;
      margin-top:5%;
    }
    .lesson_item_content
    {
        
      flex-direction:column;

      padding-bottom:30px;
      
      margin:5% 5% 20% 20%;
      border-radius: 9%;
      /* border:solid #0080ff 2px; */
      background-color:white;   
      opacity:0.9;
    }
    .lesson_item
    {
        margin-left:auto;
        margin-right:auto;
        width:30%;
        min-height:35%;
    }
    .title
    {
      font-size:23px;
      color:#2f2f1e;
      /* background-color:red; */
      border-bottom: 2px solid blue;        
      font-family:"Snell Roundhand", cursive;
      text-align: center;
      width:100%;
      background-color:#34AF6D;
      border: 2px;
    }
    .description
    {
      margin-top:7px;
      padding-left:15px;
      padding-right:15px;
    }
    .description span{
        font-weight:650;
    }

    
    .file_link
    {
      margin-top:7px;
      font-style: oblique;
    }
    .link{
      padding-left:15px;
      padding-right:15px;
    }
    .link span{
        font-weight:650;
    }
    .page_name
    {
      font-family: 'Bebas Neue';
      margin-left:38%;
      font-size:27px;
      font-weight: bold;
      color:black;
      
    }
    .profile-conteiner{
        /* background-color:red; */
        /* display:flex; */
    }
    .profile-conteiner a{
        postion:relative;
        display:flex;
        flex-direction:row;
        /* margin-right:0%; */
        /* flex-direction:right; */
        width: 100px;
        height: 60px;
        font-size: 20px;
        /* text-align: center; */
    }
    .profile-conteiner i{
        text-align: center;
        width:10000px;
    }
    .lesson_item_content a{
        
    }
  </style>
  </head>
    <?php
    include "index_before.php";
    ?>
    <section class="main-con">

    <!--<div class="profile-conteiner">
    <a href="profile.php">
          <span>Profile </span><i class="fas fa-user-alt "></i>
    </a>
    <button class="profile-button">profile</button>
    </div>
    -->
  <div class="page_name"><h1>Lessons</h1></div>
  <div class="container_lessons">
<?php
session_start();
//$_GET['subjectName']
require_once 'connection.php';
	$link = mysqli_connect($host, $user, $password, $database)or die("Ошибка" . mysqli_error($link));
    if ($_SESSION['role'] == 'user')
    {
        $query = "SELECT * FROM tbl_lessons WHERE Grade = '".$_SESSION['Grade']."' AND Subject = '".$_GET['subjectName']."' ";   // $_GET['subjectName'] t current student is studying in 
    }
    elseif ($_SESSION['role'] == 'admin')
    {
        $query = "SELECT * FROM tbl_lessons";   // retieves all the lessons from grade that current student is studying in
    }
    
   $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
   


  while($row = mysqli_fetch_row($result)) // loop which works every time lesson record is retrieved 
  { 
      
      
    echo '
   
    <div class="lesson_item"> 
      <div class="lesson_item_content"> 
        <div class="title">  '.$row['3'].'  </div>  
        <div class="description"> <span>Description:</span> '.($row['4']).'    </div>
         <div class="link">  <span>File:</span><a class="file_link" href="lesson_uploads/'.$row['5'].'" >  '.$row['5'].'   </a>      </div>
        
      </div>
    </div>  
 
   
    
    ';  
    // shows a window with lessons title, description and a link to the file.
  } 
  

?>  
    </section>
    <div>
  
   
        
  </body>
  
  
  
