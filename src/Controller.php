<?php

namespace mo3golom\LaravelServiceSkeleton;

use Exception;
use mo3golom\LaravelServiceSkeleton\Methods\Controllers\DatabaseDirController;
use mo3golom\LaravelServiceSkeleton\Methods\Controllers\HttpDirController;
use mo3golom\LaravelServiceSkeleton\Methods\Controllers\RoutesDirController;
use mo3golom\LaravelServiceSkeleton\Methods\Dir;
use mo3golom\LaravelServiceSkeleton\Methods\File;


class Controller
{

    protected $root;
    protected $serviceName;
    protected $dir;
    protected $dirControllers;
    protected $file;

    protected $servicesProviderTemplate = __DIR__ . '/Templates/_SERVICE_ServicesProvider.php';

    /**
     * Controller constructor.
     * @param string $serviceName
     * @throws Exception
     */
    public function __construct(string $serviceName)
    {
        if (empty($serviceName)) throw new Exception('пустой параметр name');
        $this->serviceName = $serviceName;
        $this->root = config('service-skeleton.services_skeleton_dir');
        $this->dir = new Dir();
        $this->file = new File();

        $fullPath = app_path() . '/' . $this->root . '/' . $this->serviceName;
        $this->dirControllers = [
            new DatabaseDirController($this->dir, $fullPath),
            new HttpDirController($this->dir, $fullPath),
            new RoutesDirController($this->dir, $fullPath)
        ];
    }

    /**
     * @throws Exception
     */
    public function check()
    {
        $root = app_path() . '/' . $this->root;
        $this->dir->check($root);
        $this->dir->check($root . '/' . $this->serviceName);

        $this->file->fileStrReplace(
            $this->servicesProviderTemplate,
            $root . '/' . $this->serviceName . '/' . $this->serviceName . 'ServicesProvider.php',
            ['_SERVICE_', '_ROOT_'],
            [$this->serviceName, $root]
        );

        foreach ($this->dirControllers as $dirController) {
            $dirController->check();
        }
    }
}