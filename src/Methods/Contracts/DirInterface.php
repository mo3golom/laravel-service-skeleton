<?php

namespace LaravelServiceSkeleton\Methods\Contracts;

interface DirInterface
{
    public function check(string $dir): bool ;

    function create(string $dir): bool ;
}