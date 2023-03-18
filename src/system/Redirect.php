<?php
class Redirect
{
    private static bool $is_init = false;
    private static string $root ;
    private static string $previous_path;

    public static function init() {
        if (self::$is_init) {
            return new self();
        }
        self::$root = url();
        self::$previous_path = '';
        self::$is_init = true;
        return new self();
    }

    /**
     * @return string
     */
    public static function getPreviousPath(): string
    {
        return self::$previous_path;
    }

    /**
     * @param string $previous_path
     */
    public static function setPreviousPath(string $previous_path): void
    {
        self::$previous_path = $previous_path;
    }

    /**
     * @return string
     */
    public static function getRoot(): string
    {
        return self::$root;
    }

    /**
     * @param string $root
     */
    public static function setRoot(string $root): void
    {
        self::$root = $root;
    }


    public static function to($path = '')
    {
        if ($path === '/')
            $path = '';
        self::init();
        header('Location:'.self::getRoot().$path);
        self::setPreviousPath(self::getRoot().$_SERVER['REQUEST_URI']);
    }

    public static function back() {
        self::init();
        header('Location:'.self::getPreviousPath());
    }
}