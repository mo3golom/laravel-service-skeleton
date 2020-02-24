<?php


namespace LaravelServiceSkeleton\Methods\Controllers;


use LaravelServiceSkeleton\Methods\Controllers\Contracts\DirControllerInterface;
use LaravelServiceSkeleton\Methods\Contracts\DirInterface;

abstract class DirController implements DirControllerInterface
{
    protected $root;
    protected $dir;
    protected $path;
    protected $subPaths;

    public function __construct(DirInterface $dir, string $root)
    {
        $this->dir = $dir;
        $this->root = $root;
    }

    public function check()
    {
        $fullPath = $this->root . '/' . $this->path;
        if ($this->dir->check($fullPath)) {
            foreach ($this->subPaths as $subPath) {
                $fullSubPath = $fullPath . '/' . $subPath;
                $this->dir->check($fullSubPath);
            }
        }
    }
}