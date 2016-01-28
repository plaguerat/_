<?php
namespace PlagueRat\Tests\_;

use PlagueRat\_\_;

class Test_ extends \PHPUnit_Framework_TestCase
{
    public function testIsObject()
    {
        $this->assertTrue(_::isObject(new \StdClass));
    }
}
