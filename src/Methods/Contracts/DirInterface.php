<?php

namespace mo3golom\LaravelServiceSkeleton\Methods\Contracts;

interface DirInterface
{
    public function check(string $dir);

    function create(string $dir): bool;
}