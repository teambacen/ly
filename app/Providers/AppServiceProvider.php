<?php
/**
 *
 */
namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Route\RouteCollection;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response\SapiEmitter;

class AppServiceProvider extends AbstractServiceProvider
{

  //Bagitahu key apa yang ada
  protected $provides = [
    RouteCollection::class,
    'response',
    'request',
    'emitter'
  ];

  // Untuk hilangkan error register
  public function register(){
    $container = $this->getContainer();

    //create route
    $container->share(RouteCollection::class , function () use ($container){
      return new RouteCollection($container);
    });

    //response untuk bila kita buat request
    $container->share('response', Response::class);

    //server need to know current request
    $container->share('request', function(){
      return ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
      );
    });

    //untuk menyenangkan akses kepada controller
    $container->share('emitter', SapiEmitter::class);

  }
}
