<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Lib\Contracts\Config;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class LogServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        LoggerInterface::class
    ];

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        $config = $this->getContainer()->get(Config::class);

        $logger = new Logger($config['app.log.channel']);
        $logger->pushHandler(new StreamHandler($config['app.log.file'], $config['app.log.level']));

        $this->getContainer()->share(LoggerInterface::class, $logger);
    }
}