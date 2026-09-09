   <?php
   defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

   class AuthMiddleware
   {
       public function handle(Closure $next)
       {

       if (session_status() === PHP_SESSION_NONE) {
        session_start();
        }

           if (!isset($_SESSION['product_access']) || $_SESSION['product_access'] !== true) {
               redirect('login');
           }

           return $next();
       }
   }
?>