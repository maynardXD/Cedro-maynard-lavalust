<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); $editing = !empty($product['id']); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $editing ? 'Edit' : 'Add'; ?> product | Product Desk</title>
    <style>
        :root {
            --bg: #06181a;
            --bg-soft: #0d2a2c;
            --panel: rgba(13, 36, 38, 0.82);
            --line: rgba(94, 234, 212, 0.2);
            --text: #ecfeff;
            --muted: #9ed9d0;
            --field: rgba(15, 35, 37, 0.95);
            --accent: linear-gradient(135deg, #14b8a6 0%, #0ea5e9 100%);
            --danger-bg: rgba(251, 113, 133, 0.12);
            --danger-text: #ffe4e6;
            --shadow: rgba(6, 24, 26, 0.45);
            --shadow-strong: rgba(20, 184, 166, 0.2);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 44px 20px;
            background:
                radial-gradient(circle at top, rgba(20, 184, 166, 0.22), transparent 30%),
                radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.14), transparent 25%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));
            color: var(--text);
            font: 16px/1.5 Arial, sans-serif;
        }

        main {
            width: min(100%, 680px);
            margin: auto;
        }

        h1 {
            margin: 0 0 26px;
            font-size: clamp(2rem, 6vw, 3rem);
            letter-spacing: -0.05em;
        }

        .back {
            color: var(--muted);
            font: 700 .9rem Arial, sans-serif;
            text-decoration: none;
        }

        form {
            padding: 28px;
            border: 1px solid var(--line);
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.96), rgba(15, 23, 42, 0.88));
            box-shadow: 0 24px 80px var(--shadow), 0 0 0 1px rgba(255,255,255,0.03);
            backdrop-filter: blur(10px);
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: 700;
            color: var(--muted);
            font-size: .78rem;
            letter-spacing: 0.09em;
            text-transform: uppercase;
        }

        label:first-child { margin-top: 0; }

        input, textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: rgba(15, 23, 42, 0.92);
            color: var(--text);
            font: inherit;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: rgba(96, 165, 250, 0.8);
            box-shadow: 0 0 0 4px rgba(96, 165, 250, 0.12);
            transform: translateY(-1px);
        }

        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }

        .error {
            margin-bottom: 18px;
            padding: 11px 13px;
            border-left: 4px solid #ef4444;
            background: var(--danger-bg);
            color: var(--danger-text);
            border-radius: 10px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 26px;
        }

        .button {
            padding: 11px 16px;
            border: 1px solid rgba(139, 92, 246, 0.5);
            border-radius: 12px;
            background: var(--accent);
            color: #f0fdfa;
            cursor: pointer;
            font: 700 .9rem Arial, sans-serif;
            text-decoration: none;
            transition: transform 0.18s ease, box-shadow 0.18s ease, filter 0.18s ease;
            box-shadow: 0 12px 28px rgba(79, 70, 229, 0.24);
        }

        .button:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 32px rgba(79, 70, 229, 0.3);
        }

        .cancel {
            background: transparent;
            border: 1px solid var(--line);
            color: var(--text);
        }

        @media (max-width: 560px) {
            .grid { grid-template-columns: 1fr; gap: 0; }
        }
    </style>
</head>
<body>
<main><a class="back" href="<?= site_url('products'); ?>">&larr; Back to products</a><h1><?= $editing ? 'Edit product' : 'Add product'; ?></h1>
<?php if (!empty($error)): ?><div class="error" role="alert"><?= htmlspecialchars($error); ?></div><?php endif; ?>
<form method="post" action="<?= site_url($editing ? 'products/edit/' . (int) $product['id'] : 'products'); ?>">
    <label for="product_name">Product name</label><input id="product_name" name="product_name" maxlength="100" required value="<?= htmlspecialchars($product['product_name'] ?? ''); ?>">
    <label for="description">Description</label><textarea id="description" name="description"><?= htmlspecialchars($product['description'] ?? ''); ?></textarea>
    <div class="grid"><div><label for="price">Price</label><input id="price" name="price" type="number" min="0" step="0.01" required value="<?= htmlspecialchars($product['price'] ?? ''); ?>"></div><div><label for="quantity">Quantity</label><input id="quantity" name="quantity" type="number" min="0" step="1" required value="<?= htmlspecialchars($product['quantity'] ?? ''); ?>"></div></div>
    <div class="actions"><a class="button cancel" href="<?= site_url('products'); ?>">Cancel</a><button class="button" type="submit"><?= $editing ? 'Save changes' : 'Create product'; ?></button></div>
</form></main>
</body>
</html>