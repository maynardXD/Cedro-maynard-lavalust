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
            --bg: #06181a;
            --bg-soft: #0d2a2c;
            --panel: rgba(13, 36, 38, 0.82);
            --line: rgba(94, 234, 212, 0.2);
            --text: #ecfeff;
            --muted: #9ed9d0;
            --field: rgba(15, 35, 37, 0.95);
            --button: linear-gradient(135deg, #14b8a6 0%, #0ea5e9 100%);
            --button-text: #f0fdfa;
            --success-bg: rgba(16, 185, 129, 0.12);
            --success-text: #d1fae5;
            --error-bg: rgba(251, 113, 133, 0.12);
            --error-text: #ffe4e6;
            --shadow: rgba(6, 24, 26, 0.45);
            --shadow-strong: rgba(20, 184, 166, 0.2);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background:
                radial-gradient(circle at top, rgba(20, 184, 166, 0.22), transparent 30%),
                radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.14), transparent 25%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));
            color: var(--text);
            min-height: 100vh;
            padding: 2.5rem 1.5rem;
            display: flex;
            justify-content: center;
        }

        .card {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.96), rgba(15, 23, 42, 0.88));
            width: 100%;
            max-width: 560px;
            padding: 2rem;
            border-radius: 24px;
            border: 1px solid var(--line);
            box-shadow: 0 24px 80px var(--shadow), 0 0 0 1px rgba(255,255,255,0.03);
            height: fit-content;
            backdrop-filter: blur(10px);
        }

        .topline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        h1 {
            font-size: 1.7rem;
            font-weight: 600;
            letter-spacing: -0.06em;
        }

        a.back {
            font-size: .82rem;
            color: var(--muted);
            text-decoration: none;
            font-weight: 600;
        }

        label {
            display: block;
            font-size: .72rem;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: .45rem;
            color: var(--muted);
        }

        input, textarea {
            width: 100%;
            padding: .78rem .85rem;
            border: 1px solid var(--line);
            border-radius: 12px;
            font-size: .95rem;
            margin-bottom: 1rem;
            font-family: inherit;
            background: rgba(15, 23, 42, 0.92);
            color: var(--text);
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: rgba(96, 165, 250, 0.8);
            box-shadow: 0 0 0 4px rgba(96, 165, 250, 0.12);
            transform: translateY(-1px);
        }

        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        button {
            padding: .85rem 1.4rem;
            background: var(--button);
            color: var(--button-text);
            border: 1px solid rgba(139, 92, 246, 0.5);
            border-radius: 12px;
            font-size: .92rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: .5rem;
            transition: transform 0.18s ease, box-shadow 0.18s ease, filter 0.18s ease;
            box-shadow: 0 12px 28px rgba(79, 70, 229, 0.24);
        }

        button:hover {
            filter: brightness(1.03);
            transform: translateY(-1px);
            box-shadow: 0 16px 32px rgba(79, 70, 229, 0.3);
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
