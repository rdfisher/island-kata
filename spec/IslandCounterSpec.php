<?php

namespace spec\Kata;

use Kata\IslandCounter;
use Kata\Map;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IslandCounterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(IslandCounter::class);
    }

    function it_can_count_example_one()
    {
        $map = new Map([
            [1, 1, 1, 1, 0],
            [1, 1, 0, 1, 0],
            [1, 1, 0, 0, 0],
            [0, 0, 0, 0, 0]
        ]);
        $this->countIslands($map)->shouldBe(1);
    }

    function it_can_count_example_two()
    {
        $map = new Map([
            [1, 1, 0, 0, 0],
            [1, 1, 0, 0, 0],
            [0, 0, 1, 0, 0],
            [0, 0, 0, 1, 1]
        ]);
        $this->countIslands($map)->shouldBe(3   );
    }
}
