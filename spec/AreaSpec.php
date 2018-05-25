<?php

namespace spec\Kata;

use Kata\Area;
use Kata\Map;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AreaSpec extends ObjectBehavior
{
    function let(Map $map)
    {
        $this->beConstructedWith(Area::TYPE_LAND, 0, 2, $map);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Area::class);
    }

    function it_can_expose_type()
    {
        $this->isLand()->shouldBe(true);
        $this->isSea()->shouldBe(false);
    }

    function it_can_be_sunk()
    {
        $this->sink();
        $this->isSea()->shouldBe(true);
    }

    function it_can_return_its_neighbours(
        Map $map,
        Area $north,
        Area $south,
        Area $east
    ) {
        $map->getArea(0, 1)->willReturn($north);
        $map->getArea(0, 3)->willReturn($south);
        $map->getArea(-1, 2)->willReturn(null);
        $map->getArea(1, 2)->willReturn($east);
        $this->getNeighbours()->shouldBe([$north, $south, $east]);
    }
}
