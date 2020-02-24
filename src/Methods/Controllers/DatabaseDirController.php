<?php


namespace LaravelServiceSkeleton\Methods\Controllers;

class DatabaseDirController extends DirController
{
    protected $path = 'Database';
    protected $subPaths = [
        'Migrations',
        'Model',
        'Repository'
    ];
}