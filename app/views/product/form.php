<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); $editing = !empty($product['id']); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $editing ? 'Edit' : 'Add'; ?> product | Product Desk</title>
    <style>
        :root {
            --bg: #050505;
            --bg-soft: #0d0d0d;
            --panel: rgba(18, 18, 18, 0.92);
            --line: rgba(255,255,255,0.08);
            --text: #f5f5f5;
            --muted: #a1a1aa;
            --field: #0b0b0b;
            --accent: #ffffff;
            --danger-bg: rgba(255,255,255,0.03);
            --danger-text: #f5f5f5;
            --shadow: rgba(0,0,0,0.5);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 44px 20px;
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.03), transparent 30%),
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
            border-radius: 18px;
            background: var(--panel);
            box-shadow: 0 18px 60px var(--shadow);
        }

        label {
            display: block;
            margin: 0 0 8px;
            font-weight: 600;
            color: var(--muted);
            font-size: .7rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        label:first-child { margin-top: 0; }

        input, textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: var(--field);
            color: var(--text);
            font: inherit;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: rgba(255,255,255,0.2);
            box-shadow: 0 0 0 3px rgba(255,255,255,0.03);
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
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            background: var(--accent);
            color: #111111;
            cursor: pointer;
            font: 700 .9rem Arial, sans-serif;
            text-decoration: none;
            transition: transform 0.18s ease, filter 0.18s ease;
        }

        .button:hover {
            transform: translateY(-1px);
            filter: brightness(0.96);
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