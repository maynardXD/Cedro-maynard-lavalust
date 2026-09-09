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
            --bg: #081120;
            --bg-soft: #101b2f;
            --panel: rgba(15, 23, 42, 0.82);
            --line: rgba(148, 163, 184, 0.22);
            --text: #e2e8f0;
            --muted: #94a3b8;
            --field: rgba(15, 23, 42, 0.9);
            --button: linear-gradient(135deg, #8b5cf6 0%, #4f46e5 100%);
            --button-text: #f8fafc;
            --info-bg: rgba(59, 130, 246, 0.12);
            --info-text: #bfdbfe;
            --success-bg: rgba(16, 185, 129, 0.12);
            --success-text: #bbf7d0;
            --error-bg: rgba(239, 68, 68, 0.12);
            --error-text: #fecaca;
            --shadow: rgba(15, 23, 42, 0.35);
            --shadow-strong: rgba(79, 70, 229, 0.25);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background:
                radial-gradient(circle at top, rgba(99, 102, 241, 0.22), transparent 30%),
                radial-gradient(circle at bottom right, rgba(45, 212, 191, 0.12), transparent 25%),
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
