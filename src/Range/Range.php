<?php
namespace Range;

class Range
{
    private $botoom;
    private $top;

    public function __construct($botoom, $top)
    {
        if ($botoom > $top) {
            throw new Exception\InvalidRangeException;
        }
        $this->botoom = $botoom;
        $this->top = $top;
    }

    public function getBottom()
    {
        return $this->botoom;
    }

    public function getTop()
    {
        return $this->top;
    }

    public function toString()
    {
        return sprintf('[%d,%d]', $this->botoom, $this->top);
    }

    public function contains($number)
    {
        return $this->botoom <= $number && $number <= $this->top;
    }

    public function equals($other_range)
    {
        return $this->botoom == $other_range->getBottom()&&
               $this->top    == $other_range->getTop();
    }
}
