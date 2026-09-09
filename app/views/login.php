<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in | Product Desk</title>
    <style>
        :root {
            --bg: #050505;
            --bg-soft: #0f0f0f;
            --panel: rgba(18, 18, 18, 0.9);
            --line: rgba(255,255,255,0.08);
            --text: #f5f5f4;
            --muted: #a3a3a3;
            --field: #0b0b0b;
            --button: #f5f5f5;
            --button-text: #111111;
            --error-bg: rgba(248, 113, 113, 0.08);
            --error-text: #fecaca;
            --shadow: rgba(0,0,0,0.55);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font: 16px/1.5 Arial, sans-serif;
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.05), transparent 30%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));
            color: var(--text);
        }

        main {
            width: min(100%, 420px);
            padding: 34px 30px 28px;
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 20px;
            box-shadow: 0 22px 70px var(--shadow);
            backdrop-filter: blur(6px);
        }

        h1 {
            margin: 0 0 8px;
            font: 700 2rem/1.1 Arial, sans-serif;
            letter-spacing: -0.07em;
        }

        p {
            color: var(--muted);
            margin: 0 0 24px;
            font-size: 0.96rem;
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: 700;
            color: var(--muted);
            font-size: 0.72rem;
            letter-spacing: 0.09em;
            text-transform: uppercase;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: var(--field);
            color: var(--text);
            font: inherit;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: rgba(255,255,255,0.18);
            box-shadow: 0 0 0 3px rgba(255,255,255,0.03);
        }

        button {
            width: 100%;
            margin-top: 24px;
            padding: 13px 16px;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            background: var(--button);
            color: var(--button-text);
            cursor: pointer;
            font-weight: 700;
            font: inherit;
            transition: transform 0.18s ease, filter 0.18s ease;
        }

        button:hover {
            filter: brightness(0.96);
            transform: translateY(-1px);
        }

        .error {
            padding: 12px 14px;
            border-left: 3px solid #ef4444;
            background: var(--error-bg);
            color: var(--error-text);
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 0.88rem;
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