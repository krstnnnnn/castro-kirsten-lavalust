<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($page_title) ?> - Profile</title>
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
    .container {
        max-width: 780px;
        margin: 40px auto;
        padding: 0 24px;
    }
    .record {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 14px rgba(15, 47, 82, 0.08);
    }
    .record-header {
        background: linear-gradient(120deg, #0f2f52, #1a4d7f);
        color: #fff;
        padding: 34px 40px;
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .record-header .avatar {
        width: 76px;
        height: 76px;
        border-radius: 50%;
        background: #d4af37;
        color: #0f2f52;
        font-weight: 800;
        font-size: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border: 3px solid rgba(255,255,255,0.6);
    }
    .record-header .who .name {
        font-size: 21px;
        font-weight: 700;
    }
    .record-header .who .sub {
        font-size: 13px;
        opacity: 0.85;
        margin-top: 3px;
    }
    .record-header .verified {
        margin-left: auto;
        background: rgba(212, 175, 55, 0.18);
        border: 1px solid #d4af37;
        color: #f5e3a1;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 0.4px;
        padding: 6px 12px;
        border-radius: 999px;
        white-space: nowrap;
    }
    .record-body {
        padding: 34px 40px 40px;
    }
    .section-title {
        color: #0f2f52;
        font-size: 12.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 26px 0 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .section-title:first-child { margin-top: 0; }
    .section-title::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #e5e9f0;
    }
    .grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px 28px;
    }
    .field .label {
        color: #8592a6;
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .field .value {
        color: #1f2937;
        font-size: 14.5px;
        font-weight: 600;
    }
    .bio {
        color: #556277;
        font-size: 14px;
        line-height: 1.7;
    }
    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .tag {
        background: #f1f4f8;
        border: 1px solid #dbe2ec;
        color: #0f2f52;
        font-size: 12.5px;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 999px;
    }
    .social-links {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .social-links a {
        color: #0f2f52;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        background: #f1f4f8;
        border: 1px solid #dbe2ec;
        padding: 8px 14px;
        border-radius: 6px;
        transition: 0.2s;
    }
    .social-links a:hover { background: #e5eaf1; }
    .empty-note {
        color: #a4adba;
        font-size: 13px;
        font-style: italic;
    }
    .actions {
        margin-top: 34px;
        padding-top: 24px;
        border-top: 1px solid #eef1f6;
    }
    .btn {
        padding: 11px 22px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        background: #f1f4f8;
        color: #0f2f52;
        border: 1px solid #dbe2ec;
        transition: 0.2s;
    }
    .btn:hover { background: #e5eaf1; }
    footer {
        text-align: center;
        color: #93a0b3;
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
        <div class="record-header">
            <div class="avatar">LD</div>
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