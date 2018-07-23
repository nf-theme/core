<?php
namespace NF\Logs;

use Elastica\Client;
use Monolog\Handler\ElasticSearchHandler;
use Monolog\Logger;
use NF\Logs\Facades\Config;

class VicodersLog
{
    protected $handler;
    protected $client;
    protected $options;

    public function __construct()
    {
        $config       = Config::get();
        $this->client = new Client($config);

        $domain = !empty($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : replace(["http://", "https://", ":", "/", "-"], '', site_url());

        $this->options = [
            'index' => $domain,
            'type'  => 'doc',
        ];
    }

    public function info($message)
    {
        $this->handler = new ElasticSearchHandler($this->client, $this->options, Logger::INFO);
        $this->pushHandler($message, 'info');
    }

    public function warning($message)
    {
        $this->handler = new ElasticSearchHandler($this->client, $this->options, Logger::WARNING);
        $this->pushHandler($message, 'warning');
    }

    public function error($message)
    {
        $this->handler = new ElasticSearchHandler($this->client, $this->options, Logger::ERROR);
        $this->pushHandler($message, 'error');
    }

    public function debug($message)
    {
        $this->handler = new ElasticSearchHandler($this->client, $this->options, Logger::DEBUG);
        $this->pushHandler($message, 'debug');
    }

    public function pushHandler($message, $type = 'info') {
        $log           = new Logger('Vicoders Logs Tool');
        $log->pushHandler($this->handler);
        $log->{$type}($message);
    }
}
