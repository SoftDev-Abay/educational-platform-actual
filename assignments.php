<html>
<head>
   <link href="before.css" rel="stylesheet"> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <style> 

 .wrapper {
     margin-top:20px;
     display:grid;
     grid-gap:20px;
}
.single-box {
    /* background-color: #dee; */
    background-color: white;
    border-radius:5px;
    padding:5px 10px 5px 10px;
}
.single-box a {

}
.content-task {
    display:grid;
    grid-template-columns: 60% 38% 2%;
    /* flex-direction: row;
    justify-content: space-between; */
} 

.title{
    text-align:center;
}
.button-ckeck{
    border:none;
    background-color:white;
}
.fa-tasks
{
    color: #0080ff;
}
a:hover .fa-tasks
{
    color: #0080ff;
}
  </style>
  </head>
<body>
    <?php
    include "index_before.php";
    ?>
     <section class="main-con"> 
  <div class="title"><h1>Asssignments</h1></div>
      <div class="wrapper">
 <script>
function Change(clicked_id)
{
	if(document.getElementById(clicked_id).className=="far fa-circle")
    {
    	document.getElementById(clicked_id).className = "far fa-check-circle";
        document.getElementById(clicked_id).style.color = "green";
    }
    else
    {
    	document.getElementById(clicked_id).className = "far fa-circle";
        document.getElementById(clicked_id).style.color = "black";
    }
}
 </script>
<?php


require_once 'connection.php';
	$link = mysqli_connect($host, $user, $password, $database)or die("Ошибка" . mysqli_error($link));
    if ($_SESSION['role'] == 'user')
    {
        $query = "SELECT * FROM tbl_assignments WHERE Grade = '".$_SESSION['Grade']."'";  
    }
    elseif ($_SESSION['role'] == 'admin')
    {
        $query = "SELECT * FROM tbl_assignments";  
    }
   $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
   $check_id_css=0;
//    $class_checked = (Condition) ? (Statement1) : (Statement2);
   while($row = mysqli_fetch_row($result))
  { 
      $check_id_css++;
      $_SESSION['assignment_ID']= $row['0'];  
      date_default_timezone_set('Asia/Almaty');
      $dateTimestamp1= $row['5']; 
      $dateTimestamp2 = date('y-m-d h:i:s');
      $deadline_time = strtotime($dateTimestamp1);
      $current_time = strtotime($dateTimestamp2);
    echo '
    

<div class="single-box">
          <div class="content-task">
                <div class="name"><h3><a href="task.php?assignmentID='.$row['0'].' "">'.($row['3']).'</a></h3></div>
                ';
                if($current_time>=$deadline_time)
                {
                    echo'
                <div class="date" style="color:red;"><h3>'.($row['5']).'</h3></div>
                ';
                }
                elseif($current_time<$deadline_time)
                {
                    echo'
                <div class="date"><h3>'.($row['5']).'</h3></div>
                ';
                }
                echo '
                <div class="icon-check">
                        <i  onclick="Change(this.id)"   style = "font-size:24px; color:'.(($row['5']) ? ("green") : ("black")).';" id ="check-id'.($check_id_css).'" class="'.(($row['5']) ? ("far fa-check-circle") : ("far fa-circle")).'" ></i>
                </div>
          </div>
    </div>
'; 
}


//using php for database
// <div class="icon-check">
//                     <form action="assignments.php" method="post">
//                         <input type="hidden" name="value_of_ckecked" value="'.($row['6']).'">
//                         <button class="button-ckeck" type="submit" name="but_input" value="'.($row['0']).'">
//                         <i  onclick="Change(this.id)"   style = "font-size:24px; color:'.(($row['6']) ? ("green") : ("black")).';" id ="check-id'.($check_id_css).'" class="'.(($row['6']) ? ("far fa-check-circle") : ("far fa-circle")).'" ></i>
//                         </button> 
//                     </form>
//                 </div>


// if (isset($_POST['but_input'])) // if button "but_input" is clicked then this code will run
//   {
//       $value_of_ckecked = !$_POST['value_of_ckecked'];
//       $query ="UPDATE tbl_assignments SET Checked ='".$value_of_ckecked."' WHERE Assignment_ID  = '".$_POST['but_input']."'  ";  
//       $result = mysqli_query($link, $query) or die("Ошибка"  . mysqli_error($link)); 
//   }
?>
</div>
<!--
   

    // <div class="task_item"> 
    //   <div class="task_item_content"> 
    //   '.$row['0'].'
    //     <div class="name"><a href="task.php?assignmentID='.$row[0].' " >'.($row['2']).'</a></div>  
    //     <div class="date"> '.($row['4']).' </div>
        
    //   </div>
    // </div>  

   </div>
  </div>  
  
        <!--
        <div class="single-box">
          <a href="#"><img src="img/6.jpg" /></a>
        </div>
        <div class="single-box">
          <a href="#"><img src="img/1.jpg" /></a>
        </div>
        <div class="single-box">
          <a href="#"><img src="img/2.jpg" /></a>
        </div>
        <div class="single-box">
          <a href="#"><img src="img/3.jpg" /></a>
        </div>
        <div class="single-box">
          <a href="#"><img src="img/4.jpg" /></a>
        </div>
      </div>
    </div>
    -->
  
   </section>
    </div>     
  </body>
  
  
  

</html>