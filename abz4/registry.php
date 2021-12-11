<?php

// Синглтон
class Registry {

	private static $_instance;
	private $_params = array();

	private function __construct( )
	{
	}

	static function getInstance()
	{
		if (!isset(self::$_instance)) {
			self::$_instance = new self;
		}
		self::$_instance;
	}

	public function __set($key, $value)
	{
		$this->_params[$key] = $value;
	}

	public function __get($key)
	{
		if (array_key_exists($key, $this->_params)) {
			return $this->_params[$key];
		}
	}
}
?>