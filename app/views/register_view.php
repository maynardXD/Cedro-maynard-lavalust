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
            --bg: #0b0b0b;
            --panel: #111111;
            --border: #2a2a2a;
            --text: #f5f5f5;
            --muted: #a1a1a1;
            --field: #121212;
            --error-bg: rgba(239, 68, 68, 0.12);
            --error-text: #fecaca;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .card {
            background: var(--panel);
            width: 100%;
            max-width: 380px;
            padding: 2.25rem 2rem;
            border-radius: 14px;
            border: 1px solid var(--border);
            box-shadow: 0 18px 48px rgba(0,0,0,0.35);
        }

        h1 {
            font-size: 1.5rem;
            margin-bottom: .45rem;
            letter-spacing: -0.04em;
        }

        p.subtitle {
            color: var(--muted);
            font-size: .88rem;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-size: .85rem;
            font-weight: 600;
            margin-bottom: .35rem;
            color: var(--muted);
        }

        input {
            width: 100%;
            padding: .75rem .8rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: .95rem;
            margin-bottom: 1rem;
            background: var(--field);
            color: var(--text);
        }

        input:focus {
            outline: none;
            border-color: rgba(255,255,255,0.35);
            box-shadow: 0 0 0 1px rgba(255,255,255,0.08);
        }

        button {
            width: 100%;
            padding: .78rem;
            background: #f5f5f5;
            color: #0b0b0b;
            border: none;
            border-radius: 8px;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover { filter: brightness(0.9); }

        .msg.error {
            padding: .7rem .9rem;
            border-radius: 8px;
            font-size: .85rem;
            margin-bottom: 1rem;
            background: var(--error-bg);
            color: var(--error-text);
            border: 1px solid var(--border);
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
