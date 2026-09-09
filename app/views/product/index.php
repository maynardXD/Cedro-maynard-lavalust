<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products | Product Desk</title>
    <style>
        :root {
            --bg: #06181a;
            --bg-soft: #0d2a2c;
            --panel: rgba(13, 36, 38, 0.82);
            --line: rgba(94, 234, 212, 0.2);
            --text: #ecfeff;
            --muted: #9ed9d0;
            --accent: #14b8a6;
            --danger: #fca5a5;
            --success-bg: rgba(16, 185, 129, 0.12);
            --success-text: #d1fae5;
            --shadow: rgba(6, 24, 26, 0.45);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at top, rgba(20, 184, 166, 0.22), transparent 30%),
                radial-gradient(circle at bottom left, rgba(14, 165, 233, 0.14), transparent 25%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));
            color: var(--text);
            font: 16px/1.5 Arial, sans-serif;
        }

        header, main { width: min(1100px, calc(100% - 40px)); margin: auto; }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 30px 0;
        }

        h1 {
            margin: 0;
            font-size: clamp(2rem, 5vw, 3rem);
            line-height: 1.1;
            letter-spacing: -0.05em;
        }

        .eyebrow {
            margin: 0 0 6px;
            color: var(--muted);
            font: 700 .78rem/1.2 Arial, sans-serif;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        a, button { font: 700 .9rem Arial, sans-serif; }
        a { color: inherit; }

        .button {
            display: inline-block;
            padding: 10px 14px;
            border-radius: 12px;
            text-decoration: none;
            background: linear-gradient(135deg, #14b8a6 0%, #0ea5e9 100%);
            color: #f0fdfa;
            border: 1px solid rgba(139, 92, 246, 0.5);
            box-shadow: 0 12px 28px rgba(79, 70, 229, 0.24);
            transition: transform 0.18s ease, box-shadow 0.18s ease, filter 0.18s ease;
        }

        .button:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 32px rgba(79, 70, 229, 0.3);
        }

        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
            color: var(--muted);
        }

        .logout { display: inline; }
        .logout button {
            padding: 0;
            border: 0;
            background: transparent;
            color: var(--muted);
            cursor: pointer;
        }

        .notice {
            margin-bottom: 18px;
            padding: 12px 14px;
            border-left: 4px solid #22c55e;
            background: var(--success-bg);
            color: var(--success-text);
            border-radius: 10px;
        }

        .table-wrap {
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 22px;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.96), rgba(15, 23, 42, 0.88));
            box-shadow: 0 24px 80px var(--shadow), 0 0 0 1px rgba(255,255,255,0.03);
            backdrop-filter: blur(10px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 720px;
        }

        th, td {
            padding: 15px 16px;
            text-align: left;
            border-bottom: 1px solid var(--line);
        }

        th {
            color: var(--muted);
            font: 700 .75rem Arial, sans-serif;
            letter-spacing: .08em;
            text-transform: uppercase;
            background: rgba(255,255,255,0.02);
        }

        tr:last-child td { border-bottom: 0; }
        .description { max-width: 330px; color: var(--muted); }
        .actions { white-space: nowrap; }
        .actions a { margin-right: 12px; color: var(--accent); }
        .delete { display: inline; }
        .delete button {
            padding: 0;
            border: 0;
            background: none;
            color: var(--danger);
            cursor: pointer;
        }

        .empty {
            padding: 38px;
            text-align: center;
            color: var(--muted);
        }

        @media (max-width: 600px) {
            header { align-items: flex-start; flex-direction: column; }
            .toolbar { align-items: flex-start; flex-direction: column; }
            main, header { width: min(100% - 28px, 1100px); }
        }
    </style>
</head>
<body>
<header><div><p class="eyebrow">Inventory</p><h1>Products</h1></div><a class="button" href="<?= site_url('products/create'); ?>">Add product</a></header>
<main>
    <div class="toolbar"><span>Signed in as <?= htmlspecialchars($_SESSION['username'] ?? 'user'); ?></span><form class="logout" method="post" action="<?= site_url('logout'); ?>"><button type="submit">Sign out</button></form></div>
    <?php if (!empty($message)): ?><div class="notice" role="status">Product <?= htmlspecialchars($message); ?>.</div><?php endif; ?>
    <div class="table-wrap"><table><thead><tr><th>Name</th><th>Description</th><th>Price</th><th>Quantity</th><th>Created</th><th>Actions</th></tr></thead><tbody>
    <?php if (!empty($products)): foreach ($products as $product): ?>
        <tr><td><strong><?= htmlspecialchars($product['product_name']); ?></strong></td><td class="description"><?= htmlspecialchars($product['description'] ?? ''); ?></td><td><?= number_format((float) $product['price'], 2); ?></td><td><?= (int) $product['quantity']; ?></td><td><?= htmlspecialchars($product['created_at'] ?? ''); ?></td><td class="actions"><a href="<?= site_url('products/edit/' . (int) $product['id']); ?>">Edit</a><form class="delete" method="post" action="<?= site_url('products/delete/' . (int) $product['id']); ?>" onsubmit="return confirm('Delete this product?');"><button type="submit">Delete</button></form></td></tr>
    <?php endforeach; else: ?><tr><td class="empty" colspan="6">No products yet. Add your first product to get started.</td></tr><?php endif; ?>
    </tbody></table></div>
</main>
</body>
</html>