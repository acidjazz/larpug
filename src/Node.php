<?php

namespace larpug;

class Node  {

  public static function post($module, $url, $options, $data) {

    $before = microtime(true);

    if (self::checkProcess() == false) {
      self::startProcess();
    }

    $handler = curl_init();
    $headers = ['Content-Type: text/html'];

    $params = ['module' => $module, 'options' => $options, 'data' => $data];

    curl_setopt($handler, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handler, CURLOPT_POST, true);
    curl_setopt($handler, CURLOPT_POSTFIELDS, json_encode($params));

    curl_setopt($handler, CURLOPT_URL, $url);

    $data = curl_exec($handler);

    return [
      'status' => curl_getinfo($handler, CURLINFO_HTTP_CODE),
      'data' => $data,
      'benchmark' => (microtime(true)-$before)
    ];

  }

  public static function checkProcess() {
    exec('pgrep -lf "larpug.js"', $output);
    if (count($output) < 2) {
      return false;
    }
    return true;
  }

  public static function startProcess() {
    exec('node '.__DIR__.'/../node/larpug.js > /dev/null 2>&1 &');
    sleep(1);
  }

}
