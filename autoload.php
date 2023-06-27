<?php
class Autoloader
{
    public static function controllers()
    {
        spl_autoload_register(function ($classname) {
            $file = "controllers/$classname.php";
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return null;
        });
    }

    public static function views()
    {
        spl_autoload_register(function ($classname) {
            // controllers/$classname.php
            $file = "views/includes/layouts/$classname.php";
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return null;
        });
    }
}
Autoloader::controllers();
Autoloader::views();