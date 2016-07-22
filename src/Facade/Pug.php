<?php

namespace larpug\Facade;

use Illuminate\Support\Facades\Facade;

class Pug extends Facade
{

  protected static function getFacadeAccessor() {
    return 'pug';
  }

}
