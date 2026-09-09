   <?php
   defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

   class AuthController extends Controller
   {
       public function login()
       {

        if (session_status() === PHP_SESSION_NONE) {
        session_start(); 
        }
           if ($_POST) {
                $username = $this->io->post('username');
                $password = $this->io->post('password');

               // Simple hardcoded check for this lab activity.
               // Replace with your own values — this is your "unique" credential set.
               if ($username === 'kirsten' && $password === 'castro12345') {
                   $_SESSION['product_access'] = true;
                   redirect('products');
               } else {
                   $data['error'] = 'Invalid username or password.';
                   $this->call->view('auth/login', $data);
               }
           } else {
               $this->call->view('auth/login');
           }
       }

       public function logout()
        {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
        }
            unset($_SESSION['product_access']);
            redirect('login');
        }
   }