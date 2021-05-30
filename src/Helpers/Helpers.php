<?php

use Arungpisyadi\Xoeshee\Exceptions\UndefinedMethodException;
use Illuminate\Support\Facades\File;

if (!function_exists('package_path')) {
    function package_path($path = null)
    {
        return base_path('vendor/arungpisyadi/xoeshee/src').DIRECTORY_SEPARATOR.ltrim($path, '/');
    }
}

if (!function_exists('model_exists')) {
    function model_exists($name)
    {
        return File::exists(str_replace('\\', DIRECTORY_SEPARATOR, base_path(lcfirst(ltrim(config('xoeshee.models.namespace'), '\\'))).ucfirst($name).'.php'));
    }
}

if (!function_exists('Baker_exists')) {
    function Baker_exists($name)
    {
        return File::exists(package_path('Bakers/' . $name . 'Baker.php'));
    }
}

if (!function_exists('package_version')) {
    function package_version($packageName)
    {
        $file = base_path('composer.lock');
        $packages = json_decode(file_get_contents($file), true)['packages'];
        foreach ($packages as $package) {
            if (explode('/', $package['name'])[1] == $packageName) {
                return $package['version'];
            }
        }
        throw new \Exception('Package Does not exist', 500);
    }
}

if (!function_exists('bake')) {
    function bake($name)
    {
        $models = config('xoeshee.models.package');
        $name = str_replace('Baker', '', $name);
        $model = model($name);
        if (!in_array(strtolower($name) , config('xoeshee.bakers.user'))) {
            $baker = '\\Arungpisyadi\\Xoeshee\\Bakers\\' . ucfirst($name) . 'Baker';
        }
        if (in_array(strtolower($name) , config('xoeshee.bakers.user'))) {
            $baker = config('xoeshee.bakers.user')[strtolower($name)];
        }
        if (!isset($baker)) {
            throw new \Exception('Baker does not exist');
        }
        return new $baker($model);
    }
}

if (!function_exists('market_model_exists')) {
    function market_model_exists($name)
    {   
        if (str_contains($name, 'Eloquent')) {
            return File::exists(__DIR__.'/../Models/'.ucfirst($name).'.php');
        }
        return File::exists(__DIR__.'/../Models/Eloquent'.ucfirst($name).'.php');
    }
}

if (!function_exists('model')) {
    function model(string $name, array $attributes = [])
    {
        $name = ucfirst(str_replace('Eloquent', '', $name));

        if (File::exists(str_replace('\\', DIRECTORY_SEPARATOR, base_path(lcfirst(ltrim(config('xoeshee.models.namespace'), '\\'))).$name.'.php'))) {
            if (array_key_exists(lcfirst($name), config('xoeshee.models.user'))) {
                $model = config('xoeshee.models.user')[lcfirst($name)];
            } elseif (model_exists($name)) {
                $model = config('xoeshee.models.namespace').$name;
            } else {
                $model = config('xoeshee.models.package')[lcfirst($name)];
            }
            return new $model($attributes);
        } elseif (File::exists(__DIR__.'/../Models/Eloquent'.$name.'.php')) {
            $model = '\\Arungpisyadi\\Xoeshee\\Models\\Eloquent'. $name;
            return new $model($attributes);
        }
        throw new UndefinedMethodException("Model $name Does not exist", 500);
    }
}
