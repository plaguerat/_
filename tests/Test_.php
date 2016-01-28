<?php
namespace DarrenGreen\Tests\_;

use DarrenGreen\_\_;

class Test_ extends \PHPUnit_Framework_TestCase
{
    public function testIsObject()
    {
        $this->assertTrue(_::isObject(new \StdClass));
    }
}
