<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

try {
    // Register an autoloader
    $loader = new Loader();
    $loader->registerDirs(
        [
            '../app/controllers/',
            '../app/models/'
        ]
    )->register();

    $composerAutoload = '../vendor/autoload.php';
    if (file_exists($composerAutoload)) {
        require $composerAutoload;

        $environmentVarsFile = '../app/configs/.env';
        $environmentVarsDir  = '../app/configs';

        if (file_exists($environmentVarsFile)) {
            $dotenv = new Dotenv\Dotenv($environmentVarsDir);
            $dotenv->load();
        }
    }

    // Create a DI
    $di = new FactoryDefault();

    // Setup the database service
    $di->set('db', function () {
        return new DbAdapter([
            'host'     => 'localhost',
            'username' => getenv('username'),
            'password' => getenv('password'),
            'dbname'   => getenv('dbname'),
        ]);
    });

    // Setup the view component
    $di->set('view', function () {
        $view = new View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    // Setup a base URI so that all generated URIs include the '/' folder
    $di->set('url', function () {
        $url = new UrlProvider();
        $url->setBaseUri('/');
        return $url;
    });

    // Handle the request
    $application = new Application($di);

    echo $application->handle()->getContent();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}
