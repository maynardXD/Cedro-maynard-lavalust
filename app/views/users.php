
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>

    <style>
        :root {
            --bg: #0b0b0b;
            --panel: #111111;
            --panel-soft: #171717;
            --border: #2a2a2a;
            --text: #f5f5f5;
            --muted: #a1a1a1;
            --subtle: #d4d4d4;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: var(--panel);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: 0 18px 40px rgba(0,0,0,0.35);
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
            border-bottom: 1px solid var(--border);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        td {
            padding: 15px 12px;
            font-size: 14px;
            color: var(--subtle);
            border-bottom: 1px solid #1e1e1e;
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

