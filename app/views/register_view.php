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

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.05), transparent 30%),
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
            max-width: 390px;
            padding: 2.25rem 2rem;
            border-radius: 20px;
            border: 1px solid var(--line);
            box-shadow: 0 22px 70px var(--shadow);
            backdrop-filter: blur(6px);
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
            background: var(--field);
            color: var(--text);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: rgba(255,255,255,0.18);
            box-shadow: 0 0 0 3px rgba(255,255,255,0.03);
        }

        button {
            width: 100%;
            padding: .8rem;
            background: var(--button);
            color: var(--button-text);
            border: 1px solid rgba(255,255,255,0.08);
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
