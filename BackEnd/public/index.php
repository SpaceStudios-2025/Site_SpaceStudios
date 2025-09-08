<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Verifica modo de manutenção
if (file_exists($maintenance = __DIR__.'/api/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Autoload do Composer
require __DIR__.'/api/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__.'/api/bootstrap/app.php';

/** @var Kernel $kernel */
$kernel = $app->make(Kernel::class);

// Captura a requisição e envia a resposta
$request = Request::capture();
$response = $kernel->handle($request);
$response->send();

// Finaliza a requisição (events, sessions, etc)
$kernel->terminate($request, $response);
