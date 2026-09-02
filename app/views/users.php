<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Directory</title>

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

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Quicksand', sans-serif;
            background: var(--kraft);
            color: var(--ink);
            line-height: 1.5;
            padding: 70px 20px;
        }

        .page {
            position: relative;
            max-width: 900px;
            margin: 0 auto;
            background: var(--paper);
            border-radius: 16px;
            padding: 40px 36px 8px;
            box-shadow: 0 18px 40px rgba(74, 59, 42, 0.18);
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

        .masthead {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 14px 0 28px;
            border-bottom: 2px dashed var(--rule);
        }

        .title-row {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .title-block h1 {
            font-family: 'Caveat', cursive;
            font-weight: 700;
            font-size: clamp(2.1rem, 4.4vw, 2.9rem);
            color: var(--ink);
            line-height: 1;
        }

        .title-block p {
            font-size: 0.92rem;
            color: var(--ink-muted);
            margin-top: 6px;
        }

        .badge {
            flex-shrink: 0;
            width: 92px;
            height: 92px;
            border-radius: 50%;
            border: 2.5px dashed var(--tape-ink);
            background: var(--chip-bg);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transform: rotate(6deg);
        }

        .badge .label {
            font-size: 0.62rem;
            color: var(--tape-ink);
            letter-spacing: 0.02em;
        }

        .badge .count {
            font-family: 'Caveat', cursive;
            font-weight: 700;
            font-size: 2rem;
            color: var(--tape-ink);
            line-height: 1.1;
        }

        .table-wrap {
            overflow-x: auto;
            margin-top: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            text-align: left;
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--ink-muted);
            padding: 20px 14px 10px;
            white-space: nowrap;
        }

        tbody td {
            padding: 14px;
            border-bottom: 1.5px dashed var(--rule);
            font-size: 0.92rem;
            vertical-align: middle;
        }

        tbody tr:nth-child(even) {
            background: var(--paper-alt);
        }

        tbody tr:hover {
            background: var(--chip-bg);
        }

        td.id {
            color: var(--ink-muted);
            font-size: 0.85rem;
        }

        td.email {
            color: var(--ink-muted);
            word-break: break-all;
        }

        td.username .tag {
            display: inline-block;
            font-family: 'Quicksand', sans-serif;
            font-weight: 600;
            font-size: 0.8rem;
            color: var(--tape-ink);
            background: var(--chip-bg);
            border: 1.5px dashed var(--tape-ink);
            padding: 3px 12px;
            border-radius: 20px;
            transform: rotate(-1.5deg);
        }

        .empty td {
            text-align: center;
            padding: 56px 16px;
            font-family: 'Caveat', cursive;
            font-size: 1.3rem;
            color: var(--ink-muted);
        }

        @media (max-width: 640px) {
            body { padding: 40px 14px; }
            .page { padding: 32px 20px 8px; }
            .badge { width: 78px; height: 78px; transform: rotate(4deg); }
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="washi"></div>

        <div class="masthead">
            <div class="title-row">
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M11 6C11 3.79 12.79 2 15 2C17.21 2 19 3.79 19 6V22C19 26.42 15.42 30 11 30C6.58 30 3 26.42 3 22V9" stroke="#6B5480" stroke-width="2" stroke-linecap="round"/>
                    <path d="M11 9V22C11 23.66 12.34 25 14 25C15.66 25 17 23.66 17 22V6" stroke="#6B5480" stroke-width="2" stroke-linecap="round"/>
                </svg>

                <div class="title-block">
                    <h1>User Management Directory</h1>
                    <p>Every account on record, kept safe on this page.</p>
                </div>
            </div>

            <div class="badge">
                <div class="label">on file</div>
                <div class="count"><?= count($users) ?></div>
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Entry</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($users)): ?>

                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="id">
                                    <?= htmlspecialchars($user['id']) ?>
                                </td>

                                <td class="fname">
                                    <?= htmlspecialchars($user['firstname']) ?>
                                </td>

                                <td class="lname">
                                    <?= htmlspecialchars($user['lastname']) ?>
                                </td>

                                <td class="email">
                                    <?= htmlspecialchars($user['email']) ?>
                                </td>

                                <td class="username">
                                    <span class="tag"><?= htmlspecialchars($user['username']) ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr class="empty">
                            <td colspan="5">
                                No pages in this book yet.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>