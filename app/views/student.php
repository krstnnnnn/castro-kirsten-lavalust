<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($page_title) ?></title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --kraft: #E3D0A9;
        --paper: #FFFBF2;
        --paper-alt: #FBF2DF;
        --ink: #4A3B2A;
        --ink-muted: #8C7A5E;
        --tape: #D9C3EC;
        --tape-ink: #6B5480;
        --chip-bg: #F3E9FA;
        --rule: #C7DAEA;
        --gold: #D4AF37;
        --green: #4B8A63;
        --green-bg: #EAF4EC;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Quicksand', sans-serif;
        background: var(--kraft);
        color: var(--ink);
        line-height: 1.5;
        padding: 70px 20px;
    }

    /* ---------- Topbar ---------- */
    .topbar {
        max-width: 1100px;
        margin: 0 auto 40px;
        background: var(--paper);
        border-radius: 14px;
        padding: 16px 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 14px;
        box-shadow: 0 10px 26px rgba(74, 59, 42, 0.14);
        border-bottom: 3px dashed var(--tape-ink);
        position: relative;
    }

    .topbar::before {
        content: "";
        position: absolute;
        top: -14px;
        left: 40px;
        width: 110px;
        height: 30px;
        background: var(--tape);
        opacity: 0.85;
        transform: rotate(-3deg);
        border-radius: 2px;
        box-shadow: 0 2px 5px rgba(74, 59, 42, 0.12);
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        font-family: 'Caveat', cursive;
        font-weight: 700;
        font-size: 1.6rem;
        color: var(--ink);
    }

    .brand .crest {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        border: 2.5px dashed var(--tape-ink);
        background: var(--chip-bg);
        color: var(--tape-ink);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.1rem;
        font-family: 'Quicksand', sans-serif;
        transform: rotate(-6deg);
        flex-shrink: 0;
    }

    .topbar nav a {
        color: var(--ink-muted);
        text-decoration: none;
        margin-left: 22px;
        font-size: 0.85rem;
        font-weight: 600;
        padding-bottom: 3px;
        border-bottom: 2px solid transparent;
        transition: 0.2s;
    }

    .topbar nav a:hover {
        color: var(--tape-ink);
        border-bottom-color: var(--tape-ink);
    }

    /* ---------- Layout ---------- */
    .layout {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 28px;
    }

    /* ---------- ID Card ---------- */
    .id-card {
        background: var(--paper);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 14px 32px rgba(74, 59, 42, 0.16);
        position: relative;
        height: fit-content;
        transform: rotate(-1.2deg);
    }

    .id-card::before {
        content: "";
        position: absolute;
        top: -14px;
        left: 50%;
        width: 120px;
        height: 30px;
        background: var(--tape);
        opacity: 0.85;
        transform: translateX(-50%) rotate(2.5deg);
        border-radius: 2px;
        box-shadow: 0 2px 5px rgba(74, 59, 42, 0.12);
    }

    .id-card .strip {
        background: var(--chip-bg);
        padding: 30px 20px 20px;
        text-align: center;
        border-bottom: 2px dashed var(--tape-ink);
    }

    .id-card .strip .avatar {
        width: 66px;
        height: 66px;
        border-radius: 50%;
        background: var(--paper);
        color: var(--tape-ink);
        font-family: 'Caveat', cursive;
        font-weight: 700;
        font-size: 1.7rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        border: 2.5px dashed var(--tape-ink);
    }

    .id-card .strip .avatar.locked {
        background: var(--kraft);
        color: var(--ink-muted);
        opacity: 0.7;
    }

    .id-card .strip .name {
        font-family: 'Caveat', cursive;
        font-weight: 700;
        font-size: 1.4rem;
        color: var(--ink);
    }

    .id-card .strip .name.locked,
    .id-card .strip .id-no.locked {
        filter: blur(4px);
        user-select: none;
    }

    .id-card .strip .id-no {
        font-size: 0.78rem;
        color: var(--ink-muted);
        margin-top: 4px;
        letter-spacing: 0.4px;
    }

    .id-card .details {
        padding: 18px 20px;
    }

    .id-card .details .row {
        display: flex;
        justify-content: space-between;
        font-size: 0.85rem;
        padding: 10px 0;
        border-bottom: 1.5px dashed var(--rule);
    }

    .id-card .details .row:last-child { border-bottom: none; }

    .id-card .details .row span:first-child {
        color: var(--ink-muted);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        font-size: 0.68rem;
    }

    .id-card .details .row span:last-child {
        font-weight: 600;
        color: var(--ink);
    }

    .id-card .details .row span:last-child.locked {
        filter: blur(3px);
        user-select: none;
    }

    .id-card .locked-note {
        padding: 14px 20px 20px;
        font-family: 'Caveat', cursive;
        font-size: 1.05rem;
        color: var(--ink-muted);
        text-align: center;
        border-top: 1.5px dashed var(--rule);
    }

    /* ---------- Main panel ---------- */
    .main-panel {
        background: var(--paper);
        border-radius: 16px;
        padding: 44px;
        box-shadow: 0 14px 32px rgba(74, 59, 42, 0.14);
        position: relative;
    }

    .main-panel::before {
        content: "";
        position: absolute;
        top: -14px;
        left: 60px;
        width: 130px;
        height: 30px;
        background: var(--tape);
        opacity: 0.85;
        transform: rotate(-2deg);
        border-radius: 2px;
        box-shadow: 0 2px 5px rgba(74, 59, 42, 0.12);
    }

    .eyebrow {
        display: inline-block;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 1.3px;
        text-transform: uppercase;
        color: var(--tape-ink);
        background: var(--chip-bg);
        border: 1.5px dashed var(--tape-ink);
        padding: 4px 14px;
        border-radius: 20px;
        margin-bottom: 14px;
        transform: rotate(-1.5deg);
    }

    h2 {
        font-family: 'Caveat', cursive;
        font-weight: 700;
        color: var(--ink);
        font-size: clamp(1.9rem, 3.6vw, 2.5rem);
        margin-bottom: 14px;
    }

    .description {
        color: var(--ink-muted);
        font-size: 0.95rem;
        line-height: 1.8;
        margin-bottom: 26px;
        max-width: 560px;
    }

    .alert {
        padding: 16px 20px;
        margin-bottom: 24px;
        border-radius: 10px;
        border: 2px dashed;
        font-size: 0.88rem;
    }

    .alert-warning {
        background: var(--paper-alt);
        border-color: var(--gold);
        color: #8a6d1a;
    }

    .alert-success {
        background: var(--green-bg);
        border-color: var(--green);
        color: #2f6b45;
    }

    .actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 12px 26px;
        border-radius: 24px;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.3px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: 0.2s;
        border: 2px dashed transparent;
    }

    .btn-primary {
        background: var(--tape-ink);
        color: var(--paper);
    }
    .btn-primary:hover { background: #58436c; }

    .btn-secondary {
        background: var(--chip-bg);
        color: var(--tape-ink);
        border-color: var(--tape-ink);
    }
    .btn-secondary:hover { background: #ebdcf7; }

    footer {
        max-width: 1100px;
        margin: 30px auto 0;
        text-align: center;
        font-family: 'Caveat', cursive;
        font-size: 1.1rem;
        color: var(--ink-muted);
        padding: 10px;
    }

    @media (max-width: 720px) {
        .layout { grid-template-columns: 1fr; }
        .id-card { transform: none; }
        .main-panel { padding: 32px 22px; }
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

<footer>MinSU: CCS -Calapan Campus</footer>

</body>
</html>