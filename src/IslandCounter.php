<?php

namespace Kata;

class IslandCounter
{
    public function countIslands(Map $map) : int
    {
        $count = 0;

        /** @var Area $area */
        foreach ($map->getFlattenedList() as $area) {
            if ($area->isLand()) {
                $count ++;
                $this->sinkIsland($area);
            }
        }

        return $count;
    }

    private function sinkIsland(Area $area)
    {
        $candidates = [$area];

        while (! empty($candidates)) {
            /** @var Area $candidate */
            $candidate = array_shift($candidates);
            $candidate->sink();
            /** @var Area $neighbour */
            foreach ($candidate->getNeighbours() as $neighbour) {
                if ($neighbour->isLand()) {
                    $candidates[] = $neighbour;
                }
            }
        }
    }
}
