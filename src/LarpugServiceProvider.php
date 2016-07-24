<?php

namespace larpug;

use Illuminate\View\ViewServiceProvider;

class LarpugServiceProvider extends ViewServiceProvider
{



  public function boot() {

    $this->app['view']->addExtension('pug', 'pug', function() {
      return $this->app['larpug\Pug'];
    });

  }

}
