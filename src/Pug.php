<?php

namespace larpug;
use Illuminate\View\Engines\EngineInterface;

class Pug implements EngineInterface  {

  public function __construct() {
  }

  public function get($path, array $data=[]) {

    \Debugbar::info($data);

    return file_get_contents($path);

  }

}
