<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Product Manager</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .card {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.96), rgba(15, 23, 42, 0.88));
            width: 100%;
            max-width: 390px;
            padding: 2.25rem 2rem;
            border-radius: 24px;
            border: 1px solid var(--line);
            box-shadow: 0 24px 80px var(--shadow), 0 0 0 1px rgba(255,255,255,0.03);
            backdrop-filter: blur(10px);
        }

        h1 {
            font-size: 1.7rem;
            margin-bottom: .5rem;
            letter-spacing: -0.06em;
        }

        p.subtitle {
            color: var(--muted);
            font-size: .9rem;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-size: .72rem;
            font-weight: 700;
            margin-bottom: .42rem;
            color: var(--muted);
            letter-spacing: 0.09em;
            text-transform: uppercase;
        }

        input {
            width: 100%;
            padding: .8rem .85rem;
            border: 1px solid var(--line);
            border-radius: 12px;
            font-size: .95rem;
            margin-bottom: 1rem;
            background: rgba(15, 23, 42, 0.92);
            color: var(--text);
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
            padding: .9rem;
            background: var(--button);
            color: var(--button-text);
            border: 1px solid rgba(139, 92, 246, 0.5);
            border-radius: 12px;
            font-size: .95rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.18s ease, box-shadow 0.18s ease, filter 0.18s ease;
            box-shadow: 0 12px 28px var(--shadow-strong);
        }

        button:hover {
            filter: brightness(1.03);
            transform: translateY(-1px);
            box-shadow: 0 16px 32px var(--shadow-strong);
        }

        .msg.error {
            padding: .72rem .9rem;
            border-radius: 10px;
            font-size: .85rem;
            margin-bottom: 1rem;
            background: var(--error-bg);
            color: var(--error-text);
            border: 1px solid var(--line);
        }

        .footer-link {
            text-align: center;
            margin-top: 1.25rem;
            font-size: .85rem;
            color: var(--muted);
        }

        .footer-link a {
            color: var(--text);
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="card">
    <h1>Create an account</h1>
    <p class="subtitle">Register to manage products.</p>

    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('register'); ?>">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autocomplete="username" required autofocus>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" autocomplete="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" autocomplete="new-password" minlength="6" required>

        <button type="submit">Register</button>
    </form>

    <div class="footer-link">
        Already have an account? <a href="<?= base_url('login'); ?>">Log in</a>
    </div>
</div>
</body>
</html>
