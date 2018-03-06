<?php

namespace UserProvider;

use UserProvider\Core\Curl;


class Base {
	protected $curl;
	protected $messages;

	public function __construct() {
		
		define('BASE_DIR', dirname(__DIR__));
		$this->messages = include BASE_DIR . '/config/messages.php';
	}

	protected setCurl($url)
	{
		$this->curl = new Curl($url);
	}

}