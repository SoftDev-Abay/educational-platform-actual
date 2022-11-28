
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/logo_learn.png" type="image/icon type">
  <link href="test(website)/css/index.css" rel="stylesheet"> 
  <link href="before.css" rel="stylesheet"> 
   <link href="css/subject-style.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<style>
.img-text{
  outline: none;
  text-decoration: none;
}
</style>
<body>
<?php
include "index_before.php";
?>
<section class="main-con">
<?php
echo'
    <div class="subjects-container">
    <div class="wrapper">
        <h1 class="section-header">Which one to prepare for today?</h1>
        <div class="main-content">
            <div class="box">
                <img src="img/english_language.png" alt="">
                <div class="img-text">
                  <a class="choose-link" href="lessons.php?subjectName=english_language">   
                  <div class="content">
                        <h2>English language</h2>
                    <p>English is the most widely spoken language in very different contexts in the world. Therefore, English is not only an inter- national language, but also a global language.</p>
                    </div></a>
                </div>
            </div>
            <div class="box">
                <img src="img/math.jpg" alt="">
                <div class="img-text">
                    <a class="choose-link" href="lessons.php?subjectName=math"> 
                    <div class="content">

                        <h2>Mathematics</h2>
                    <p>Mathematics is the science and study of quality, space, and change. Mathematicians seek out patterns, and establish truth by rigorous deduction from appropriately chosen axioms and definitions.</p>
                    </div>
                    </a>
                </div>
            </div>
            <div class="box">
                <img src="img/physics.jpg" alt="">
                <div class="img-text">
                   <a class="choose-link" href="lessons.php?subjectName=physics"> 
                    <div class="content">
                        <h2>Physics</h2>
                    <p>Physics is the most fundamental scientific disciplines, with its main goal being to understand how the universe behaves.</p>
                    </div>
                </a>
                </div>
            </div>
            <div class="box">
                <img src="img/chemistry.jpg" alt="">
                <div class="img-text">
                   <a class="choose-link" href="lessons.php?subjectName=chemistry">  <div class="content">
                        <h2>Chemistry</h2>
                    <p>Chemistry is a branch of science that deals with atoms, molecules, ions which makes the compounds that are essential for daily life by means of some chemical reactions.</p>
                    </div> </a>
                </div>
            </div>

            <div class="box">
                <img src="img/computer_science.jpg" alt="">
                <div class="img-text">
                    <a class="choose-link" href="lessons.php?subjectName=computer_science"> <div class="content">
                        <h2>Computer science</h2>
                    <p> It is a field which includes everything from the algorithms that make up software to how software interacts with hardware and how well software is developed.</p>
                    </div></a>
                </div>
            </div>
            <div class="box">
                <img src="img/russian_language.jpg" alt="">
                <div class="img-text">
                   <a class="choose-link" href="lessons.php?subjectName=russian_language">  <div class="content">
                        <h2>Russian language</h2>
                    <p>The Russian language is the principal state and cultural language of Russia. It is also used as a second language in former republics of the Soviet Union.</p>
                    </div></a>
                </div>
            </div>
            <div class="box">
                <img src="img/modern_kazakhstan.jpg" alt="">
                <div class="img-text">
                  <a class="choose-link" href="lessons.php?subjectName=modern_kazakhstan">   
                  <div class="content">
                        <h2>Kazakhstan in Modern World</h2>
                    <p>Kazakhstan in the modern world describes current and future problems, and most importantly - determines the future development of the country.</p>
                    </div></a>
                </div>
            </div>
            
            <div class="box">
                <img src="img/kazak_language.jpg" alt="">
                <div class="img-text">
                   <a class="choose-link" href="lessons.php?subjectName=kazak_language">  <div class="content">
                        <h2>Kazak language</h2>
                    <p>Kazakh belongs to the Turkic group of languages. Kazakh language is the most widely spoken language of the Kipchak sub-branch of the Turkic languages.</p>
                    </div></a>
                </div>
            </div>
        </div>
    </div>
    </div>
';
?>
</section>
</div>
</body>
  