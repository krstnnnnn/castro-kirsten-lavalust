   <?php
   defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

   class StudentController extends Controller
   {
       public function index()
       {
           $this->call->view('student/index');
       }

       public function profile()
       {
           $student = [
               'student_id' => 'MCC2025-00018',
               'name'       => 'Kirsten Claire Castro',
               'course'     => 'BS Information Technology',
               'year'       => '3rd Year',
               'section'    => 'F1',
               'email'      => 'kirstencastro43@gmail.com',
           ];

           $this->call->view('student/profile', $student);
       }
   }