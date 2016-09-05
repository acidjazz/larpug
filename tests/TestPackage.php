<?php 

namespace Orchestra\Testbench\TestCase;

class TestPackage extends \Orchestra\Testbench\TestCase {

  protected function getPackageProviders($app)
  {
    return ['Larpug\ServiceProvider'];
  }

  public function testConfig() {
    $this->assertEquals(config('app.env'), 'testing');
  }

  public function testServiceProvider() {
    $this->assertContains('Larpug\ServiceProvider',config('app.providers'));
  }

}
