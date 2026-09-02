<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * StudentController
 * Handles student-related routes and actions.
 */
class StudentController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Student home page
     */
    public function index()
    {
        $has_access = !empty($_SESSION['student_access']);

        $data = [
            'page_title'  => 'Student Information Profile',
            'blocked'     => isset($_GET['blocked']),
            'reason'      => $_GET['reason'] ?? null,
            'has_access'  => $has_access,
            'granted_at'  => $_SESSION['student_access_granted_at'] ?? null,
            'access_lifetime' => StudentMiddleware::ACCESS_LIFETIME,
          
            'student'    => $has_access ? $this->get_student_summary() : null,
        ];

        $this->call->view('student', $data);
    }

    /**
     * Student profile page (protected route)
     */
    public function profile()
    {
        $data = [
            'page_title' => 'Student Information Profile',
            'student'    => array_merge(
                $this->get_student_summary(),
                ['email' => 'kirstencastro43@gmail.com']
            ),
        ];

        $this->call->view('student_profile', $data);
    }

    /**
     * Grants access to the profile route by setting a session flag
     */
    public function grant_access()
    {
        $_SESSION['student_access'] = true;
        $_SESSION['student_access_granted_at'] = time();
        redirect('student/profile');
    }

    /**
     * Revokes access to the profile route by unsetting the session flag
     */
    public function revoke_access()
    {
        unset($_SESSION['student_access'], $_SESSION['student_access_granted_at']);
        redirect('student?blocked=1&reason=revoked');
    }

   
    private function get_student_summary()
    {
        return [
            'student_id' => 'MCC2024-00018',
            'name'       => 'Kirsten Claire M. Castro',
            'first_name' => 'Kirsten',
            'initials'   => 'KC',
            'course'     => 'BSIT',
            'year'       => '3rd Year',
            'section'    => 'III-F1',

            
            'address'          => 'Melgar A, Naujan, Oriental Mindoro, Philippines',
            'contact_number'   => '+639708655964',
            'skills'           => ['PHP', 'JavaScript', 'MySQL', 'UI Design'],
            'hobbies'          => ['Designing', 'Singing', 'Reading', 'Watching'],
            'description'      => 'BSIT student focused on web development and system design, currently exploring backend architecture and access control patterns.',
            'social_links'     => [
                'facebook'  => 'https://facebook.com/not.kirstennn',
                'github'    => 'https://github.com/krstnnnnn',
                'instagram' => 'https://instagram.com/not.kirstenn',
            ],
        ];
    }
}