<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_edit = ($mode === 'edit');
$form_action = $is_edit ? base_url('products/edit/' . $product['id']) : base_url('products/create');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? 'Edit Product' : 'Add Product'; ?> | Product Manager</title>
    <style>
        :root {
            --bg: #050505;
            --bg-soft: #0d0d0d;
            --panel: #111111;
            --line: rgba(255,255,255,0.08);
            --text: #f5f5f4;
            --muted: #9f9f9f;
            --field: #0f0f0f;
            --success-bg: rgba(34, 197, 94, 0.08);
            --success-text: #bbf7d0;
            --error-bg: rgba(239, 68, 68, 0.12);
            --error-text: #fecaca;
            --shadow: rgba(0,0,0,0.55);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.06), transparent 28%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));
            color: var(--text);
            min-height: 100vh;
            padding: 2.5rem 1.5rem;
            display: flex;
            justify-content: center;
        }

        .card {
            background: rgba(17,17,17,0.9);
            width: 100%;
            max-width: 560px;
            padding: 2rem;
            border-radius: 18px;
            border: 1px solid var(--line);
            box-shadow: 0 24px 60px var(--shadow);
            height: fit-content;
            backdrop-filter: blur(8px);
        }

        .topline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        h1 {
            font-size: 1.6rem;
            font-weight: 600;
            letter-spacing: -0.05em;
        }

        a.back {
            font-size: .82rem;
            color: var(--muted);
            text-decoration: none;
            font-weight: 600;
        }

        label {
            display: block;
            font-size: .76rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: .45rem;
            color: var(--muted);
        }

        input, textarea {
            width: 100%;
            padding: .78rem .85rem;
            border: 1px solid var(--line);
            border-radius: 10px;
            font-size: .95rem;
            margin-bottom: 1rem;
            font-family: inherit;
            background: var(--field);
            color: var(--text);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: rgba(255,255,255,0.2);
            box-shadow: 0 0 0 3px rgba(255,255,255,0.04);
        }

        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        button {
            padding: .85rem 1.4rem;
            background: #f5f5f5;
            color: #0b0b0b;
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 10px;
            font-size: .92rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: .5rem;
            transition: transform 0.18s ease, filter 0.18s ease;
        }

        button:hover {
            filter: brightness(0.96);
            transform: translateY(-1px);
        }

        .msg {
            padding: .8rem .9rem;
            border-radius: 10px;
            font-size: .85rem;
            margin-bottom: 1rem;
            border: 1px solid var(--line);
        }

        .msg.error {
            background: var(--error-bg);
            color: var(--error-text);
        }

        .msg.success {
            background: var(--success-bg);
            color: var(--success-text);
        }
    </style>
</head>
<body>
<div class="card">
    <div class="topline">
        <h1><?= $is_edit ? 'Edit Product' : 'Add Product'; ?></h1>
        <a class="back" href="<?= base_url('products'); ?>">&larr; Back to list</a>
    </div>

    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="msg success"><?= htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= $form_action; ?>">
        <label for="product_name">Product Name</label>
        <input type="text" id="product_name" name="product_name" maxlength="100" required
               value="<?= htmlspecialchars($product['product_name'] ?? ''); ?>" autofocus>

        <label for="description">Description</label>
        <textarea id="description" name="description"><?= htmlspecialchars($product['description'] ?? ''); ?></textarea>

        <div class="row">
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required
                       value="<?= htmlspecialchars($product['price'] ?? ''); ?>">
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" step="1" min="0" required
                       value="<?= htmlspecialchars($product['quantity'] ?? ''); ?>">
            </div>
        </div>

        <button type="submit"><?= $is_edit ? 'Save Changes' : 'Add Product'; ?></button>
    </form>
</div>
</body>
</html>
