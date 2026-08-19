<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($page_title) ?></title>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #eef1f6;
        color: #1f2937;
    }
    .topbar {
        background: #0f2f52;
        color: #fff;
        padding: 14px 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 3px solid #d4af37;
    }
    .topbar .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
        font-size: 17px;
        letter-spacing: 0.3px;
    }
    .topbar .brand .crest {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #d4af37;
        color: #0f2f52;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 16px;
    }
    .topbar nav a {
        color: #dbe4f0;
        text-decoration: none;
        margin-left: 26px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.3px;
        padding-bottom: 4px;
        border-bottom: 2px solid transparent;
        transition: 0.2s;
    }
    .topbar nav a:hover {
        color: #fff;
        border-bottom-color: #d4af37;
    }
    .layout {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 28px;
    }
    .id-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(15, 47, 82, 0.08);
        border: 1px solid #e2e8f0;
    }
    .id-card .strip {
        background: linear-gradient(120deg, #0f2f52, #1a4d7f);
        padding: 26px 20px 18px;
        text-align: center;
        color: #fff;
    }
    .id-card .strip .avatar {
        width: 66px;
        height: 66px;
        border-radius: 50%;
        background: #d4af37;
        color: #0f2f52;
        font-weight: 800;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        border: 3px solid rgba(255,255,255,0.6);
    }
    .id-card .strip .avatar.locked {
        background: rgba(255,255,255,0.15);
        color: #fff;
        border-color: rgba(255,255,255,0.35);
    }
    .id-card .strip .name {
        font-size: 15px;
        font-weight: 700;
    }
    .id-card .strip .name.locked,
    .id-card .strip .id-no.locked {
        filter: blur(4px);
        user-select: none;
    }
    .id-card .strip .id-no {
        font-size: 12px;
        opacity: 0.85;
        margin-top: 2px;
        letter-spacing: 0.5px;
    }
    .id-card .details {
        padding: 18px 20px;
    }
    .id-card .details .row {
        display: flex;
        justify-content: space-between;
        font-size: 12.5px;
        padding: 8px 0;
        border-bottom: 1px dashed #e5e9f0;
    }
    .id-card .details .row:last-child { border-bottom: none; }
    .id-card .details .row span:first-child {
        color: #8592a6;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        font-size: 10.5px;
    }
    .id-card .details .row span:last-child {
        font-weight: 600;
        color: #1f2937;
    }
    .id-card .details .row span:last-child.locked {
        filter: blur(3px);
        user-select: none;
    }
    .id-card .locked-note {
        padding: 14px 20px;
        font-size: 12px;
        color: #8592a6;
        text-align: center;
        border-top: 1px dashed #e5e9f0;
    }
    .main-panel {
        background: #fff;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        padding: 44px;
        box-shadow: 0 4px 14px rgba(15, 47, 82, 0.06);
    }
    .eyebrow {
        color: #d4af37;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }
    h2 {
        color: #0f2f52;
        font-size: 30px;
        margin-bottom: 16px;
    }
    .description {
        color: #556277;
        font-size: 15px;
        line-height: 1.8;
        margin-bottom: 26px;
        max-width: 560px;
    }
    .alert {
        padding: 14px 18px;
        margin-bottom: 24px;
        border-radius: 6px;
        border-left: 4px solid;
        font-size: 14px;
    }
    .alert-warning {
        background: #fff8e6;
        border-left-color: #d4af37;
        color: #8a6d1a;
    }
    .alert-success {
        background: #eaf7ee;
        border-left-color: #2f9e58;
        color: #1e6b3b;
    }
    .actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }
    .btn {
        padding: 12px 26px;
        border: none;
        border-radius: 6px;
        font-size: 13.5px;
        font-weight: 700;
        letter-spacing: 0.3px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: 0.2s;
    }
    .btn-primary {
        background: #0f2f52;
        color: #fff;
    }
    .btn-primary:hover { background: #0b2340; }
    .btn-secondary {
        background: #f1f4f8;
        color: #0f2f52;
        border: 1px solid #dbe2ec;
    }
    .btn-secondary:hover { background: #e5eaf1; }
    footer {
        text-align: center;
        color: #93a0b3;
        font-size: 12px;
        padding: 24px;
    }
    @media (max-width: 720px) {
        .layout { grid-template-columns: 1fr; }
    }
</style>
</head>
<body>

<div class="topbar">
    <div class="brand">
        <span class="crest">M</span>
        Student Information Portal
    </div>
    <nav>
        <a href="<?= site_url('student') ?>">Home</a>
        <a href="<?= site_url('student/profile') ?>">My Profile</a>
    </nav>
</div>

<div class="layout">
   
    <aside class="id-card">
        <?php if (!empty($has_access) && !empty($student)): ?>
            <div class="strip">
                <div class="avatar"><?= htmlspecialchars($student['initials']) ?></div>
                <div class="name"><?= htmlspecialchars($student['name']) ?></div>
                <div class="id-no"><?= htmlspecialchars($student['student_id']) ?></div>
            </div>
            <div class="details">
                <div class="row"><span>Course</span><span><?= htmlspecialchars($student['course']) ?></span></div>
                <div class="row"><span>Year</span><span><?= htmlspecialchars($student['year']) ?></span></div>
                <div class="row"><span>Section</span><span><?= htmlspecialchars($student['section']) ?></span></div>
            </div>
        <?php else: ?>
            <div class="strip">
                <div class="avatar locked">?</div>
                <div class="name locked">•••••••••••••</div>
                <div class="id-no locked">••••••••••••</div>
            </div>
            <div class="details">
                <div class="row"><span>Course</span><span class="locked">•••••</span></div>
                <div class="row"><span>Year</span><span class="locked">•••••</span></div>
                <div class="row"><span>Section</span><span class="locked">•••••</span></div>
            </div>
            <div class="locked-note">Grant access to view your details</div>
        <?php endif; ?>
    </aside>

    <main class="main-panel">
        <div class="eyebrow">Student Dashboard</div>
        <h2>
            Welcome back<?= (!empty($has_access) && !empty($student)) ? ', ' . htmlspecialchars($student['first_name']) : '' ?> 👋
        </h2>
        <p class="description">
            This portal lets you view your official student record. The
            profile page is access-controlled — grant yourself access below
            to unlock and view your full student information.
        </p>

        <?php if (!empty($blocked)):
            $messages = [
                'none'    => ['🔒 Restricted Zone', 'You have not been granted access to the Student Profile yet. Please grant access to continue.'],
                'expired' => ['⏳ Access Expired', 'Your access window has timed out after 5 minutes for security. Please grant access again to continue viewing your profile.'],
                'revoked' => ['🚫 Access Revoked', 'You manually revoked access to your Student Profile. Grant access again if you want to view it.'],
                'invalid' => ['⚠️ Access State Invalid', 'Your access session looked malformed, so it was cleared as a precaution. Please grant access again.'],
            ];
            $msg = $messages[$reason ?? 'none'] ?? $messages['none'];
        ?>
            <div class="alert alert-warning">
                <strong><?= $msg[0] ?></strong><br>
                <?= $msg[1] ?>
            </div>
        <?php elseif (!empty($has_access)):
            $expires_at = ($granted_at ?? time()) + $access_lifetime;
        ?>
            <div class="alert alert-success">
                <strong>✅ Access Granted</strong><br>
                You may now view your Student Profile. This access
                automatically expires
                <strong>5 minutes</strong> after granting —
                currently <strong id="countdown"><?= gmdate('i:s', max(0, $expires_at - time())) ?></strong>
                remaining.
            </div>
            <script>
                (function () {
                    var expiresAt = <?= $expires_at * 1000 ?>; // ms epoch
                    var el = document.getElementById('countdown');
                    function tick() {
                        var remaining = Math.max(0, Math.floor((expiresAt - Date.now()) / 1000));
                        var m = String(Math.floor(remaining / 60)).padStart(2, '0');
                        var s = String(remaining % 60).padStart(2, '0');
                        el.textContent = m + ':' + s;
                        if (remaining <= 0) {
                            clearInterval(timer);
                            window.location.href = "<?= site_url('student') ?>?blocked=1&reason=expired";
                        }
                    }
                    var timer = setInterval(tick, 1000);
                    tick();
                })();
            </script>
        <?php endif; ?>

        <div class="actions">
            <?php if (!empty($has_access)): ?>
                <a class="btn btn-primary" href="<?= site_url('student/profile') ?>">View My Profile</a>
                <a class="btn btn-secondary" href="<?= site_url('student/revoke-access') ?>">Revoke Access</a>
            <?php else: ?>
                <a class="btn btn-primary" href="<?= site_url('student/grant-access') ?>">Grant Access &amp; View Profile</a>
                <a class="btn btn-secondary" href="<?= site_url('student/profile') ?>">Test Access Control</a>
            <?php endif; ?>
        </div>
    </main>
</div>

<footer>MinSU: CCS -$_ENV Calapan Campus</footer>

</body>
</html>