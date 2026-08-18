   <!DOCTYPE html>
   <html>
   <head>
       <title>Student Profile</title>
   </head>
   <body>
       <h1>Student Information</h1>
       <p>Student ID: <?= $student_id ?></p>
       <p>Name: <?= $name ?></p>
       <p>Course: <?= $course ?></p>
       <p>Year Level: <?= $year ?></p>
       <p>Section: <?= $section ?></p>
       <p>Email: <?= $email ?></p>

       <nav>
           <a href="<?= site_url('student') ?>">Home</a> |
           <a href="<?= site_url('student/profile') ?>">Student Profile</a>
       </nav>
   </body>
   </html>