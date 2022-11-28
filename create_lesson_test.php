<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="before.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>     
  <style>
    .main-con{
        left:20%;
    }
    .container{
        margin-left:0px;
        padding-left:0px;
    }
    .card-0 {
      min-height: 70vh;
      max-height: 500vh;
      background: #0275d8;
      color: white;
      margin-top: 0px;
     margin-bottom: 0px;
    }

    p {
      font-size: 15px;
      line-height: 25px !important;
      font-weight: 500
    }

    .box {
      padding-top: 80px !important;
      border-radius: 20px;
      justify-content:center;
    }

    .btn {
      letter-spacing: 1px
    }

    select:active {
      box-shadow: none !important;
      outline-width: 0 !important
    }

    select:after {
      box-shadow: none !important;
      outline-width: 0 !important
    }

    input,
    textarea {
      padding: 10px 12px 10px 12px;
      border: 1px solid lightgrey;
      border-radius: 0px !important;
      margin-bottom: 5px;
      margin-top: 2px;
      width: 100%;
      box-sizing: border-box;
      color: #2C3E50;
      font-size: 14px;
      letter-spacing: 1px;
      resize: none
    }

    select:focus,
    input:focus {
      box-shadow: none !important;
      border: 1px solid #2196F3 !important;
      outline-width: 0 !important;
      font-weight: 400
    }

    label {
      margin-bottom: 2px;
      font-weight: bolder;
      font-size: 14px
    }

    input:focus,
    textarea:focus {
      -moz-box-shadow: none !important;
      -webkit-box-shadow: none !important;
      box-shadow: none !important;
      border: 1px solid #304FFE;
      outline-width: 0
    }

    button:focus {
      -moz-box-shadow: none !important;
      -webkit-box-shadow: none !important;
      box-shadow: none !important;
      outline-width: 0
    }

    .form-control {
      height: calc(2em + .75rem + 3px)
    }

    .inner-card {
      margin: 79px 0px 70px 0px
    }


    .card-1 {
      border-radius: 17px;
      color: black;
      box-shadow: 2px 4px 15px 0px rgb(0, 0, 0, 0.5) !important
    }

    #file {
      border: 2px dashed #92b0b3 !important
    }

    .color input {
      background-color: #f1f1f1
    }

    .files:before {
      position: absolute;
      bottom: 60px;
      left: 0;
      width: 100%;
      content: attr(data-before);
      color: #000;
      font-size: 12px;
      font-weight: 600;
      text-align: center
    }

    #file {
      display: inline-block;
      width: 100%;
      padding: 95px 0 0 100%;
      background: url('https://i.imgur.com/VXWKoBD.png') top center no-repeat #fff;
      background-size: 55px 55px
    }
    .fa-book
    {
        color: #0080ff;
    }
    a:hover .fa-book
    {
        color: #0080ff;
    }          
    .selects{
        display:flex;
        flex-direction:row;
    }    
    .select-item2{
        margin-left:25px;
    }
  </style>
</head>

<body>
    <?php
    include "index_before.php";
    ?>
    <section class="main-con">  

 <?php
 require_once 'connection.php'; // gets the nessary data to connect to the database

 $link = mysqli_connect($host, $user, $password, $database)  // connects to the database
 or die("Ошибка " . mysqli_error($link));
 mysqli_query($link,"SET CHARACTER SET 'utf8'");//эта строчка
 mysqli_query($link,"SET SESSION collation_connection ='utf8_unicode_ci'");//и эта строчка для того, чтобы кириллица добавлялась в БД

 if(isset($_POST['lesson_button_submit'])) // checks whether button was clicked or not 
 {
   $file=$_FILES['file']; // retrieves all the data about uploaded file and stores it as an associative array
   $fileName = $_FILES['file']['name']; //gets the name of a file
   $fileTmpName = $_FILES['file']['tmp_name']; // gets a temprorary location of the file
   $fileSize = $_FILES['file']['size']; // gets a size of the file
   $fileError = $_FILES['file']['error']; // gets a a statement that shows if there was any error during uploading a file
   $fileName = $_FILES['file']['name'];  // gets a name of the stored file
   $fileType = $_FILES['file']['type'];  // gets a type of the file 
   $fileExt= explode('.',$fileName); // breaks an array and creates a new array that contains a file extension 
   $fileActualExt= strtolower(end($fileExt)); // gets the actual file extension and changes its first letter to lower letter to avoid errors 
   $allowed = array('jpg', 'jpeg', 'png', 'pdf','pptx','ppsx','DOC') ; // stores a range of allowed extesions 
   if(in_array($fileActualExt,$allowed))
   {
     if($fileError === 0 ) // checks if any error ocurred 
     {
       if($fileSize < 5000000) // checks if file size is lower than a limit - 500mb
       {
         $fileDestination = 'lesson_uploads/'.$fileName; // gets a new location of a file 
         move_uploaded_file($fileTmpName,$fileDestination);   // using a function moves a file to its new location on the hosting.
         $query ="INSERT INTO tbl_lessons ( Grade, Name_Lesson, Description, file_name, Subject) 
         values ('".$_POST['lesson_grade']."', '".$_POST["lesson_title"]."', 
         '".$_POST["lesson_description"]."','".$fileName."', 
         '".$_POST["subject"]."')";      // first gets data written by user inside a form then executes a query add new lesson with it corresponding data -  file, title, description and grade.    
         $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
         if($result)
         {
           echo "<script> window.location.replace('lessons.php');</script>"; // java script used to send user back to main page
         }    
       }
       else
       {
         echo'Your file is too big!!!____max - 500mb  '; // shown if file is bigger than limit 
           echo '<script> 
     window.setTimeout(function() 
     {
     window.location.href = "create_lesson_test.php";   
     }
     , 5000);
     </script>';
       }  
     }
     else
     {
       echo'There was an error uploading your file!!!';   // appears if there was unknown error while uploading a file 
         echo '<script> 
     window.setTimeout(function() 
     {
     window.location.href = "create_lesson_test.php";   
     }
     , 5000);
     </script>';
     }  
   }
   else
   {
     echo'You cannot upload files this type! (jpg, jpeg, png, pdf,pptx,DOC)'; //shown if file extension is not allowed 
     echo '<script> 
     window.setTimeout(function() 
     {
     window.location.href = "create_lesson_test.php";   
     }
     , 5000);
     </script>'; 
   } 


   
   // закрываем подключение
   mysqli_close($link);
 }

 else // shows a create lesson interface/form  if button was not clicked      //for="inputEmail4" for="Company-Name"
 {
  echo  '
  <div class="box card-0 justify-content-center ">
    <div class="card-body px-sm-4 px-0">
      <div class="row justify-content-center mb-5">
        <div class="col-md-10 col">
          <h3 class="font-weight-bold ml-md-0 mx-auto text-center text-sm-left"> Create a lesson </h3>
          <p class="mt-md-4 ml-md-0 ml-2 text-center text-sm-left"> Upload a file of your lesson and it will be avalible for all the students of the selected grade.</p>
        </div>
      </div>
      <div class="row justify-content-center round">
        <div class="col-lg-10 col-md-12 ">
          <div class="card shadow-lg card-1">
           <form action = "create_lesson_test.php" method="post" enctype= "multipart/form-data"> 
            <div class="card-body inner-card">
              <div class="row justify-content-center"> 
                <div class="col-lg-5 col-md-6 col-sm-12">

                  <div class="form-group"> <label >Title</label> <input type="text" name="lesson_title" class="form-control" id="Company-Name" placeholder="" required > </div>
                <div class="selects">
                  <div class="select-item">
                  <div class="form-group"> <label >Grade</label> 
                  <select class="form-control" name="lesson_grade" required>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select></div>
                </div>
                <div class="select-item2">
                  <div class="form-group"> <label >Subject</label> 
                  <select class="form-control" name="subject" required>
                    <option value="math">Math</option>
                    <option value="english_language">English language</option>
                    <option value="physics">Physics</option>
                    <option value="chemistry">Chemistry</option>
                    <option value="computer_science">Computer_science</option>
                    <option value="russian_language">Russian language</option>
                    <option value="modern_kazakhstan">Modern kazakhstan</option>
                    <option value="kazak_language">Kazak language</option>
                    
                  </select></div>  
                </div>
                </div>
                </div>
              </div> 
              <div class="row justify-content-center">     
                <div class="col-md-12 col-lg-10 col-12">
                  <div class="form-group files"><label class="my-auto">Upload Your File </label> <input id="file" name="file" required type="file" class="form-control" /></div>
                </div> 
              </div> 
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10 col-12">
                  <div class="form-group"> <label for="exampleFormControlTextarea2">Description</label> <textarea class="form-control rounded-0" required id="exampleFormControlTextarea2" rows="5" name="lesson_description"></textarea></div>
                  <div class="row justify-content-end mb-5">
                    <div class="col-lg-4 col-auto "><button type="submit" name="lesson_button_submit" class="btn btn-primary btn-block"><small class="font-weight-bold">Create</small></button> </div>
                  </div>
                </div> 
              </div> 
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
'; // an actual form 
}
?>
    </section>
</div>
</body>
</html>

