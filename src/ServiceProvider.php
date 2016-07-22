<?php

namespace larpug;

use Illuminate\View\ViewServiceProvider;
use InvalidArgumentException;

class ServiceProvider extends ViewServiceProvider
{

  public function register() {

  }

  public function boot() {

  }

  public function isLumen() {
    return strpos($this->app->version, 'Lumen') !== false;
  }
  
  public function registerExtension() {
    $this->app['view']->addExtension(
      $this->app['pug.extension'],
      'pug',
      function() {
        return $this->app['pug.engine'];
      }
    );
  }

  public function test() {
    echo "this is a test";
  }

}
