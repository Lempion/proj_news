<?php

class Config
{
    public static function get($path = null)
    {
        if ($path) {
            $config = require "../config.php";

            $arrPath = explode('.', $path);

            foreach ($arrPath as $item) {
                if (isset($config[$item])) {
                    $config = $config[$item];
                }
            }
            return $config;
        }
        return false;
    }
}