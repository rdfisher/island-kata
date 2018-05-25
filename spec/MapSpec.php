<?php

namespace spec\Kata;

use Kata\Area;
use Kata\Map;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MapSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
           [1, 0, 0],
           [0, 1, 1]
        ]);

        $this->shouldHaveType(Map::class);
    }

    function it_can_provide_dimensions()
    {
        $this->getWidth()->shouldBe(3);
        $this->getHeight()->shouldBe(2);
    }

    function it_can_return_the_area_at_coordinates()
    {
        $this->getArea(0, 0)->shouldBeLike(new Area(1, 0, 0, $this->getWrappedObject()));
    }

    function it_can_return_a_flattened_list()
    {
        $this->getFlattenedList()->shouldHaveCount(6);
    }
}
