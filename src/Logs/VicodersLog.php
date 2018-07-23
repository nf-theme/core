<?php
namespace NF\Logs;

use Elastica\Client;

class VicodersLog
{
    protected $client;
    protected $options;

    static $instance;

    public $host = 'logs.vicoders.com';
    public $port = '9200';

    private function __construct()
    {
        if (defined('VCLOG_HOST')) {
            $this->host = VCLOG_HOST;
        }
        if (defined('VCLOG_PORT')) {
            $this->port = VCLOG_PORT;
        }
        $config = [
            'host' => $this->host,
            'port' => $this->port,
        ];
        $this->client  = new Client($config);
        $this->options = [
            'index' => $_SERVER['SERVER_NAME'],
            'type'  => 'doc',
        ];
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getOption()
    {
        return $this->options;
    }

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}
