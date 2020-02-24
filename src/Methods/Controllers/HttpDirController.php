<?php


namespace LaravelServiceSkeleton\Methods\Controllers;

class HttpDirController extends DirController
{
    protected $path = 'Http';
    protected $subPaths = [
        'Controller',
        'Middleware',
        'Requests'
    ];
}