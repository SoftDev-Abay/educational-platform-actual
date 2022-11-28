<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/registrationStyle.css">
<style>

</style>
</head>
<body>
<script>
function SelectRoleChange(clickedId)
{
	if(clickedId=="select-role-item-1")
    {
    	document.getElementById("select-role-item-1").style.backgroundColor = "#1161ee";
        document.getElementById("select-role-item-1").style.color = "white";
        document.getElementById("select-role-item-2").style.backgroundColor = "white";
        document.getElementById("select-role-item-2").style.color = "#1161ee";
        document.getElementById("studentForm").style.display = "none"; 
        document.getElementById("teacherForm").style.display = "block";
    }
    else
    {
    	document.getElementById("select-role-item-2").style.backgroundColor = "#1161ee";
        document.getElementById("select-role-item-2").style.color = "white";
        document.getElementById("select-role-item-1").style.backgroundColor = "white";
        document.getElementById("select-role-item-1").style.color = "#1161ee";
        document.getElementById("studentForm").style.display = "block"; 
        document.getElementById("teacherForm").style.display = "none";
    }
    // document.getElementById("select-role-item-1").style.color = "#39a2a2";
}
</script>


 <?php
//  require_once 'connection.php'; // подключаем скрипт
// 	 // подключаемся к серверу
// 	 $link = mysqli_connect($host, $user, $password, $database) 
// 	 or die("Ошибка " . mysqli_error($link));
// 	 mysqli_query($link,"SET CHARACTER SET 'utf8'");//эта строчка
//      mysqli_query($link,"SET SESSION collation_connection ='utf8_unicode_ci'");
 require_once 'connection.php';
  $link = mysqli_connect($host, $user, $password, $database) 
	 or die("Ошибка " . mysqli_error($link));
	 mysqli_query($link,"SET CHARACTER SET 'utf8'");//эта строчка
     mysqli_query($link,"SET SESSION collation_connection ='utf8_unicode_ci'");
     
 if(isset($_POST['but_input']))
 {
     $query1 = "Select * from tbl_users WHERE login='".$_POST['login']."' ";
    $result1 = mysqli_query($link, $query1) or die("Ошибка". mysqli_error($link));
    $rows1 = mysqli_num_rows($result1);
	 if (($_POST["password"]) != ($_POST["password2"]))
	 {
		 echo ('Пароли не совпадают');
		 header('Refresh: 4; registration.php');
	 }
     elseif($rows1 == 1)
     {
         echo 'Student with such a login name already exists.';
         header('Refresh: 4; registration.php'); 
     }
	 else
	 {
	  // подключаем скрипт
	 // подключаемся к серверу
	//и эта строчка для того, чтобы кириллица добавлялась в БД
	 // выполняем операции с базой данных
	 $query ="INSERT INTO tbl_users (Login, Password, Name, Surname, Grade, Class_Index, Gender) 
	 values ('".$_POST['login']."', '".$_POST["password"]."', 
	 '".$_POST["name"]."','".$_POST["surname"]."','".$_POST['grade']."','".$_POST['class_index']."','".$_POST["gender"]."')";
       
       
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	 if($result)
	 {
		 echo ('Поздравляем, Вы зарегистрированы!'); 
         echo '<br> Вы будете перенаправлены на главную страницу сайта через 3 секунды. !';
    	header('Refresh: 3; subjects.php');
	 }		 
	 // закрываем подключение
	 mysqli_close($link);
    }
     
 }
 elseif(isset($_POST['but_input_teacher']))
 {
     $query2 = "Select * from tbl_users WHERE login='".$_POST['login']."' ";
    $result2 = mysqli_query($link, $query2) or die("Ошибка". mysqli_error($link));
    $rows2 = mysqli_num_rows($result2);
	 if (($_POST["password"]) != ($_POST["password2"]))
	 {
		 echo ('Пароли не совпадают');
		 header('Refresh: 4; registration.php');
	 }
     elseif($rows2 == 1)
     {
         echo 'Teacher with such a login name already exists.';
         header('Refresh: 4; registration.php'); 
     }
	 else
	 {
	  // подключаем скрипт
	 // подключаемся к серверу
	 $query ="INSERT INTO tbl_users (Login, Password, Name, Surname, Grade, Class_Index, Gender, Role) 
	 values ('".$_POST['login']."', '".$_POST["password"]."', 
	 '".$_POST["name"]."','".$_POST["surname"]."','11','".$_POST['class_index']."','".$_POST["gender"]."','admin')";
       
       
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	 if($result)
	 {
		 echo ('Поздравляем, Вы зарегистрированы!'); 
         echo '<br> Вы будете перенаправлены на главную страницу сайта через 3 секунды. !';
    	header('Refresh: 3; subjects.php');
	 }		 
	 // закрываем подключение
	 mysqli_close($link);
    }
     
 }
    else
    {
	echo '	  
  
<div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="login-box">
                <div class="tester-box">
                <div class="login-snip"> <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
                    <div class="select-role">
                    <button onclick="SelectRoleChange(this.id)" id = "select-role-item-1" class="select-role-item select-role-item-1">Teacher</button>
                    <button onclick="SelectRoleChange(this.id)" id = "select-role-item-2" class="select-role-item select-role-item-2">Student</button>
                    </div>

                    <div class="login-space">
                    <div id="studentForm" class="student-form">
                         <form action="registration.php" method="post">
                    
                            <div class="group"> <label for="user" class="label">Username</label> <input  name="login" required id="user" type="text" class="input" placeholder="Create your Username"> </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" name="password" required class="input" data-type="password" placeholder="Create your password"> </div>
                            <div class="group"> <label for="pass" class="label">Repeat Password</label> <input id="pass" name="password2" required type="password" class="input" data-type="password" placeholder="Repeat your password"> </div>
                            
                            <div class="group"> <label for="user" class="label">First name</label> <input id="user" type="text" class="input" name="name" placeholder="Write your actual name" required > </div>
                            <div class="group"> <label for="user" class="label">Second name</label> <input id="user" type="text" class="input" name="surname" placeholder="Write your actual surname" > </div>
                            <div class="group"> 
                            <div class="select-grade-index">
                            <div class="select-grade"> 
                           <span>Grade</span>
                                <select name="grade" >
                            <option  value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                                </select>
                                </div>
                            <div class="select-index">
                            <span>Class-Index</span>
                            <select name="class_index" >
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                            </select>
                            </div>
                             </div>
                           </div>
                           
                           <div class="group"> 
                           <div class="radio-gender">
                            <div class="flex_item1" >  <input type="radio" name="gender" checked value="male" class="radio_button_gender" required >Male </div>
               <div class="flex_item1" >  <input type="radio" name="gender" value="female" class="radio_button_gender" required >Female </div>
                           </div>
                           </div>
                            <div class="group"> <input type="submit" class="button button-sign-up" value="Sign Up" name="but_input" > </div>
                            <div class="hr"></div>
                           
                      </form>
                      </div>
                      <div id="teacherForm" class="teacher-form">
                            <form action="registration.php" method="post">
                    
                            <div class="group"> 
                                <label for="user" class="label">Username</label> 
                                <input  name="login" required id="user" type="text" class="input" placeholder="Create your Username"> 
                            </div>
                            <div class="group"> 
                                <label for="pass" class="label">Password</label> 
                                <input id="pass" type="password" name="password" required class="input" data-type="password" placeholder="Create your password"> 
                            </div>
                            <div class="group"> 
                                <label for="pass" class="label">Repeat Password</label> 
                                <input id="pass" name="password2" required type="password" class="input" data-type="password" placeholder="Repeat your password"> 
                            </div>
                            
                            <div class="group"> <label for="user" class="label">First name</label> <input id="user" type="text" class="input" name="name" placeholder="Write your actual name" required > </div>
                            <div class="group"> <label for="user" class="label">Second name</label> <input id="user" type="text" class="input" name="surname" placeholder="Write your actual surname" > </div>
                           
                           <div class="group">  
                           <div class="radio-gender">
                            <div class="flex_item1" >  <input type="radio" name="gender" checked value="male" class="radio_button_gender" required >Male </div>
               <div class="flex_item1" >  <input type="radio" name="gender" value="female" class="radio_button_gender" required >Female </div>
                           </div>
                           </div>
                            <div class="group"> <input type="submit" class="button button-sign-up" value="Sign Up" name="but_input_teacher" > </div>
                            <div class="hr"></div>
                           
                      </form>
                      </div>
                        <div class="foot"> <label for="tab-1"><a href="authorization.php" >Already Member?</label> </a></div>
                    </div>
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
  
</body>
</html>

