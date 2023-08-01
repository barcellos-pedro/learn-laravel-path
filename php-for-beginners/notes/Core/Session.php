<?php

namespace Core;

class Session
{
    /** Put value on session (not flash) */
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /** Get value from either from session flash values or normal values */
    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    /** Check if session has some key */
    public static function has($key)
    {
        return (bool)static::get($key);
    }

    /** Put value on session flash values */
    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    /** Clears session flash values */
    public static function unFlash()
    {
        unset($_SESSION['_flash']);
    }

    /** Clear $_SESSION super global */
    public static function flush()
    {
        $_SESSION = [];
    }

    /** Destroy and clear session cookie */
    public static function destroy()
    {
        static::flush();

        session_destroy(); // destroy session file

        $params = session_get_cookie_params();
        $expires = time() - 3600; // 1 hour ago

        // expire and "delete" (clear) cookie
        setcookie('PHPSESSID', '', $expires, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}