<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        $data['is_logged_in'] = isset($_SESSION['student_access']) && $_SESSION['student_access'] === true;
        $this->call->view('student/index', $data);
    }

    public function profile()
    {
        $student = [
            'student_id' => 'MCC2024-00018',
            'name'       => 'CASTRO,KIRSTEN CLAIRE M.',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => 'F1',
            'email'      => 'kirstencastro43@gmail.com',
        ];
        $this->call->view('student/profile', $student);
    }

    public function login()
    {
        $_SESSION['student_access'] = true;
        redirect('student/profile');
    }

    public function logout()
    {
        unset($_SESSION['student_access']);
        redirect('student');
    }
}