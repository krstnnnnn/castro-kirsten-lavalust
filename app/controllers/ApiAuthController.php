<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiAuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('api');
        $this->call->database();
        $this->call->model('UsersModel');
    }

    public function login()
    {
        $this->api->require_method('POST');
        $this->api->rate_limit();

        $data = $this->api->body();
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        if ($username === '' || $password === '') {
            $this->api->respond_error('Username and password are required.', 422);
        }

        $user = $this->UsersModel->find_by('username', $username);

        if (!$user || !password_verify($password, $user['password'])) {
            $this->api->respond_error('Invalid username or password.', 401);
        }

        if ((int) $user['is_active'] !== 1) {
            $this->api->respond_error('This account has been deactivated.', 403);
        }

        $tokens = $this->api->issue_tokens([
            'id'     => $user['id'],
            'role'   => $user['role'],
            'scopes' => ['read', 'write'],
        ]);

        $this->api->respond([
            'message' => 'Login successful',
            'user' => [
                'id'       => $user['id'],
                'username' => $user['username'],
                'email'    => $user['email'],
                'role'     => $user['role'],
            ],
            'tokens' => $tokens,
        ]);
    }

    public function refresh()
    {
        $this->api->require_method('POST');
        $data = $this->api->body();
        $refresh_token = $data['refresh_token'] ?? '';

        if ($refresh_token === '') {
            $this->api->respond_error('refresh_token is required.', 422);
        }

        $this->api->refresh_access_token($refresh_token);
    }

    public function logout()
    {
        $this->api->require_method('POST');
        $data = $this->api->body();
        $refresh_token = $data['refresh_token'] ?? '';

        if ($refresh_token !== '') {
            $this->api->revoke_refresh_token($refresh_token);
        }

        $this->api->respond(['message' => 'Logged out successfully.']);
    }

    public function me()
    {
        $payload = $this->api->require_jwt();
        $user = $this->UsersModel->find($payload['sub']);

        if (!$user) {
            $this->api->respond_error('User not found.', 404);
        }

        $this->api->respond([
            'id'       => $user['id'],
            'username' => $user['username'],
            'email'    => $user['email'],
            'role'     => $user['role'],
        ]);
    }
}