<?php
 $index = true;
    session_start();
    if ($_SESSION['role'] == 'admin')
    {
    echo'
<div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="img/logo_learn.png">
          <span class="nav-item">Teacher</span>
        </a></li>
        <li><a href="profile.php">
          <i class="fas fa-user-alt "></i>
          <span class="nav-item">Profile</span>
        </a></li>
        <li><a href="create_lesson_test.php">
          <i class="fas fa-book"></i>
          <span class="nav-item">Create a lesson</span>
        </a></li>
        <li><a href="create_task.php">
          <i class="fas fa-clipboard-list"></i>
          <span class="nav-item">Create task</span>
        </a></li>


        <li><a href="tables.php">
          <i class="fas fa-database"></i>
          <span class="nav-item">Database</span>
        </a></li>
        <li><a href="subjects.php">
          <i class="fas fa-book-open"></i>
          <span class="nav-item">Lessons</span>
        </a></li>
        <li><a href="assignments.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Assignments</span>
        </a></li>
        <li><a href="index-comments.php">
          <i class="fas fa-comment"></i>
          <span class="nav-item">Comments</span>
        </a></li>

        <li><a href="log_out.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>
    ';
    }
    elseif($_SESSION['role'] == 'user')
    {
     echo'
     <div class="container">
     <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="img/logo_learn.png">
          <span class="nav-item">Student</span>
        </a></li>
        <li><a href="profile.php">
          <i class="fas fa-user-alt "></i>
          <span class="nav-item">Profile</span>
        </a></li>
        <li><a href="subjects.php">
          <i class="fas fa-book-open"></i>
          <span class="nav-item">Lessons</span>
        </a></li>
         
        <li><a href="assignments.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Assignments</span>
        </a></li>
        <li><a href="index-comments.php">
          <i class="fas fa-comment"></i>
          <span class="nav-item">Comments</span>
        </a></li>
        <li><a href="log_out.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

     ';
    }
    else
    {
      header("Location: authorization.php");
    }
        // <li><a href="profile.php">
        // <i class="fas fa-database"></i>
        // <span class="nav-item">Profile</span>
        // </a></li>
    ?>
 