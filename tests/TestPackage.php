<?php 

namespace Orchestra\Testbench\TestCase;

class TestPackage extends \Orchestra\Testbench\TestCase {

  public function testConfig() {
    $test = new TestApp();
    $app = $test->createApplication();
    $this->assertEquals(config('app.env'), 'testing');
  }

  public function testServiceProvider() {
    $test = new TestApp();
    $app = $test->createApplication();
    $this->assertContains('Larpug\ServiceProvider',config('app.providers'));
  }

  public function testView() {

    $result = '<!DOCTYPE html>
<html lang="en">
  <head>
    <title>\'this is a title\'</title>
  </head>
  <body>
    <div class="test">test rendering</div>
  </body>
</html>';

    $test = new TestApp();
    $app = $test->createApplication();


    echo __DIR__ . './resources/views';
    view()->addLocation(__DIR__ . '/resources/views');
    $view = view('pages.test1')->render();
    $this->assertEquals($view, $result);


  }

}


class TestApp extends \Orchestra\Testbench\TestCase
{
  protected function getPackageProviders($app)
  {
    return ['Larpug\ServiceProvider'];
  }

}
