<?php

namespace larpug;
use Illuminate\View\Engines\EngineInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Pug implements EngineInterface  {

  public function __construct() {

  }

  public function get($path, array $data=[]) {

    \Debugbar::info($data);

    $result = $this->compile($path, $data);

    return $result['data'];

  }

  public function compile($path, $data) {

    $result = Node::post('pug', 'http://localhost:4242/', ['file' => $path], $data);

    if ($result['status'] == 500) {
      trigger_error('Compilation Error: '.$result['data']);
      return false;

    }

    return $result;

  }

}
