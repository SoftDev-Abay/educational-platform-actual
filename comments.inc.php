<?php


function setComments($conn) {
  
  	if (session_status() == PHP_SESSION_NONE) {session_start();}	
  
	if(isset($_POST['commentSubmit']) && isset($_POST['comment-id']))
	{
      
      	if(!isset($_SESSION['comment-id']) || $_SESSION['comment-id']!=$_POST['comment-id'] )
           {
      	
				$uid = $_SESSION['data_array'][0] ;  
			$date = $_POST['date'];
			$message = $_POST['message'];
        	mysqli_query($conn,"SET CHARACTER SET 'utf8'");//эта строчка
        	mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");
			$sql ="INSERT INTO comments (uid, date, message) 
			VALUES('$uid','$date','$message')";
			$result = $conn->query($sql);
          	$_SESSION['comment-id'] = $_POST['comment-id'];
        }
        

	}
}
function getComment($conn)
{
  $sql = "SELECT * FROM comments";
  $result = $conn-> query($sql);
  echo "<div class='divcomment'>";
  while($row = $result->fetch_assoc())
  {
    echo"<div class ='comment-box-container'>";
    echo"<div class ='item1'>";
    echo "<p class='username'>".$row['uid']."</p>";
    echo "<p class='commentdate'>". $row['date']."</p>";
    echo"</div>";
    echo"<div class ='item2'>";
    echo "<p class='commentmessage'>".nl2br($row['message'])."</p>";
    echo"</div>";
    echo"</div>";
  }
  echo "</div>";
}