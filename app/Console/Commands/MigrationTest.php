<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrationTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test all migrations from the scratch';

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
        try {
            $this->info('Running migrate');
            $this->call('migrate');
            $this->info('Running rollback');
            $this->call('migrate:rollback');
            $this->info('Running refresh');
            $this->call('migrate:fresh');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            exit(1);
        }
        exit(0);
    }
}
