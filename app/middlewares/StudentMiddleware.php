<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class StudentMiddleware
{
   
    public const ACCESS_LIFETIME = 300; // 5 minutes

    
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Case 1: never granted at all.
        if (empty($_SESSION['student_access'])) {
            redirect('student?blocked=1&reason=none');
        }

        // Case 2: granted, but the timestamp is missing/corrupted —
        // treat as invalid rather than silently trusting the boolean flag.
        if (empty($_SESSION['student_access_granted_at'])) {
            unset($_SESSION['student_access']);
            redirect('student?blocked=1&reason=invalid');
        }

        // Case 3: unique access condition — grants expire after
        // ACCESS_LIFETIME seconds, so "access" is a time-boxed window,
        // not a permanent on/off switch.
        $elapsed = time() - $_SESSION['student_access_granted_at'];

        if ($elapsed > self::ACCESS_LIFETIME) {
            unset($_SESSION['student_access'], $_SESSION['student_access_granted_at']);
            redirect('student?blocked=1&reason=expired');
        }

        return $next();
    }
}