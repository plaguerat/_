<?php
namespace PlagueRat\Tests\_;

use PlagueRat\_\_;

class TestArrayFunctions extends \PHPUnit_Framework_TestCase
{
    private $traitObject;

    public function setUp()
    {
        $this->traitObject = $this->createObjectForTrait();
    }

    public function createObjectForTrait()
    {
        $traitName = "PlagueRat\_\ArrayFunctions";
        return $this->getObjectForTrait($traitName);
    }

    /***************************************************************************
     * Tests
     **************************************************************************/

    /**
     * @covers _::chunk
     */
    public function testChunk()
    {
        $array = [ "a", "b", "c", "d" ];
        $subset = [ [ "a", "b" ], [ "c", "d" ] ];
        $this->assertTrue($this->traitObject->chunk($array, 2) == $subset);
    }

    public function testCompact()
    {
        $array = [ "hello", "World", false, "", 0 ];
        $newArray = $this->traitObject->compact($array);
        $this->assertCount(5, $array);
        $this->assertCount(2, $newArray);
        $this->assertTrue($array !== $newArray);
    }

    public function testConcat()
    {
        $newArray = $this->traitObject->concat(
            [ "1", "2", "3" ],
            [ "4" ],
            [ "5", "6", "7" ]
        );
        $this->assertCount(7, $newArray, "passed");
    }

    public function testDifference()
    {
        $array1 = [ '1', '2', '3' ];
        $array2 = [ '1', '3', '4' ];
        $array3 = [ '1', '5', '6' ];

        $newArray = $this->traitObject->difference($array1, $array2, $array3);
        $this->assertCount(1, $newArray);
        $this->assertContains('2', $newArray);

    }

    // public function testDifferenceBy()
    // {
    //     $array1 = [ 3.1, 2.2, 1.3 ];
    //     $array2 = [ 4.4, 2.5 ];
    //     $newArray = $this->traitObject->differenceBy($array1, $array2, "floor");
    // }

    public function testMap()
    {
        $array = [ 1, 2, 3 ];
        $newArray = $this->traitObject->map(
            $array,
            function ($num) {
                return $num * 2;
            }
        );
        $this->assertEquals($newArray, [ 2, 4, 6 ]);
        $this->assertNotEquals($newArray, $array);
        $array2 = [ 1.1, 2.5, 3 ];
        $newArray2 = $this->traitObject->map($array2, "floor");
        $this->assertEquals($newArray2, [ 1, 2, 3 ]);
    }
}
