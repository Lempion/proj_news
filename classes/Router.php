<?php

class Router
{

    public static function route($path)
    {
        $paths = $GLOBALS['paths'];

        $arrPaths = explode('/', $path);
        $arrPaths[0] = '/';
        $countPaths = count($arrPaths);
        $previousParam = null;

        for ($i = 1; $i <= $countPaths; $i++) {
            if (key_exists($path, $paths)) {
                $include = $paths[$path];
                break;
            }
            $path = rtrim($path, "/{$arrPaths[$countPaths-$i]}");
            $previousParam = $arrPaths[$countPaths - $i];
        }


        if (!empty($include)) {
            if (!$include['independent'] && !is_numeric($previousParam) || $previousParam && !is_numeric($previousParam)) {
                return ['include' => __DIR__ . "/../includes/error/404.php"];
            }

            return ['include' => __DIR__ . "/../module/" . $include['path'], 'get' => $previousParam];
        }

        return ['include' => __DIR__ . "/../404.php"];

    }

}