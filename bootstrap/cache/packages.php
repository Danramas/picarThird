<?php return array (
  'beyondcode/laravel-dump-server' => 
  array (
    'providers' => 
    array (
      0 => 'BeyondCode\\DumpServer\\DumpServerServiceProvider',
    ),
  ),
  'dingo/api' => 
  array (
    'providers' => 
    array (
      0 => 'Dingo\\Api\\Provider\\LaravelServiceProvider',
    ),
    'aliases' => 
    array (
      'API' => 'Dingo\\Api\\Facade\\API',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'saritasa/dingo-api-custom' => 
  array (
    'providers' => 
    array (
      0 => 'Saritasa\\DingoApi\\SaritasaDingoApiServiceProvider',
    ),
  ),
  'saritasa/laravel-controllers' => 
  array (
    'providers' => 
    array (
      0 => 'Saritasa\\LaravelControllers\\ControllersServiceProvider',
    ),
  ),
  'saritasa/laravel-entity-services' => 
  array (
    'providers' => 
    array (
      0 => 'Saritasa\\LaravelEntityServices\\LaravelEntityServicesServiceProvider',
    ),
  ),
  'saritasa/laravel-middleware' => 
  array (
    'providers' => 
    array (
      0 => 'Saritasa\\Middleware\\MiddlewareServiceProvider',
    ),
  ),
  'saritasa/laravel-repositories' => 
  array (
    'providers' => 
    array (
      0 => 'Saritasa\\LaravelRepositories\\LaravelRepositoriesServiceProvider',
    ),
  ),
  'saritasa/transformers' => 
  array (
    'providers' => 
    array (
      0 => 'Saritasa\\Transformers\\TransformersServiceProvider',
    ),
  ),
  'tymon/jwt-auth' => 
  array (
    'aliases' => 
    array (
      'JWTAuth' => 'Tymon\\JWTAuth\\Facades\\JWTAuth',
      'JWTFactory' => 'Tymon\\JWTAuth\\Facades\\JWTFactory',
    ),
    'providers' => 
    array (
      0 => 'Tymon\\JWTAuth\\Providers\\LaravelServiceProvider',
    ),
  ),
);