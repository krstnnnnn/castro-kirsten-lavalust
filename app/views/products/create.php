<!DOCTYPE html>
<html>
<head>
    <title>Add Product · Tindahan Book</title>
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
        }
        *{ box-sizing:border-box; }
        body{
            margin:0;
            background:var(--paper);
            background-image:radial-gradient(rgba(74,52,35,0.05) 1px, transparent 1px);
            background-size:16px 16px;
            font-family:'Nunito', sans-serif;
            color:var(--ink);
            padding:56px 20px 80px;
        }
        .wrap{ max-width:480px; margin:0 auto; position:relative; }
        .wrap::before{
            content:"";
            position:absolute;
            inset:12px -8px -16px 16px;
            background:var(--card);
            border:1px solid var(--line);
            border-radius:16px;
            transform:rotate(-1.5deg);
            z-index:0;
        }
        .card{
            position:relative;
            z-index:1;
            background:var(--card);
            border:1px solid var(--line);
            border-radius:16px;
            padding:38px 36px 32px;
            transform:rotate(0.4deg);
            box-shadow:0 14px 28px -18px rgba(74,52,35,0.35);
        }
        .tape{
            position:absolute;
            top:-16px;
            left:40px;
            width:110px;
            height:34px;
            background:repeating-linear-gradient(45deg, rgba(113,128,93,0.55) 0 8px, rgba(163,177,143,0.5) 8px 16px);
            transform:rotate(-4deg);
            box-shadow:0 2px 4px rgba(0,0,0,0.1);
            z-index:2;
        }
        .back{
            display:inline-block;
            font-size:13px;
            font-weight:700;
            color:var(--sage-deep);
            text-decoration:none;
            margin-bottom:18px;
        }
        .back:hover{ text-decoration:underline; }
        h1{
            font-family:'Caveat', cursive;
            font-size:38px;
            font-weight:700;
            margin:0 0 6px;
        }
        .lead{ margin:0 0 26px; font-size:13.5px; color:var(--ink-soft); }
        label{
            display:block;
            font-size:13px;
            font-weight:700;
            color:var(--ink-soft);
            margin:0 0 6px;
        }
        input, textarea{
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
        input:focus, textarea:focus{
            outline:none;
            border-color:var(--mustard);
            box-shadow:0 0 0 3px rgba(192,138,50,0.18);
        }
        textarea{ resize:vertical; min-height:70px; }
        button{
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
        }
        button:hover{ background:var(--mustard-deep); transform:rotate(-1deg) translateY(-1px); }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="tape"></div>
        <div class="card">
            <a href="<?= site_url('products') ?>" class="back">‹ Back to stock</a>
            <h1>Add a product</h1>
            <p class="lead">Write it down before it hits the shelf.</p>
            <form method="post">
                <label>Product name</label>
                <input type="text" name="product_name" placeholder="e.g. Sack of cloves" required>
                <label>Description</label>
                <textarea name="description" rows="3" placeholder="What it is, where it's from"></textarea>
                <label>Price (₱)</label>
                <input type="number" step="0.01" name="price" placeholder="0.00" required>
                <label>Quantity</label>
                <input type="number" name="quantity" placeholder="0" required>
                <button type="submit">Save product</button>
            </form>
        </div>
    </div>
</body>
</html>