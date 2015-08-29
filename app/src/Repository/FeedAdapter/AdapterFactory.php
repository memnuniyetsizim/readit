<?php

namespace FeedAdapter;

use FeedAdapter\Exception\AdapterNotFound;
use GuzzleHttp\Client;

class AdapterFactory
{
    public static function get($standard)
    {
        $class_name = self::getNamespace().self::getClassName($standard);
        if (class_exists($class_name)) {
            return new $class_name(new Client());
        } else {
            throw new AdapterNotFound($standard.' ('.$class_name.') is not implemented or does not exist');
        }
    }

    public static function getClassName($standard)
    {
        return ucwords(strtolower(str_replace([' ', '.'], '_', $standard)));
    }

    private static function getNamespace()
    {
        return 'FeedAdapter\Adapters\\';
    }
}
