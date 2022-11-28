<html>
  <head>
<link href="before.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <style>
    @charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

.delete-empty{
    /* background-color:#1F2739; */
    border:none;
    decoration:none;
}


h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}
.fa-database
{
    color: #0080ff;
}
a:hover .fa-database
{
    color: #0080ff;
}
h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.box th h1 {
    font-weight: bold;
    font-size: 1em;
  text-align: left;
  color: #185875;
}

.box td {
    font-weight: normal;
    font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
     -moz-box-shadow: 0 2px 2px -2px #0E1119;
          box-shadow: 0 2px 2px -2px #0E1119;
}

.box {
    text-align: left;
    overflow: hidden;
    width: 80%;
    margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.box td, .box th {
    padding-bottom: 2%;
    padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.box tr:nth-child(odd) {
    background-color: #323C50;
}

/* Background-color of the even rows */
.box tr:nth-child(even) {
    background-color: #2C3446;
}

.box th {
    background-color: #1F2739;
}

.box td:first-child { color: #FB667A; }

.box tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
     -moz-box-shadow: 0 6px 6px -6px #0E1119;
          box-shadow: 0 6px 6px -6px #0E1119;
}

.box .td-animation:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
    transition-duration: 0.4s;
    transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.box td:nth-child(4),
.box th:nth-child(4) { display: none; }
} 

      

.button_delete
{
  padding: 6px 20px;
  border-radius: 10px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #ff3333;
}

.button_delete:hover {
  background: #ff3333;
  color: #fff;
  transition: 0.5rem;

  
}
.attendance{
  margin-top: 20px;
  text-transform: capitalize;
}
.attendance-list{
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.table-others{
  margin-top: 50px;
}
.table{
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 15px;
  min-width: 100%;
  overflow: hidden;
  border-radius: 5px 5px 0 0;
}
table thead tr{
  color: #fff;
  background: #34AF6D;
  text-align: left;
  font-weight: bold;
}
.table th,
.table td{
  padding: 12px 15px;
}
.table tbody tr{
  border-bottom: 1px solid #ddd;
}
.table tbody tr:nth-of-type(odd){
  background: #f3f3f3;
}
.table tbody tr.active{
  font-weight: bold;
  color: #4AD489;
}
.table tbody tr:last-of-type{
  border-bottom: 2px solid #4AD489;
}
.table button{
  padding: 6px 20px;
  border-radius: 10px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #4AD489;
}
.table button:hover{
  background: #4AD489;
  color: #fff;
  transition: 0.5rem;
}
    </style>
  </head>
  <body>
  <?php
  include "index_before.php";
  ?>
  <section class="main-con">
  <?php







     require_once 'connection.php';
	 $link = mysqli_connect($host, $user, $password, $database)or die("Ошибка" . mysqli_error($link));
     mysqli_query($link,"SET CHARACTER SET 'utf8'");//this
     mysqli_query($link,"SET SESSION collation_connection ='utf8_unicode_ci'");//and this line so that the Cyrillic alphabet is added to the database

echo '



    

    
<div class="attendance-list">
          <h1>Students</h1>
          <table class="table">
            <thead>
              <tr>
                <th>Login</th>
                <th>Password</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Grade</th>
                <th>Class Index</th>
                <th>Gender</th>
                <th></th>
              </tr>
            </thead>
  <tbody> 
  ';
    
    
    $query = "SELECT * FROM tbl_users ";  
   $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
   
  


  
     while($row = mysqli_fetch_row($result))
      {
    echo '
    <tr>
      <td>'.$row[0].'</td>
      <td>'.$row[1].'</td>
      <td>'.$row[2].'</td>
      <td>'.$row[8].'</td>
      <td>'.$row[6].'</td>
      <td>'.$row[7].'</td>
      <td>'.$row[3].'</td>
      <td>
        
      <form action="tables.php" method="post" > 
      
      <input  type="hidden" value="' . $row[5] . '" name="student_delete">
      <input class="button_delete" type="submit" value="Delete">     </form>
        ';
       
      if(isset($_POST['student_delete'])) 
 {
            $query = "DELETE FROM tbl_users WHERE Student_ID = '".$_POST['student_delete']."' ";  
            $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
            echo "<script> window.location.replace('tables.php');</script>";
    
 }
       echo'
       
          </td> 
    </tr>
     ';
    }
     echo ' </tbody>
</table> 
</div>';
   

echo '



    

    
        <div class="attendance-list table-others">
          <h1>Assignments</h1>
          <table class="table">
            <thead>
              <tr>
                <th>Title</th>
                <th>Grade</th>
                <th>Deadline</th>
                <th>Link</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
  ';
    


    $query = "SELECT * FROM tbl_assignments ";  
   $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
   
  




     while($row = mysqli_fetch_row($result))
      {
    echo '
    <tr>
      <td>'.$row[3].'</td>
      <td>'.$row[1].'</td>
      <td>'.$row[5].'</td>
      <td>'.$row[4].'</td>
      <td>
       
       
 <form action="tables.php" method="post" > 
      <input  type="hidden" value="'.$row[0].'" name="assignment_delete">
      <input class="button_delete" type="submit" value="Delete">    </form>
        ';
       
      if(isset($_POST['assignment_delete'])) 
 {   


            $query = "DELETE FROM tbl_assignments WHERE Assignment_ID= '".$_POST['assignment_delete']."' ";  
   $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
        
        echo "<script> window.location.replace('tables.php');</script>";
 }    
       echo'

      
      </td>
    </tr>
     ';
    }
     echo ' </tbody>
</table> 
</div>';
 
    

echo '



    

    
<div class="attendance-list table-others">
          <h1>Lessons</h1>
          <table class="table">
            <thead>
              <tr>
                <th>Title</th>
                <th>Grade</th>
                <th>Description</th>
                <th>File Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
  ';
    
 

    $query = "SELECT * FROM tbl_lessons ";  
   $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
   
  


     while($row = mysqli_fetch_row($result))
      {
    echo '
    <tr>
      <td>'.$row[3].'</td>
      <td>'.$row[1].'</td>
      <td>'.$row[4].'</td>
      <td>'.$row[5].'</td>
      
      <td class="delete-empty">
       
    <form action="tables.php" method="post" > 
      <input type="hidden" value="'.$row[0].'" name="lesson_delete">
      <input class="button_delete" type="submit" value="Delete">    </form>
        ';
       
      if(isset($_POST['lesson_delete'])) 
 {
            $query = "DELETE FROM tbl_lessons WHERE Lesson_ID ='".$_POST['lesson_delete']."'";     
   $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
     echo "<script> window.location.replace('tables.php');</script>";
 }     
 
       echo'
      
      
      </td>
      
    </tr>
     ';
     }
     echo ' </tbody>
</table> 
</div>';

    ?>

    
    </section>
    </div>
  </body>
</html>