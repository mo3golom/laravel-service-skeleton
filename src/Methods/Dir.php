<?php

namespace mo3golom\LaravelServiceSkeleton\Methods;

use mo3golom\LaravelServiceSkeleton\Methods\Contracts\DirInterface;

class Dir implements DirInterface
{
    /**
     * @param string $dir
     * @throws \Exception
     */
    public function check(string $dir)
    {
        if (!file_exists($dir)) {
            $this->create($dir);
        }


    }

    function create(string $dir): bool
    {
        return mkdir($dir);
    }

}