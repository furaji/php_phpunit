<?php
namespace Range;

class Range
{
    private $bottom;
    private $top;

    public function __construct($bottom, $top)
    {
        if ($bottom > $top) {
            throw new Exception\InvalidRangeException;
        }
        $this->bottom = $bottom;
        $this->top = $top;
    }

    public function getBottom()
    {
        return $this->bottom;
    }

    public function getTop()
    {
        return $this->top;
    }

    public function toString()
    {
        return sprintf('[%d,%d]', $this->bottom, $this->top);
    }

    public function contains($number)
    {
        return $this->bottom <= $number && $number <= $this->top;
    }

    public function equals($other_range)
    {
        return $this->bottom == $other_range->getBottom()&&
               $this->top    == $other_range->getTop();
    }

    public function isConnectedTo($other_range)
    {
        $not_connect = ($other_range->getTop() < $this->bottom ||
                        $this->top < $other_range->getBottom());
        return !$not_connect;
    }
}
