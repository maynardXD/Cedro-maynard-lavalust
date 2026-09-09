<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Product Manager</title>
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
            --info-bg: rgba(255,255,255,0.03);
            --info-text: #e4e4e7;
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .card {
            background: var(--panel);
            width: 100%;
            max-width: 440px;
            padding: 2.2rem 2rem 1.8rem;
            border-radius: 20px;
            border: 1px solid var(--line);
            box-shadow: 0 18px 60px var(--shadow);
        }

        .header {
            margin-bottom: 1.5rem;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: .45rem;
            letter-spacing: -0.06em;
            line-height: 1.1;
        }

        p.subtitle {
            color: var(--muted);
            font-size: .92rem;
            line-height: 1.6;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: .42rem;
        }

        label {
            display: block;
            font-size: .68rem;
            font-weight: 700;
            color: var(--muted);
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        input {
            width: 100%;
            padding: .88rem .95rem;
            border: 1px solid var(--line);
            border-radius: 12px;
            font-size: .96rem;
            background: var(--field);
            color: var(--text);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: rgba(255,255,255,0.22);
            box-shadow: 0 0 0 3px rgba(255,255,255,0.03);
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            margin-top: .25rem;
        }

        button {
            width: auto;
            min-width: 140px;
            padding: .85rem 1.25rem;
            background: var(--button);
            color: var(--button-text);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            font-size: .95rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.18s ease, filter 0.18s ease;
        }

        button:hover {
            filter: brightness(0.96);
            transform: translateY(-1px);
        }

        .msg {
            padding: .72rem .9rem;
            border-radius: 10px;
            font-size: .85rem;
            margin-bottom: 1rem;
            border: 1px solid var(--line);
        }

        .msg.error {
            background: var(--error-bg);
            color: var(--error-text);
        }

        .msg.info {
            background: var(--info-bg);
            color: var(--info-text);
        }

        .msg.success {
            background: var(--success-bg);
            color: var(--success-text);
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
    <h1>Welcome back</h1>
    <p class="subtitle">Sign in to manage your products.</p>

    <?php if (!empty($denied)): ?>
        <div class="msg info">Please log in to continue.</div>
    <?php endif; ?>
    <?php if (!empty($registered)): ?>
        <div class="msg success">Account created. You can now log in.</div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login'); ?>">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autocomplete="username" required autofocus>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" autocomplete="current-password" required>

        <button type="submit">Log In</button>
    </form>

    <div class="footer-link">
        Don't have an account? <a href="<?= base_url('register'); ?>">Register</a>
    </div>
</div>
</body>
</html>
