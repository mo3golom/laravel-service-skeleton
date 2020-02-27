<?php

namespace mo3golom\LaravelServiceSkeleton\Console;


use Illuminate\Console\Command;
use mo3golom\LaravelServiceSkeleton\Controller;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeSkeleton extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'services:skeleton {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make service skeleton';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {
        try {
            $name = $this->argument('name');
            $controller = new Controller($name);
            $controller->check();
            $this->info('service skeleton '.$name.' create complete!');
        } catch (\Exception $e) {
            $this->error($e);
        }
    }


}
