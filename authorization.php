<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/authorisationStyle.css">
<style>

</style>
</head>
<body>

  
  <!-- 
<form action="authorization.php" method="post">
    <fieldset>
    <legend>Введите данные для авторизации:</legend>
    <br> Введите логин:
    <br> <input type="text" name="log" required>
    <br>
    <br> Введите пароль:
    <br> <input type="password" name="pass" required>
    <br> <input type="submit" value="Войти" name="but_input">
    </fieldset>
    </form>');


-->
<?php
session_start();
if (isset($_POST['but_input']))
{
	require_once 'connection.php';
	$link = mysqli_connect($host, $user, $password, $database)or die("Ошибка" . mysqli_error($link));
	$query = "Select * from tbl_users WHERE login='".$_POST['log']."' AND password='".$_POST['pass']."'";
    $result = mysqli_query($link, $query) or die("Ошибка". mysqli_error($link));
    $rows = mysqli_num_rows($result);
    if($rows == 1)
    {
    	
        $row = mysqli_fetch_row($result);
      $_SESSION['Grade'] = $row[6];
        $_SESSION['ID'] = $row[5];
        $_SESSION['data_array'] = $row;
       
        if($row[4] == 'admin')
        {
        $_SESSION['role'] = 'admin'; 
        
        header("Location: subjects.php");
    	mysqli_close($link);
    	exit;
        }
        elseif ($row[4] == 'user')
        {
        $_SESSION['role'] = 'user';  
        header("Location: subjects.php");
    	mysqli_close($link);
    	exit; 
        }
    }
    else
    {
    	echo 'К сожалению учетная записть в базе не обнаруженна!';
    	echo '<br> Вы будете перенаправлены на главную страницу через 3 секунды. !';
    	header('Refresh: 3; authorization.php');
    }
}  
else
{
	echo'  
<div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="login-box">
            <div class="tester-box">
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> 
                    <div class="login-space">
                        <div class="login">
                          <form action="authorization.php" method="post">
                            <div class="group"> <label for="user" class="label">Username</label> <input id="user" name="log" required type="text" class="input" placeholder="Enter your username"> </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" name="pass" required type="password" class="input" data-type="password" placeholder="Enter your password"> </div>
                            <div class="group">  </div>
                            <div class="group"> <input type="submit" class="button button-log-in" value="Log in " name="but_input"> </div>
                          </form>
                            <div class="hr"></div>
                          <div class="foot"> <label for="tab-1"><a href="registration.php"> Do not have an account yet? </label> </a></div>
                        </div>
                        
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




