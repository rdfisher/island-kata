<?php

namespace Kata;

class Area
{
    const TYPE_LAND = 1;
    const TYPE_SEA = 0;

    /** @var int */
    private $type;

    /** @var int*/
    private $x;

    /** @var int */
    private $y;

    /** @var Map */
    private $map;

    public function __construct(int $type, int $x, int $y, Map $map)
    {
        if (! in_array($type, [self::TYPE_SEA, self::TYPE_LAND])) {
            throw new \InvalidArgumentException('Unknown area type: ' . $type);
        }
        $this->type = $type;
        $this->x = $x;
        $this->y = $y;
        $this->map = $map;
    }

    public function isLand() : bool
    {
        return $this->type == 1;
    }

    public function isSea()
    {
        return $this->type == 0;
    }

    public function sink()
    {
        $this->type = 0;
    }

    public function getNeighbours() : array
    {
        $north = $this->map->getArea($this->x, $this->y - 1);
        $south = $this->map->getArea($this->x, $this->y + 1);
        $east = $this->map->getArea($this->x + 1, $this->y);
        $west = $this->map->getArea($this->x - 1, $this->y);
        return array_filter([$north, $south, $east, $west]);
    }
}
