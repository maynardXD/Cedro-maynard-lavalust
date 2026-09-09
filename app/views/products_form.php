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
            --panel: rgba(18, 18, 18, 0.92);
            --line: rgba(255,255,255,0.08);
            --text: #f5f5f5;
            --muted: #a1a1aa;
            --field: #0b0b0b;
            --button: #ffffff;
            --button-text: #111111;
            --success-bg: rgba(255,255,255,0.03);
            --success-text: #e7e5e4;
            --error-bg: rgba(255,255,255,0.03);
            --error-text: #f5f5f5;
            --shadow: rgba(0,0,0,0.5);
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
            display: flex;
            justify-content: center;
        }

        .card {
            background: var(--panel);
            width: 100%;
            max-width: 560px;
            padding: 2rem;
            border-radius: 18px;
            border: 1px solid var(--line);
            box-shadow: 0 18px 60px var(--shadow);
            height: fit-content;
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

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 0.45rem;
        }

        a.back {
            font-size: .82rem;
            color: var(--muted);
            text-decoration: none;
            font-weight: 600;
        }

        label {
            display: block;
            font-size: .7rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-weight: 600;
            margin: 0;
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
            box-shadow: 0 0 0 3px rgba(255,255,255,0.03);
        }

        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .actions {
            display: flex;
            justify-content: flex-end;
            margin-top: .25rem;
        }

        button {
            padding: .85rem 1.4rem;
            background: var(--button);
            color: var(--button-text);
            border: 1px solid rgba(255,255,255,0.1);
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
        <div class="field">
            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name" maxlength="100" required
                   value="<?= htmlspecialchars($product['product_name'] ?? ''); ?>" autofocus>
        </div>

        <div class="field">
            <label for="description">Description</label>
            <textarea id="description" name="description"><?= htmlspecialchars($product['description'] ?? ''); ?></textarea>
        </div>

        <div class="row">
            <div class="field">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required
                       value="<?= htmlspecialchars($product['price'] ?? ''); ?>">
            </div>
            <div class="field">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" step="1" min="0" required
                       value="<?= htmlspecialchars($product['quantity'] ?? ''); ?>">
            </div>
        </div>

        <div class="actions">
            <button type="submit"><?= $is_edit ? 'Save Changes' : 'Add Product'; ?></button>
        </div>
    </form>
</div>
</body>
</html>
