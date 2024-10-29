<?php

namespace ApiPHP;

use ApiPHP\Http\Router;

/**
 * Class App
 *
 * Az `App` osztály a framework fő belépési pontjaként szolgál,
 * amely tárolja az alkalmazás fő konténerét és router objektumát.
 */
class App
{

	/**
	 * @var object $container Tárolja az alkalmazás konténerét, amely az egyes komponensek regisztrálására és elérésére szolgál.
	 */
	protected static object $container;

	/**
	 * @var Router $router Az alkalmazás routere, amely a különböző útvonalakat kezeli.
	 */
	protected static Router $router;

	/**
	 * Beállítja az alkalmazás routerét.
	 *
	 * @param Router $router A router példánya, amelyet az alkalmazás használni fog.
	 */
	public static function setRouter(Router $router): void
	{
		static::$router = $router;
	}

	/**
	 * Beállítja az alkalmazás konténerét.
	 *
	 * @param object $container Egy objektum, amely a konténerként szolgál.
	 */
	public static function setContainer(object $container): void
	{
		static::$container = $container;
	}

	public static function bind(string $key, callable|object $container): void
	{
		static::$container->bind($key, $container);
	}

	/**
	 * Visszaad egy komponenst a konténerből az adott kulcs alapján.
	 *
	 * @param string $key A lekérdezett komponens kulcsa.
	 * @return mixed A konténerből visszaadott komponens.
	 */
	public static function container(string $key): mixed
	{
		return static::$container->take($key);
	}

	/**
	 * Visszatér a router objektummal.
	 *
	 * @return Router Az alkalmazás router objektuma.
	 */
	public static function router(): Router
	{
		return static::$router;
	}
}
