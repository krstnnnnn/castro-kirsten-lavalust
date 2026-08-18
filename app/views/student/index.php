<!DOCTYPE html>
<html>
<head>
    <title>Student Home</title>
    <style>
        body { background:#141225; font-family:'Segoe UI', sans-serif; margin:0; padding:40px 20px; }
        .card { max-width:560px; margin:0 auto; background:#1e1b2e; border-radius:12px; padding:28px 24px; border:1px solid #3C3489; }
        .label { font-size:11px; letter-spacing:0.04em; color:#AFA9EC; text-transform:uppercase; margin:0 0 6px; }
        h1 { font-size:22px; font-weight:500; color:#EEEDFE; margin:0 0 8px; }
        p { font-size:14px; color:#CECBF6; line-height:1.6; margin:0 0 20px; }
        nav a { text-decoration:none; font-size:13px; font-weight:500; padding:8px 16px; border-radius:8px; margin-right:10px; }
        .active { background:#3C3489; color:#EEEDFE; }
        .inactive { color:#AFA9EC; border:1px solid #534AB7; }
    </style>
</head>
<body>
    <div class="card">
        <p class="label">Student home</p>
        <h1>Student Information</h1>
        <p>Welcome! Click below to view the student profile.</p>
        <nav>
            <a href="<?= site_url('student') ?>" class="active">Home</a>
            <a href="<?= site_url('student/profile') ?>" class="inactive">Student Profile</a>
        </nav>
    </div>
</body>
</html>