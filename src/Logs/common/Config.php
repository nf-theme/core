<?php 
namespace NF\Logs\Common;

/**
 * 
 */
class Config
{
	protected $config = [];

	public function __construct()
	{
    	$this->config = require $this->configLogPath() . DIRECTORY_SEPARATOR . 'logs.php';
	}

	public function get() {
    	return $this->config;
    }

    public function configLogPath() {
    	return get_stylesheet_directory() . DIRECTORY_SEPARATOR . 'config';
    }

    public function getConfigByKey($key) {
        return $this->config[$key];
    }
}