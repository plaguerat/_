<?php
namespace DarrenGreen\Tests\_;

class TestTestFunctions extends \PHPUnit_Framework_TestCase
{
    private $traitObject;

    public function setUp()
    {
        $this->traitObject = $this->createObjectForTrait();
    }

    public function createObjectForTrait()
    {
        $traitName = "DarrenGreen\_\TestFunctions";
        return $this->getObjectForTrait($traitName);
    }

    /***************************************************************************
     * Tests
     **************************************************************************/

     /**
      * @covers _::isObject
      */
    public function testIsObjectNoObject()
    {
        $this->assertTrue(! $this->traitObject->isObject("string"));
        $this->assertTrue($this->traitObject->isObject(new \StdClass));
    }

    /**
     * @covers _::isNumeric
     */
    public function testIsNumeric()
    {
        $this->assertTrue(
            $this->traitObject->isNumeric(2)
        );
        $this->assertTrue(
            ! $this->traitObject->isNumeric("hello")
        );
        $this->assertTrue(
            $this->traitObject->isNumeric("25")
        );
    }
}
