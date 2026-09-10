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
            $username = trim($this->io->post('username'));
            $password = $this->io->post('password');

            $correct_username = 'kirsten';
            $correct_password = 'castro12345';

            if (
                $username === $correct_username &&
                $password === $correct_password
            ) {
                session_regenerate_id(true);

                $_SESSION['product_access'] = true;

                redirect('products');
                return;
            }

            $data['error'] = 'Invalid username or password.';
            $this->call->view('auth/login', $data);
            return;
        }

        $this->call->view('auth/login');
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        unset($_SESSION['product_access']);

        session_regenerate_id(true);

        redirect('login');
        return;
    }
}