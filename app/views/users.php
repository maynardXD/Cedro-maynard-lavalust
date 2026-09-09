
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>

    <style>
        :root {
            --bg: #050505;
            --bg-soft: #0d0d0d;
            --panel: #111111;
            --line: rgba(255,255,255,0.08);
            --text: #f5f5f4;
            --muted: #9f9f9f;
            --subtle: #d4d4d4;
            --shadow: rgba(0,0,0,0.55);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.06), transparent 28%),
                linear-gradient(180deg, var(--bg-soft), var(--bg));
            color: var(--text);
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: rgba(17,17,17,0.9);
            padding: 30px;
            border-radius: 18px;
            border: 1px solid var(--line);
            box-shadow: 0 24px 60px var(--shadow);
            backdrop-filter: blur(8px);
        }

        h2 {
            font-size: 23px;
            font-weight: 500;
            margin-bottom: 25px;
            color: var(--text);
            letter-spacing: -0.04em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 14px 12px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            border-bottom: 1px solid var(--line);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            background: rgba(255,255,255,0.02);
        }

        td {
            padding: 15px 12px;
            font-size: 14px;
            color: var(--subtle);
            border-bottom: 1px solid var(--line);
        }

        tbody tr:hover td {
            background: rgba(255,255,255,0.02);
        }

        .empty {
            text-align: center;
            color: var(--muted);
            padding: 30px;
        }

        @media (max-width: 700px) {
            .container {
                padding: 20px;
                overflow-x: auto;
            }

            table {
                min-width: 650px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Registered Users</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($users)): ?>

                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= html_escape($user['id'] ?? ''); ?></td>
                        <td><?= html_escape($user['firstname'] ?? ''); ?></td>
                        <td><?= html_escape($user['lastname'] ?? ''); ?></td>
                        <td><?= html_escape($user['email'] ?? ''); ?></td>
                        <td><?= html_escape($user['username'] ?? ''); ?></td>
                    </tr>
                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="5" class="empty">
                        No users found in the database.
                    </td>
                </tr>

            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>

