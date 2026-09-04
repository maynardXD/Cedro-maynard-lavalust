```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            font-size: 13px;
            color: #666;
            font-weight: 600;
            padding: 14px 12px;
            border-bottom: 2px solid #eee;
        }

        td {
            padding: 15px 12px;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        tr:hover td {
            background: #fafafa;
        }

        .empty {
            text-align: center;
            color: #888;
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
```
