<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in | Product Desk</title>
    <style>
        :root {
            --bg: #081120;
            --bg-soft: #101b2f;
            --panel: rgba(15, 23, 42, 0.82);
            --line: rgba(148, 163, 184, 0.22);
            --text: #e2e8f0;
            --muted: #94a3b8;
            --field: rgba(15, 23, 42, 0.9);
            --button: linear-gradient(135deg, #8b5cf6 0%, #4f46e5 100%);
            --button-text: #f8fafc;
            --error-bg: rgba(239, 68, 68, 0.12);
            --error-text: #fecaca;
            --shadow: rgba(15, 23, 42, 0.35);
            --shadow-strong: rgba(79, 70, 229, 0.25);
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
                radial-gradient(circle at top, rgba(99, 102, 241, 0.2), transparent 30%),
                radial-gradient(circle at bottom right, rgba(45, 212, 191, 0.12), transparent 25%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));
            color: var(--text);
        }

        main {
            width: min(100%, 420px);
            padding: 34px 30px 28px;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.96), rgba(15, 23, 42, 0.88));
            border: 1px solid var(--line);
            border-radius: 24px;
            box-shadow: 0 24px 80px var(--shadow), 0 0 0 1px rgba(255,255,255,0.03);
            backdrop-filter: blur(10px);
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
            background: rgba(15, 23, 42, 0.92);
            color: var(--text);
            font: inherit;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: rgba(96, 165, 250, 0.8);
            box-shadow: 0 0 0 4px rgba(96, 165, 250, 0.12);
            transform: translateY(-1px);
        }

        button {
            width: 100%;
            margin-top: 24px;
            padding: 13px 16px;
            border: 1px solid rgba(139, 92, 246, 0.5);
            border-radius: 12px;
            background: var(--button);
            color: var(--button-text);
            cursor: pointer;
            font-weight: 700;
            font: inherit;
            transition: transform 0.18s ease, box-shadow 0.18s ease, filter 0.18s ease;
            box-shadow: 0 12px 28px rgba(79, 70, 229, 0.24);
        }

        button:hover {
            filter: brightness(1.03);
            transform: translateY(-1px);
            box-shadow: 0 16px 32px rgba(79, 70, 229, 0.3);
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