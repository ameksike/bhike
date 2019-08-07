<?php

/**
 * @codeCoverageIgnore
 */
class BHBuild_Autoloader
{
    /**
    * Registers BHBuild_Autoloader as an SPL autoloader.
    */
    static public function register()
    {
        ini_set('unserialize_callback_func', 'spl_autoload_call');
        spl_autoload_register(array(new self, 'autoload'));
    }

    /**
    * Handles autoloading of classes.
    *
    * @param string $class A class name.
    */
    static public function autoload($class)
    {
		if (0 !== strpos($class, 'BHBuild')) {
			return;
		}
		
		$file = dirname(dirname(__FILE__)) . '/' . strtr($class, '_', '/') . '.php';
		if (is_file($file)) {
			require $file;
		}		
    }
}
