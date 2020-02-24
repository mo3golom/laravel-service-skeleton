<?php

namespace LaravelServiceSkeleton\Methods;

use LaravelServiceSkeleton\Methods\Contracts\DirInterface;

class Dir implements DirInterface
{
    public function check(string $dir): bool
    {
        if (!file_exists($dir)) {
            return $this->create($dir);
        }

        return true;
    }

    function create(string $dir): bool
    {
        return mkdir($dir);
    }

}