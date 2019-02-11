<?php
namespace scheduled;

use Dotenv\Dotenv;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
class EnvLoader
{
    /**
     * File extension constants.
     */
    const EXTENSION_PHP = 'php';
    const EXTENSION_ENV = 'env';

    /**
     * @param string|null $scriptPath
     */
    public static function load(string $scriptPath = null)
    {
        if (is_null($scriptPath)) {
            // Do nothing.
        } else {
            $directory = realpath(dirname($scriptPath));
            $fileName = static::convertToDotEnvString(basename($scriptPath));
            $dotenv = new Dotenv($directory, $fileName);
            $dotenv->load();
        }
    }

    /**
     * @param string $scriptName
     *
     * @return string
     */
    private static function convertToDotEnvString(string $scriptName): string
    {
        return rtrim($scriptName, self::EXTENSION_PHP) . self::EXTENSION_ENV;
    }
}
