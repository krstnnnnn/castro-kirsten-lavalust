   <?php
   defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

   class StudentMiddleware
   {
       public function handle(Closure $next)
       {
           // Simple access condition for this lab activity.
           // Grants access automatically and stores it in the session.
           if (!isset($_SESSION['student_access'])) {
               $_SESSION['student_access'] = true;
           }

           if ($_SESSION['student_access'] === true) {
               return $next();
           }

           // If access is not allowed, send the user back to the student home page.
           redirect('student');
       }
   }