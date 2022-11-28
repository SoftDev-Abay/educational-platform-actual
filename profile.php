<!DOCTYPE html>
<head>
  <link href="before.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <style>
    * {
      padding: 0;
      margin: 0;
      font-family: 'Poppins', sans-serif
    }

    .container {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #eee
    }

    .card {
      width: 350px;
      height: 580px;
      background-color: #fff;
      box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
    }

    .card .info {
      padding: 15px;
      display: flex;
      justify-content: space-between;
      border-bottom: 1px solid #e1dede;
      background-color: #e5e5e5 
    }

    .card .info input {
      height: 30px;
      width: 80px;
      border: none;
      color: #fff;
      border-radius: 4px;
      background-color: #000;
      cursor: pointer;
      text-transform: uppercase
    }
     /*.card .info input:hover {
       
      font-weight: bold;
      
      background-color: #34AF6D; 
      color:black;
      background-color: white;
      border:black solid 2.5px;
      transition: 0.2s;
    } */

    .card .forms {
      padding: 15px
    }

    .card .inputs {
      display: flex;
      flex-direction: column;
      margin-bottom: 10px
    }

    .card .inputs span {
      font-size: 12px
    }

    .card .inputs input {
      height: 40px;
      padding: 0px 10px;
      font-size: 17px;
      box-shadow: none;
      outline: none
    }

    .card .inputs input[type="text"][readonly] {
      border: 2px solid rgba(0, 0, 0, 0)
    }
    
    .flex_container_select
    {
      display:flex;
      justify-content: space-around;
      margin-top:15px;
      
    }  

    .text_gender
    {
      text-align: center;
      margin-top:15px;
    }
    
    .flex_container_gender
    {
      display:flex;
      justify-content: space-around;
    } 
    
    
    .flex_item1
    {
      margin:3px;
    }   
    
    .radio_button_gender
    {
      height:20px;
      width:20px;
    }
    .label_radio_gender
    {
      vertical-align:middle;
    }
    .fa-user-alt
    {
        color: #0080ff;
    }
    a:hover .fa-user-alt
    {
        color: #0080ff;
    }
  </style>
  <script>
  </script>
  
</head>
<body>
  <?php
  include "index_before.php";
  ?>
  <section class="main-con">
  <?php

  if(empty($_SESSION['role']))   // checks if user is loged in
  {
    header('Refresh: 2; index.php');  // if user is not loged in sends back to authorisation 
    exit;
  }  
  require_once 'connection.php';
  // retrieves all the nessary data for connection
  $link = mysqli_connect($host, $user, $password, $database)  
  or die("Ошибка " . mysqli_error($link));        // connecting to the database 
  mysqli_query($link,"SET CHARACTER SET 'utf8'");//this 
  mysqli_query($link,"SET SESSION collation_connection ='utf8_unicode_ci'");//and this line adds the Cyrillic alphabet to the database

  if (isset($_POST['but_input'])) // if button "but_input" is clicked then this code will run
  {    
   $query =" UPDATE tbl_users SET Login ='".$_POST['login']."' , Password = '".$_POST['password']."', Name = '".$_POST['name']."', Surname = '".$_POST['surname']."', Grade = '".$_POST['grade']."', Class_Index = '".$_POST['grade'].$_POST['class_index']."', Gender = '".$_POST['gender']."' WHERE Student_ID  = '".$_SESSION['ID']."'  ";  
   // a query to update the existing data with the data that user wrote inside the profile form   
   $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link));  // executes the query
   
   if($result)
   {
     $query1 = "Select * from tbl_users WHERE Student_ID='".$_SESSION['ID']."'"; // retrives all the data from table users about student that is currently loged in 
     $result1 = mysqli_query($link, $query1) or die("Ошибка"  . mysqli_error($link)); 
     $row1 = mysqli_fetch_row($result1);
     $_SESSION['data_array'] =$row1;     
     $_SESSION['Grade']= $_SESSION['data_array'][6];   // stores a grade of the student inside the global session so that it can be used later on other pages 
     header('Refresh: 2; profile.php'); // after updating the data is done user is send back to main page(index.php)          
     mysqli_close($link); // closing a link
   }     

 }
 else{ // if button is not clicked then this code starts running  
 $query = "Select * from tbl_users WHERE Student_ID='".$_SESSION['ID']."'";    // retrives all the data from table users about student that is currently loged in 
 $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
 $row = mysqli_fetch_row($result);   // stores the data inside an array 
 $arrIndexClass= $row[7];
// $count=strlen($row[7]);
//  $fullClassIndex;
//  if($count==2)
//  {
//      $fullClassIndex=$arrIndexClass[1];
//  }
//  elseif($count==3)
//  {
//      $fullClassIndex=$arrIndexClass[2];
//  }
 echo '<form action="profile.php" method="post">  
   <div class="container">
    <div class="card">
      <div class="info"> <span>Edit form</span> <input type="submit" value="Edit" id="savebutton" name="but_input" > </div>       
      <div class="forms">
        <div class="inputs"> <span>First Name</span> <input type="text" name="name" value="'.$row[2].'"> </div>
        <div class="inputs"> <span>Last Name</span> <input type="text" name="surname"  value="'.$row[8].'"> </div>            
        <div class="inputs"> <span>Login</span> <input type="text"  name="login" value="'.$row[0].'"> </div>
        <div class="inputs"> <span>Password</span> <input type="text"  name="password"  value="'.$row[1].'"> </div>              
        ';
    if ($_SESSION['role'] == 'user')
    {
    echo'
        <div class="flex_container_select">
          <div class="flex_item">
            <span>Grade</span>
            <select name="grade" id="selected_grade">     
              <option selected hidden>'.$row[6].'</option>
              <option  value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>          
          

          <div class="flex_item">
            <span>Grade-Index</span>
            <select name="class_index" id="selected_index"> 
              <option selected hidden>'.$row[7].'</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              
              <option value="E">E</option>
              <option value="F">F</option>
              <option value="G">G</option>
              
            </select></div></div>
            ';}
            echo '
            <div class = "text_gender">Gender</div>
            
            <div class="flex_container_gender">

              ';  // shows a profile form(first name, second name, login, password, grade, class index ) with current student information already written inside input windows  
                if($row[3] == "male") 
                {
                  echo '
                  <div class="flex_item1" >  <input type="radio" name="gender" checked value="male" class="radio_button_gender required ">Male </div>
                  <div class="flex_item1" >  <input type="radio" name="gender" value="female" class="radio_button_gender" required >Female </div>
                  ';

                }
                if($row[3] == "female")
                {
                 echo '
                 <div class="flex_item1" >  <input type="radio" name="gender" value="male" class="radio_button_gender" required>Male</div>
                 <div class="flex_item1" > <input type="radio" name="gender" value="female" class="radio_button_gender"checked required>Female  </div>                 
                 ';
               }// two radio buttons to choose a gender 
               echo '
             </form>
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
</html>