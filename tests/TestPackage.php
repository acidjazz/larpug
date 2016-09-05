<?php 

class TestPackage extends PHPUnit_Framework_TestCase
{

  public function testConfig() {
    $test = new TestApp();
    $app = $test->createApplication();
    $this->assertEquals(config('app.env'), 'testing');
    $this->assertEquals('testing', $app['env']);
    $this->assertTrue($app->isBooted(), true);
  }

  public function testServiceProvider() {
    $test = new TestApp();
    $app = $test->createApplication();
    $this->assertContains('Larpug\ServiceProvider',config('app.providers'));
    $this->assertArrayhasKey('Larpug\ServiceProvider', $app->getLoadedProviders());
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
    $test->createApplication();

    view()->addLocation(__DIR__ . '/resources/views');
    $view = view('pages.test1')->render();
    $this->assertEquals($view, $result);

  }

  public function testError() {

    $test = new TestApp();
    $test->createApplication();

    view()->addLocation(__DIR__ . '/resources/views');
    $this->expectException(ErrorException::class);
    view('pages.error')->render();

  }

  public function testVars() {

    $result = '
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>';

    $test = new TestApp();
    $test->createApplication();

    view()->addLocation(__DIR__ . '/resources/views');
    $view = view('pages.vars', ['array' => [1,2,3,4,5]])->render();
    $this->assertEquals($view, $result);

  }



}


class TestApp extends Orchestra\Testbench\TestCase
{
  protected function getPackageProviders($app)
  {
    return ['Larpug\ServiceProvider'];
  }

}
