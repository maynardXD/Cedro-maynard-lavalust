<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_admin = (($_SESSION['role'] ?? null) === 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Product Manager</title>
    <style>
        :root {
            --bg: #050505;
            --bg-soft: #0d0d0d;
            --panel: rgba(18, 18, 18, 0.92);
            --line: rgba(255,255,255,0.08);
            --text: #f5f5f5;
            --muted: #a1a1aa;
            --subtle: #e4e4e7;
            --success-bg: rgba(255,255,255,0.03);
            --success-text: #e7e5e4;
            --error-bg: rgba(255,255,255,0.03);
            --error-text: #f5f5f5;
            --shadow: rgba(0,0,0,0.5);
            --primary: #ffffff;
            --primary-strong: #e5e5e5;
            --primary-soft: rgba(255,255,255,0.04);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.03), transparent 30%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));
            color: var(--text);
            min-height: 100vh;
            padding: 2.5rem 1.5rem;
        }

        .wrap { max-width: 1100px; margin: 0 auto; }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        h1 {
            font-size: 2.1rem;
            font-weight: 600;
            letter-spacing: -0.06em;
        }

        .actions {
            display: flex;
            gap: .7rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .user-meta {
            font-size: .82rem;
            color: var(--muted);
            display: inline-flex;
            align-items: center;
            gap: .5rem;
        }

        .badge {
            background: rgba(255,255,255,0.03);
            color: var(--subtle);
            padding: .2rem .55rem;
            border-radius: 999px;
            border: 1px solid var(--line);
            font-size: .72rem;
        }

        .btn {
            display: inline-block;
            padding: .62rem 1rem;
            border-radius: 10px;
            font-size: .84rem;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid var(--line);
            cursor: pointer;
            transition: transform 0.18s ease, background 0.18s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: #111111;
            border-color: rgba(255,255,255,0.1);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
        }

        .btn-muted {
            background: rgba(255,255,255,0.02);
            color: var(--text);
        }

        .btn-muted:hover {
            background: rgba(255,255,255,0.04);
        }

        .btn-danger {
            background: rgba(248, 113, 113, 0.08);
            color: #fecaca;
            border-color: rgba(248, 113, 113, 0.2);
        }

        .btn-danger:hover {
            background: rgba(248, 113, 113, 0.12);
        }

        .btn-sm { padding: .42rem .72rem; font-size: .78rem; }

        .msg {
            padding: .8rem 1rem;
            border-radius: 12px;
            font-size: .85rem;
            margin-bottom: 1.25rem;
            border: 1px solid var(--line);
        }

        .msg.success {
            background: var(--success-bg);
            color: var(--success-text);
        }

        .msg.error {
            background: var(--error-bg);
            color: var(--error-text);
        }

        .panel {
            background: var(--panel);
            border-radius: 18px;
            border: 1px solid var(--line);
            box-shadow: 0 18px 60px var(--shadow);
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

        th, td {
            padding: .9rem 1.1rem;
            text-align: left;
            font-size: .9rem;
        }

        th {
            background: rgba(255,255,255,0.02);
            color: var(--muted);
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            font-size: .72rem;
        }

        tbody tr:nth-child(even) { background: rgba(255,255,255,0.01); }
        tbody tr:hover { background: rgba(255,255,255,0.03); }

        td {
            border-bottom: 1px solid var(--line);
            color: var(--subtle);
        }

        td.desc { max-width: 260px; color: var(--muted); }
        td.numeric { text-align: right; white-space: nowrap; }

        .row-actions {
            display: flex;
            gap: .5rem;
            align-items: center;
        }

        .empty {
            padding: 2rem;
            text-align: center;
            color: var(--muted);
        }

        form.inline { display: inline; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="topbar">
        <h1>Products</h1>
        <div class="actions">
            <span class="user-meta">
                Signed in as <strong><?= htmlspecialchars($_SESSION['username'] ?? ''); ?></strong>
                <?php if (!$is_admin): ?>
                    <span class="badge">view only</span>
                <?php endif; ?>
            </span>
            <?php if ($is_admin): ?>
                <a class="btn btn-primary" href="<?= base_url('products/create'); ?>">+ Add Product</a>
            <?php endif; ?>
            <a class="btn btn-muted" href="<?= base_url('logout'); ?>">Logout</a>
        </div>
    </div>

    <?php if (!empty($success)): ?>
        <div class="msg success"><?= htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <div class="panel">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created</th>
                    <?php if ($is_admin): ?><th>Actions</th><?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>#<?= htmlspecialchars($product['id']); ?></td>
                            <td><?= htmlspecialchars($product['product_name']); ?></td>
                            <td class="desc"><?= htmlspecialchars($product['description']); ?></td>
                            <td class="numeric">₱<?= number_format((float) $product['price'], 2); ?></td>
                            <td class="numeric"><?= htmlspecialchars($product['quantity']); ?></td>
                            <td><?= htmlspecialchars($product['created_at'] ?? ''); ?></td>
                            <?php if ($is_admin): ?>
                            <td>
                                <div class="row-actions">
                                    <a class="btn btn-muted btn-sm" href="<?= base_url('products/edit/' . $product['id']); ?>">Edit</a>
                                    <form class="inline" method="post" action="<?= base_url('products/delete/' . $product['id']); ?>" onsubmit="return confirm('Delete this product?');">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="<?= $is_admin ? 7 : 6; ?>" class="empty">
                        <?= $is_admin ? 'No products yet. Click "Add Product" to create one.' : 'No products yet.'; ?>
                    </td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
