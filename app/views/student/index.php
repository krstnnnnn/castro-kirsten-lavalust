<!DOCTYPE html>
<html>
<head>
    <title>Student Home</title>
    <style>
        body { background:#14122e; font-family:'Segoe UI', sans-serif; margin:0; padding:40px; }
        .card { max-width:560px; margin:0 auto; background:#1e1b2e; border-radius:12px; padding:28px 24px; border:1px solid #3C3489; }
        .label { font-size:11px; letter-spacing:0.04em; color:#AFA9EC; text-transform:uppercase; margin:0 0 8px; }
        h1 { font-size:22px; font-weight:500; color:#EEEDFE; margin:0 0 8px; }
        p.desc { font-size:14px; color:#AFA9EC; margin:0 0 16px; }
        nav a { text-decoration:none; font-size:13px; font-weight:500; padding:8px 16px; border-radius:8px; margin-right:8px; display:inline-block; }
        .active { background:#3C3489; color:#EEEDFE; }
        .inactive { color:#AFA9EC; border:1px solid #534AB7; }
        .status-row { display:flex; align-items:center; justify-content:space-between; margin-top:20px; padding-top:16px; border-top:1px solid #3C3489; }
        .status { display:flex; align-items:center; gap:8px; font-size:13px; }
        .dot { width:8px; height:8px; border-radius:50%; }
        .dot.on { background:#4ade80; }
        .dot.off { background:#f87171; }
        .status.on span { color:#bbf7d0; }
        .status.off span { color:#fecaca; }
        .auth-link { text-decoration:none; font-size:13px; font-weight:500; padding:6px 14px; border-radius:8px; }
        .login-link { background:#26215C; color:#bbf7d0; border:1px solid #4ade80; }
        .logout-link { background:#26215C; color:#fecaca; border:1px solid #f87171; }
    </style>
</head>
<body>
    <div class="card">
        <p class="label">Student home</p>
        <h1>Student Information</h1>
        <p class="desc">Welcome! Click below to view the student profile.</p>
        <nav>
            <a href="<?= site_url('student') ?>" class="active">Home</a>
            <a href="<?= site_url('student/profile') ?>" class="inactive">Student Profile</a>
        </nav>
        <div class="status-row">
            <?php if ($is_logged_in): ?>
                <div class="status on"><span class="dot on"></span><span>Logged in</span></div>
                <a href="<?= site_url('student/logout') ?>" class="auth-link logout-link">Logout</a>
            <?php else: ?>
                <div class="status off"><span class="dot off"></span><span>Logged out</span></div>
                <a href="<?= site_url('student/login') ?>" class="auth-link login-link">Login</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
