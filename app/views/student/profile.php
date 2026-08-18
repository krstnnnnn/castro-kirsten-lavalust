<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <style>
        body { background:#141225; font-family:'Segoe UI', sans-serif; margin:0; padding:40px 20px; }
        .card { max-width:560px; margin:0 auto; background:#1e1b2e; border-radius:12px; padding:28px 24px; border:1px solid #3C3489; }
        .label { font-size:11px; letter-spacing:0.04em; color:#AFA9EC; text-transform:uppercase; margin:0 0 6px; }
        h1 { font-size:22px; font-weight:500; color:#EEEDFE; margin:0 0 18px; }
        .grid { display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:20px; }
        .field { background:#26215C; border-radius:8px; padding:12px 14px; }
        .field.wide { grid-column:span 2; }
        .field-label { font-size:11px; color:#AFA9EC; margin:0 0 4px; }
        .field-value { font-size:14px; color:#EEEDFE; margin:0; font-weight:500; }
        nav a { text-decoration:none; font-size:13px; font-weight:500; padding:8px 16px; border-radius:8px; margin-right:10px; }
        .active { background:#3C3489; color:#EEEDFE; }
        .inactive { color:#AFA9EC; border:1px solid #534AB7; }
    </style>
</head>
<body>
    <div class="card">
        <p class="label">Student profile</p>
        <h1>Student Information</h1>
        <div class="grid">
            <div class="field"><p class="field-label">Student ID</p><p class="field-value"><?= $student_id ?></p></div>
            <div class="field"><p class="field-label">Name</p><p class="field-value"><?= $name ?></p></div>
            <div class="field"><p class="field-label">Course</p><p class="field-value"><?= $course ?></p></div>
            <div class="field"><p class="field-label">Year & Section</p><p class="field-value"><?= $year ?> - <?= $section ?></p></div>
            <div class="field wide"><p class="field-label">Email</p><p class="field-value"><?= $email ?></p></div>
        </div>
        <nav>
            <a href="<?= site_url('student') ?>" class="inactive">Home</a>
            <a href="<?= site_url('student/profile') ?>" class="active">Student Profile</a>
        </nav>
    </div>
</body>
</html>