<?php
      date_default_timezone_set('Asia/Almaty'); 
      include 'connection-comments.php';
      include 'comments.inc.php';
      if(!$conn)
    {
	    die("Connection Failed:".mysqli_connect_error());
    }
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Page Title</title>
<link rel="stylesheet" type="text/css" href="css/style-comments.css">
<link href="before.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
 <script>
   function resetForm()
   {
   }
 </script>
  
  <style>

</style>
  
</head>
<body>

<?php
    include "index_before.php";
    ?>
    <section class="main-con">
<?php


echo 
  "<div class='first'>
  <h1 class='type'> Leave a reply </h1>
  <form  id='comment-form' method='POST' action='".setComments($conn)."' >
 
 
<br>
<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
<input type='hidden' name='comment-id' value='" . uniqid() . "'>
<p>Comment</p>
<textarea  name='message' placeholder='Type your comment here.'> </textarea>
<br>
<button  onclick='resetForm()' class='commentbutton' type='submit' name='commentSubmit'>Post comment</button>
</form>

</div>
<h1 class='headdiv2'>Comments</h1>
";
getComment($conn);
?>
</section>
</div>


</body>
</html>