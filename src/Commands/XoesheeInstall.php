<?php

namespace Arungpisyadi\Xoeshee\Commands;

use Illuminate\Console\Command;

class XoesheeInstall extends Command
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $migrate = false, $debug = false;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xoeshee:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute Xoeshee installation, setup several pre-requisites on the environment.';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Booting up XOESHEE, this is gonna be exciting!');
        $this->newLine();
        $this->line('Publishing required packages.');
        $this->newLine();
        $this->call('vendor:publish', ['--provider' => 'Arungpisyadi\Xoeshee\XoesheeServiceProvider']);
        $this->call('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);
        $this->call('vendor:publish', [
            '--provider' => 'Spatie\MediaLibrary\MediaLibraryServiceProvider',
            '--tag' => 'migrations'
        ]);
        $this->newLine();
        $this->line('Publishing required packages finished. Migrating tables and models...');
        $this->call('migrate');
        $this->newLine();
        $this->info('XOESHEE is installed on your system.');
        return 0;
    }
}
