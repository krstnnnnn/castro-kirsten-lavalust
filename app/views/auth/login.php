<!DOCTYPE html>
<html>
<head>
    <title>Login · Tindahan ni Aling Nena</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{
            --paper:#F1E6D0;
            --card:#FCF7EA;
            --line:#E3D3AF;
            --ink:#4A3423;
            --ink-soft:#8C7A5C;
            --mustard:#C08A32;
            --mustard-deep:#93631E;
            --sage:#71805D;
            --sage-deep:#4F5B40;
            --brick:#AC4E37;
            --brick-deep:#7E3A27;
        }
        *{ box-sizing:border-box; }
        body{
            margin:0;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background:var(--paper);
            background-image:radial-gradient(rgba(74,52,35,0.05) 1px, transparent 1px);
            background-size:16px 16px;
            font-family:'Nunito', sans-serif;
            color:var(--ink);
            padding:56px 20px 80px;
        }
        .wrap{ max-width:400px; width:100%; margin:0 auto; position:relative; }
        .wrap::before{
            content:"";
            position:absolute;
            inset:14px -10px -18px 20px;
            background:var(--card);
            border:1px solid var(--line);
            border-radius:16px;
            transform:rotate(-1.8deg);
            z-index:0;
        }
        .card{
            position:relative;
            z-index:1;
            background:var(--card);
            border:1px solid var(--line);
            border-radius:16px;
            padding:44px 38px 38px;
            transform:rotate(0.6deg);
            box-shadow:0 14px 28px -18px rgba(74,52,35,0.35);
        }
        .tape{
            position:absolute;
            top:-18px;
            left:50%;
            transform:translateX(-50%) rotate(-3deg);
            width:132px;
            height:38px;
            background:repeating-linear-gradient(45deg, rgba(192,138,50,0.55) 0 8px, rgba(214,178,120,0.5) 8px 16px);
            box-shadow:0 2px 4px rgba(0,0,0,0.1);
            z-index:2;
        }
        .seal{
            width:58px;
            height:58px;
            border-radius:50%;
            background:radial-gradient(circle at 32% 28%, var(--sage) 0%, var(--sage-deep) 65%, #3d4632 100%);
            display:flex;
            align-items:center;
            justify-content:center;
            margin:2px auto 18px;
            box-shadow:0 4px 10px -4px rgba(74,52,35,0.5), inset 0 0 0 3px rgba(255,253,246,0.15);
            transform:rotate(-6deg);
        }
        .seal svg{ width:26px; height:26px; }
        h1{
            font-family:'Caveat', cursive;
            font-size:42px;
            font-weight:700;
            margin:0 0 4px;
            text-align:center;
            color:var(--ink);
        }
        .lead{
            margin:0 0 28px;
            font-size:13.5px;
            color:var(--ink-soft);
            text-align:center;
        }
        label{
            display:block;
            font-size:13px;
            font-weight:700;
            color:var(--ink-soft);
            margin:0 0 6px;
        }
        input{
            width:100%;
            padding:11px 13px;
            margin-bottom:18px;
            border-radius:9px;
            border:1.5px solid var(--line);
            background:#FFFDF6;
            color:var(--ink);
            font-family:inherit;
            font-size:14.5px;
        }
        input:focus{
            outline:none;
            border-color:var(--mustard);
            box-shadow:0 0 0 3px rgba(192,138,50,0.18);
        }
        button{
            width:100%;
            padding:12px 24px;
            border:none;
            border-radius:20px;
            background:var(--mustard);
            color:#FFF7E8;
            font-family:'Nunito', sans-serif;
            font-weight:800;
            font-size:14.5px;
            cursor:pointer;
            transition:transform .15s ease, background .15s ease;
            margin-top:4px;
        }
        button:hover{ background:var(--mustard-deep); transform:rotate(-1deg) translateY(-1px); }
        .error{
            background:rgba(172,78,55,0.1);
            border:1.5px dashed var(--brick);
            color:var(--brick-deep);
            font-size:13px;
            font-weight:600;
            padding:10px 14px;
            border-radius:9px;
            margin-bottom:18px;
        }
        .divider{
            border:none;
            border-top:2px dashed var(--line);
            margin:28px 0 18px;
        }
        .footnote{
            text-align:center;
            font-size:12px;
            color:var(--ink-soft);
            margin:0;
        }
        .footnote span{ font-family:'Caveat', cursive; font-size:16px; color:var(--sage-deep); }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="tape"></div>
        <div class="card">
            <div class="seal">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 10V8a6 6 0 0 1 12 0v2" stroke="#FFFDF6" stroke-width="1.8" stroke-linecap="round"/>
                    <rect x="4.5" y="10" width="15" height="10" rx="2.2" fill="#FFFDF6" fill-opacity="0.92"/>
                    <circle cx="12" cy="14.5" r="1.6" fill="#4F5B40"/>
                    <rect x="11.3" y="15.6" width="1.4" height="2.4" rx="0.7" fill="#4F5B40"/>
                </svg>
            </div>
            <h1>Welcome back</h1>
            <p class="lead">Sign the ledger to open the shop.</p>

            <?php if (!empty($error)): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>

            <form method="post">
                <label>Username</label>
                <input type="text" name="username" placeholder="e.g. aling_nena" required autofocus>
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
                <button type="submit">Open the shop</button>
            </form>

            <hr class="divider">
            <p class="footnote">Tindahan ni <span>Aling Nena</span> — for shopkeepers only.</p>
        </div>
    </div>
</body>
</html>