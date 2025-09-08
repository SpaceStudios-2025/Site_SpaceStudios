<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    | Rotas que devem permitir CORS. Normalmente as APIs.
    |
    */
    'paths' => ['api/*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    */
    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Aqui você coloca os domínios que podem acessar sua API.
    | Use localhost/127.0.0.1 para desenvolvimento e seu domínio
    | real para produção.
    |
    */
    'allowed_origins' => [
        'http://localhost:5173', // Vue dev
        'http://127.0.0.1:5173', // alternativa
        'https://www.spacestudios.com.br', // produção
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
