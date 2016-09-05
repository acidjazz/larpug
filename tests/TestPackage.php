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

}


class TestApp extends \Orchestra\Testbench\TestCase
{
  protected function getPackageProviders($app)
  {
    return ['Larpug\ServiceProvider'];
  }

}
