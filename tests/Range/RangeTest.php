<?php

use Range\Range;

class RangeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
    }

    public function test_上端点が下端点より小さい場合例外が投げられる()
    {
        $this->setExpectedException('Range\Exception\InvalidRangeException');
        $obj = new Range(8, 3);
    }

    public function test_上端点と下端点が等しい場合インスタンスを生成できる()
    {
        $obj = new Range(3, 3);
        $this->assertInstanceOf('Range\Range', $obj);
    }

    public function test_閉区間から下端点を取得()
    {
        $obj = new Range(3, 8);
        $this->assertEquals(3, $obj->getBottom());
    }

    public function test_閉区間から上端点を取得()
    {
        $obj = new Range(3, 8);
        $this->assertEquals(8, $obj->getTop());
    }

    /**
     * @dataProvider provideBottomAndTopAndString
     */
    public function test_閉区間から文字列表記を取得($bottom, $top, $string)
    {
        $obj = new Range($bottom, $top);
        $this->assertEquals($string, $obj->toString());
    }

    public function provideBottomAndTopAndString()
    {
      return array(
        array(3, 8, '[3,8]'),
        array(5, 8, '[5,8]'),
      );
    }

    /**
     * @dataProvider provideIncludedNumber
     */
    public function test_閉区間に指定した整数が含まれるか判定($range, $number, $is_included)
    {
      $this->assertEquals($is_included, $range->contains($number));
    }

    public function provideIncludedNumber()
    {
      return array(
        array(new Range(3, 8), 2, false),
        array(new Range(3, 8), 3, true),
        array(new Range(3, 8), 8, true),
        array(new Range(3, 8), 9, false),
      );
    }
}
