<?php

namespace Kata;

class Map
{
    private $areas;

    private $flattened = [];

    public function __construct(array $data)
    {
        $areas = [];
        foreach ($data as $y => $row) {
            $areaRow = [];
            foreach ($row as $x => $type) {
                $area = new Area($type, $x, $y, $this);
                $areaRow[$x] = $area;
                $this->flattened[] = $area;
            }
            $areas[$y] = $areaRow;
        }

        $this->areas = $areas;
    }

    public function getWidth() : int
    {
        return count($this->areas[0]);
    }

    public function getHeight() : int
    {
        return count($this->areas);
    }

    public function getArea(int $x, int $y) : ?Area
    {
        if (isset($this->areas[$y][$x])) {
            return $this->areas[$y][$x];
        }
        return null;
    }

    public function getFlattenedList() : array
    {
        return $this->flattened;
    }
}
