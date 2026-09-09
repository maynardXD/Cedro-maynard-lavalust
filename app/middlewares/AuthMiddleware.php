<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 4
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */
/*
|--------------------------------------------------------------------------
| Adding of middlewares
|--------------------------------------------------------------------------
|
| Used for adding middlewares
|
*/
foreach (['AuthMiddleware', 'AdminMiddleware', 'StudentMiddleware'] as $middleware_class) {
    $class_file = APP_DIR . 'middlewares/' . $middleware_class . '.php';
    if (file_exists($class_file) && !class_exists($middleware_class, false)) {
        require_once $class_file;
    }
}

if (!function_exists('get_config')) {
    /**
     * Returns global config array. Optionally merges new config.
     *
     * @param array|null $new_config
     * @return array
     */
    function get_config(?array $new_config = null)
    {
        static $config = null;

        if ($config === null) {
            // Load main config.php first
            $main_file = APP_DIR . 'config/config.php';

            require_once($main_file); // must define $config array

            if (file_exists(APP_DIR . 'config/middleware.php')) {
                require_once APP_DIR . 'config/middleware.php';
            }

            if (!isset($config) || !is_array($config)) {
                throw new RuntimeException('config.php must define $config array');
            }
        }

        // Merge new configs if provided
        if (is_array($new_config)) {
            $config = array_merge($config, $new_config);
        }

        return $config;
    }
}

$config['middlewares'] = [
    'auth' => new AuthMiddleware(),
    'admin' => new AdminMiddleware(),
    'authmiddleware' => new AuthMiddleware(),
    'adminmiddleware' => new AdminMiddleware(),
    'StudentMiddleware' => new StudentMiddleware(),
    'student' => new StudentMiddleware(),
    'studentmiddleware' => new StudentMiddleware(),
];

/**
 * AuthMiddleware
 *
 * Blocks unauthenticated users from reaching the routes it is attached to.
 * A user is considered authenticated once AuthController::authenticate()
 * has set $_SESSION['user_id'] on a successful login.
 */
class AuthMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param Closure $next
     * @return mixed
     */
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $is_logged_in = isset($_SESSION['user_id']);

        if (!$is_logged_in) {
            // Remember where the user was headed so we can send them
            // back there after a successful login.
            $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'] ?? '/products';
            redirect('login?denied=1');
            return;
        }

        return $next();
    }
}

class StudentMiddleware
{
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['student_access'] = true;

        return $next();
    }
}
