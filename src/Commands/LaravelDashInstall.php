<?php


namespace Yasser\LaravelDashboard\Commands;


use Illuminate\Console\Command;
use Yasser\LaravelDashboard\DashboardServiceProvider;

class LaravelDashInstall extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'LaravelDash:install';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Install the LaravelDash package';

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
     */

    public function handle()
    {

        $this->info('Generate Authentification');

        $this->call('make:auth');

        $this->info('Publishing the LaravelDash config file');

        $this->call('vendor:publish',['--provider' => DashboardServiceProvider::class, '--tag' => 'config']);

        $this->info('Migrating the database tables into your application');

        $this->call('migrate');

    }


}
