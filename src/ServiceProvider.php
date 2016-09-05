<?php

namespace Larpug;

use Illuminate\View\ViewServiceProvider;

class ServiceProvider extends ViewServiceProvider
{
  public function boot() {
    $this->app['view']->addExtension('pug', 'pug', function() {
      return $this->app['Larpug\Pug'];
    });
  }
}
