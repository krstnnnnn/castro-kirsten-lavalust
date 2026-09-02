<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($page_title) ?> - Profile</title>
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
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
        font-family: 'Quicksand', sans-serif;
        background: var(--kraft);
        color: var(--ink);
        line-height: 1.5;
    }
    .topbar {
        background: var(--paper);
        color: var(--ink);
        padding: 14px 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px dashed var(--tape-ink);
    }
    .topbar .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: 'Caveat', cursive;
        font-weight: 700;
        font-size: 22px;
        letter-spacing: 0.2px;
    }
    .topbar .brand .crest {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: var(--chip-bg);
        border: 2px dashed var(--tape-ink);
        color: var(--tape-ink);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        font-size: 15px;
    }
    .topbar nav a {
        color: var(--ink-muted);
        text-decoration: none;
        margin-left: 24px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.2px;
        padding-bottom: 4px;
        border-bottom: 2px dashed transparent;
        transition: 0.2s;
    }
    .topbar nav a:hover {
        color: var(--tape-ink);
        border-bottom-color: var(--tape-ink);
    }
    .container {
        max-width: 780px;
        margin: 40px auto;
        padding: 0 24px;
    }
    .record {
        position: relative;
        background: var(--paper);
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(140, 122, 94, 0.2);
        box-shadow: 0 18px 40px rgba(74, 59, 42, 0.15);
    }
    .washi {
        position: absolute;
        top: -18px;
        left: 50%;
        width: 150px;
        height: 38px;
        background: var(--tape);
        opacity: 0.85;
        transform: translateX(-50%) rotate(-2.5deg);
        border-radius: 2px;
        box-shadow: 0 2px 5px rgba(74, 59, 42, 0.12);
    }
    .record-header {
        background: var(--paper-alt);
        padding: 34px 40px;
        display: flex;
        align-items: center;
        gap: 20px;
        border-bottom: 2px dashed var(--rule);
    }
    .record-header .avatar {
        width: 76px;
        height: 76px;
        border-radius: 50%;
        background: var(--chip-bg);
        color: var(--tape-ink);
        font-weight: 800;
        font-size: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border: 3px dashed var(--tape-ink);
        transform: rotate(-3deg);
    }
    .record-header .who .name {
        font-family: 'Caveat', cursive;
        font-weight: 700;
        font-size: 30px;
        color: var(--ink);
        line-height: 1.1;
    }
    .record-header .who .sub {
        font-size: 13px;
        color: var(--ink-muted);
        margin-top: 4px;
    }
    .record-header .verified {
        margin-left: auto;
        background: var(--chip-bg);
        border: 1.5px dashed var(--tape-ink);
        color: var(--tape-ink);
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 0.3px;
        padding: 6px 12px;
        border-radius: 999px;
        white-space: nowrap;
        transform: rotate(4deg);
    }
    .record-body {
        padding: 34px 40px 40px;
    }
    .section-title {
        color: var(--ink-muted);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.3px;
        margin: 26px 0 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .section-title:first-child { margin-top: 0; }
    .section-title::after {
        content: "";
        flex: 1;
        border-top: 2px dashed var(--rule);
    }
    .grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px 28px;
    }
    .field .label {
        color: var(--ink-muted);
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .field .value {
        color: var(--ink);
        font-size: 14.5px;
        font-weight: 600;
    }
    .bio {
        color: var(--ink-muted);
        font-size: 14px;
        line-height: 1.7;
    }
    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .tag {
        background: var(--chip-bg);
        border: 1.5px dashed var(--tape-ink);
        color: var(--tape-ink);
        font-size: 12.5px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 999px;
        display: inline-block;
        transform: rotate(-1.5deg);
    }
    .social-links {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .social-links a {
        color: var(--tape-ink);
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        background: var(--chip-bg);
        border: 1.5px dashed var(--tape-ink);
        padding: 8px 16px;
        border-radius: 10px;
        transition: 0.2s;
        display: inline-block;
    }
    .social-links a:hover { background: var(--tape); color: var(--ink); }
    .empty-note {
        color: var(--ink-muted);
        font-size: 13px;
        font-style: italic;
    }
    .actions {
        margin-top: 34px;
        padding-top: 24px;
        border-top: 2px dashed var(--rule);
    }
    .btn {
        padding: 11px 22px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        background: var(--chip-bg);
        color: var(--tape-ink);
        border: 1.5px dashed var(--tape-ink);
        transition: 0.2s;
    }
    .btn:hover { background: var(--tape); color: var(--ink); }
    footer {
        text-align: center;
        color: var(--ink-muted);
        font-size: 12px;
        padding: 24px;
    }
    @media (max-width: 560px) {
        .grid { grid-template-columns: 1fr; }
        .record-header { flex-wrap: wrap; }
        .record-header .verified { margin-left: 0; }
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

<div class="container">
    <div class="record">
        <div class="washi"></div>
        <div class="record-header">
            <div class="avatar">KC</div>
            <div class="who">
                <div class="name"><?= htmlspecialchars($student['name']) ?></div>
                <div class="sub"><?= htmlspecialchars($student['course']) ?> &middot; <?= htmlspecialchars($student['year']) ?> &middot; <?= htmlspecialchars($student['section']) ?></div>
            </div>
            <span class="verified">✓ ACCESS VERIFIED</span>
        </div>

        <div class="record-body">
            <div class="section-title">Academic Information</div>
            <div class="grid">
                <div class="field">
                    <div class="label">Student ID</div>
                    <div class="value"><?= htmlspecialchars($student['student_id']) ?></div>
                </div>
                <div class="field">
                    <div class="label">Course</div>
                    <div class="value"><?= htmlspecialchars($student['course']) ?></div>
                </div>
                <div class="field">
                    <div class="label">Year Level</div>
                    <div class="value"><?= htmlspecialchars($student['year']) ?></div>
                </div>
                <div class="field">
                    <div class="label">Section</div>
                    <div class="value"><?= htmlspecialchars($student['section']) ?></div>
                </div>
            </div>

            <div class="section-title">Contact Information</div>
            <div class="grid">
                <div class="field">
                    <div class="label">Email Address</div>
                    <div class="value"><?= htmlspecialchars($student['email']) ?></div>
                </div>
                <div class="field">
                    <div class="label">Contact Number</div>
                    <div class="value">
                        <?= !empty($student['contact_number']) ? htmlspecialchars($student['contact_number']) : '<span class="empty-note">Not provided</span>' ?>
                    </div>
                </div>
                <div class="field" style="grid-column: 1 / -1;">
                    <div class="label">Address</div>
                    <div class="value">
                        <?= !empty($student['address']) ? htmlspecialchars($student['address']) : '<span class="empty-note">Not provided</span>' ?>
                    </div>
                </div>
            </div>

            <div class="section-title">About</div>
            <?php if (!empty($student['description'])): ?>
                <p class="bio"><?= htmlspecialchars($student['description']) ?></p>
            <?php else: ?>
                <p class="empty-note">No profile description added yet.</p>
            <?php endif; ?>

            <div class="section-title">Skills</div>
            <?php if (!empty($student['skills'])): ?>
                <div class="tags">
                    <?php foreach ($student['skills'] as $skill): ?>
                        <span class="tag"><?= htmlspecialchars($skill) ?></span>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="empty-note">No skills added yet.</p>
            <?php endif; ?>

            <div class="section-title">Hobbies</div>
            <?php if (!empty($student['hobbies'])): ?>
                <div class="tags">
                    <?php foreach ($student['hobbies'] as $hobby): ?>
                        <span class="tag"><?= htmlspecialchars($hobby) ?></span>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="empty-note">No hobbies added yet.</p>
            <?php endif; ?>

            <div class="section-title">Social Media</div>
            <?php if (!empty($student['social_links'])): ?>
                <div class="social-links">
                    <?php foreach ($student['social_links'] as $platform => $url): ?>
                        <a href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener noreferrer">
                            <?= htmlspecialchars(ucfirst($platform)) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="empty-note">No social links added yet.</p>
            <?php endif; ?>

            <div class="actions">
                <a class="btn" href="<?= site_url('student') ?>">← Back to Home</a>
            </div>
        </div>
    </div>
</div>

<footer> Student Information - Confidential</footer>

</body>
</html>