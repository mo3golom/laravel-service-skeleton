<?php


namespace mo3golom\LaravelServiceSkeleton\Methods\Controllers;

class DatabaseDirController extends DirController
{
    protected $path = 'Database';
    protected $subPaths = [
        'Migrations',
        'Models',
        'Repository',
        'Seeds'
    ];
}