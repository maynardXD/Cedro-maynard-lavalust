<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in | Product Desk</title>
    <style>
        :root {
            --bg: #0b0b0b;
            --panel: #111111;
            --panel-soft: #171717;
            --line: #2a2a2a;
            --text: #f5f5f5;
            --muted: #a1a1a1;
            --field: #121212;
            --error-bg: rgba(239, 68, 68, 0.12);
            --error-text: #fecaca;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font: 16px/1.5 Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        main {
            width: min(100%, 420px);
            padding: 36px;
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 14px;
            box-shadow: 0 18px 48px rgba(0,0,0,0.35);
        }

        h1 {
            margin: 0 0 10px;
            font: 700 2rem/1.1 Arial, sans-serif;
            letter-spacing: -0.05em;
        }

        p {
            color: var(--muted);
            margin: 0 0 28px;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: 700;
            color: var(--muted);
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--field);
            color: var(--text);
            font: inherit;
        }

        input:focus {
            outline: none;
            border-color: rgba(255,255,255,0.35);
            box-shadow: 0 0 0 1px rgba(255,255,255,0.08);
        }

        button {
            width: 100%;
            margin-top: 24px;
            padding: 12px 16px;
            border: 0;
            border-radius: 8px;
            background: #f5f5f5;
            color: #0b0b0b;
            cursor: pointer;
            font-weight: 700;
            font: inherit;
        }

        button:hover { filter: brightness(0.9); }

        .error {
            padding: 10px 12px;
            border-left: 3px solid #ef4444;
            background: var(--error-bg);
            color: var(--error-text);
            border-radius: 8px;
            margin-bottom: 18px;
        }
    </style>
</head>
<body>
<main>
    <h1>Product Desk</h1>
    <p>Sign in to manage the product inventory.</p>
    <?php if (!empty($error)): ?><div class="error" role="alert"><?= htmlspecialchars($error); ?></div><?php endif; ?>
    <form method="post" action="<?= site_url('login'); ?>">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" required autocomplete="username">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required autocomplete="current-password">
        <button type="submit">Sign in</button>
    </form>
</main>
</body>
</html>