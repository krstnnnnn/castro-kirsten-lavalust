<?php
$totalTypes = count($products);
$totalItems = array_sum(array_column($products, 'quantity'));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tindahan ni Aling Nena</title>
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
            background:var(--paper);
            background-image:radial-gradient(rgba(74,52,35,0.05) 1px, transparent 1px);
            background-size:16px 16px;
            font-family:'Nunito', sans-serif;
            color:var(--ink);
            padding:56px 20px 80px;
        }
        .wrap{ max-width:940px; margin:0 auto; position:relative; }
        .wrap::before{
            content:"";
            position:absolute;
            inset:14px -8px -18px 18px;
            background:var(--card);
            border:1px solid var(--line);
            border-radius:16px;
            transform:rotate(-1.3deg);
            z-index:0;
        }
        .card{
            position:relative;
            z-index:1;
            background:var(--card);
            border:1px solid var(--line);
            border-radius:16px;
            padding:42px 44px 36px;
            transform:rotate(0.35deg);
            box-shadow:0 14px 28px -18px rgba(74,52,35,0.35);
        }
        .tape{
            position:absolute;
            top:-16px;
            left:52px;
            width:126px;
            height:36px;
            background:repeating-linear-gradient(45deg, rgba(192,138,50,0.55) 0 8px, rgba(214,178,120,0.5) 8px 16px);
            transform:rotate(-4deg);
            box-shadow:0 2px 4px rgba(0,0,0,0.1);
            z-index:2;
        }
        .top-row{
            display:flex;
            justify-content:space-between;
            align-items:flex-end;
            gap:20px;
            flex-wrap:wrap;
            border-bottom:2px dashed var(--line);
            padding-bottom:22px;
            margin-bottom:26px;
        }
        h1{
            font-family:'Caveat', cursive;
            font-size:46px;
            font-weight:700;
            margin:0 0 4px;
            color:var(--ink);
        }
        .subtitle{ margin:0; font-size:14px; color:var(--ink-soft); }
        .actions-top{ display:flex; gap:10px; align-items:center; }
        .btn{
            text-decoration:none;
            font-family:'Nunito', sans-serif;
            font-size:13.5px;
            font-weight:700;
            padding:10px 18px;
            border-radius:20px;
            display:inline-block;
            transition:transform .15s ease;
            border:1.5px solid transparent;
        }
        .btn:hover{ transform:rotate(-1deg) translateY(-1px); }
        .btn-add{ background:var(--mustard); color:#FFF7E8; }
        .btn-add:hover{ background:var(--mustard-deep); }
        .btn-logout{ background:transparent; color:var(--ink-soft); border:1.5px dashed var(--line); }
        .btn-logout:hover{ color:var(--ink); border-color:var(--ink-soft); }
        .stats{ display:flex; gap:22px; flex-wrap:wrap; margin-bottom:34px; }
        .stat{
            background:#FFFDF6;
            border:1.5px dashed var(--line);
            border-radius:10px;
            padding:16px 26px;
            min-width:190px;
        }
        .stat:nth-child(1){ transform:rotate(-1.5deg); }
        .stat:nth-child(2){ transform:rotate(1.2deg); }
        .stat-label{ font-size:13px; color:var(--ink-soft); margin:0 0 2px; }
        .stat-value{
            font-family:'Caveat', cursive;
            font-size:38px;
            font-weight:700;
            color:var(--sage-deep);
            margin:0;
        }
        h2.section{
            font-size:15px;
            font-weight:800;
            letter-spacing:.2px;
            color:var(--ink);
            margin:0 0 14px;
            padding-bottom:8px;
            border-bottom:2px solid var(--ink);
            display:inline-block;
        }
        table{ width:100%; border-collapse:collapse; }
        th{
            text-align:left;
            font-size:12.5px;
            font-weight:700;
            color:var(--ink-soft);
            padding:8px 10px;
            border-bottom:2px dashed var(--line);
        }
        td{
            font-size:14.5px;
            color:var(--ink);
            padding:14px 10px;
            border-bottom:1.5px dashed var(--line);
            vertical-align:middle;
        }
        tr:hover td{ background:rgba(192,138,50,0.08); }
        .item-name{ font-weight:700; }
        .item-desc{ color:var(--ink-soft); font-size:13.5px; }
        .price{ font-weight:700; color:var(--sage-deep); white-space:nowrap; }
        .qty{ white-space:nowrap; }
        .row-actions{ white-space:nowrap; }
        .btn-edit, .btn-delete{
            font-size:12.5px;
            font-weight:700;
            padding:6px 12px;
            border-radius:16px;
            text-decoration:none;
            margin-right:6px;
            display:inline-block;
            border:1.5px solid transparent;
        }
        .btn-edit{ color:var(--sage-deep); border-color:var(--sage); background:rgba(113,128,93,0.08); }
        .btn-edit:hover{ background:var(--sage); color:#FFFDF6; }
        .btn-delete{ color:var(--brick-deep); border-color:var(--brick); background:rgba(172,78,55,0.08); }
        .btn-delete:hover{ background:var(--brick); color:#FFF6F1; }
        .empty{ text-align:center; padding:48px 20px; color:var(--ink-soft); }
        .empty p{ margin:0 0 16px; font-size:15px; }
        @media (max-width:640px){
            .card{ padding:28px 20px; }
            h1{ font-size:36px; }
            table, thead, tbody, th, td, tr{ display:block; }
            th{ display:none; }
            td{ border-bottom:none; padding:4px 4px; }
            tr{ border-bottom:2px dashed var(--line); padding:14px 0; }
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="tape"></div>
        <div class="card">
            <div class="top-row">
                <div>
                    <h1>Tindahan ni Aling Nena</h1>
                    <p class="subtitle">Shop ’til your wallet begs for mercy! — welcome back, admin.</p>
                </div>
                <div class="actions-top">
                    <a href="<?= site_url('products/create') ?>" class="btn btn-add">+ Add product</a>
                    <a href="<?= site_url('logout') ?>" class="btn btn-logout">Logout</a>
                </div>
            </div>

            <div class="stats">
                <div class="stat">
                    <p class="stat-label">Kinds of goods</p>
                    <p class="stat-value"><?= $totalTypes ?></p>
                </div>
                <div class="stat">
                    <p class="stat-label">Pieces in stock</p>
                    <p class="stat-value"><?= $totalItems ?></p>
                </div>
            </div>

            <h2 class="section">Current stock</h2>

            <?php if (empty($products)): ?>
                <div class="empty">
                    <p>The shelves are bare. Add your first product to start the ledger.</p>
                    <a href="<?= site_url('products/create') ?>" class="btn btn-add">+ Add product</a>
                </div>
            <?php else: ?>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th></th>
                </tr>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <div class="item-name"><?= $product['product_name'] ?></div>
                        <div class="item-desc"><?= $product['description'] ?></div>
                    </td>
                    <td class="price">₱<?= number_format($product['price'], 2) ?></td>
                    <td class="qty"><?= $product['quantity'] ?></td>
                    <td class="row-actions">
                        <a href="<?= site_url('products/edit?id=' . $product['id']) ?>" class="btn-edit">Edit</a>
                        <a href="<?= site_url('products/delete?id=' . $product['id']) ?>" class="btn-delete" onclick="return confirm('Remove this product from the shelf?')">Remove</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>