<?php

namespace LaravelServiceSkeleton;

use LaravelServiceSkeleton\Methods\Controllers\DatabaseDirController;
use LaravelServiceSkeleton\Methods\Controllers\HttpDirController;
use LaravelServiceSkeleton\Methods\Dir;

class Controller
{

    protected $root = '/App/Service';
    protected $serviceName;
    protected $dir;
    protected $dirControllers;

    public function __construct(string $serviceName)
    {
        $this->serviceName = $serviceName;
        $this->dir = new Dir();

        $fullPath = $this->root . '/' . $this->serviceName;
        $this->dirControllers = [
            new DatabaseDirController($this->dir, $fullPath),
            new HttpDirController($this->dir, $fullPath)
        ];
    }

    public function check()
    {
        $this->dir->check($this->root);
        $this->dir->check($this->root . '/' . $this->serviceName);
        foreach ($this->dirControllers as $dirController) {
            $dirController->check();
        }
    }
}