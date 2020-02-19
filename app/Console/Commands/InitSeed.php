<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initial Seed';

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
        $this->info($this->description);
        $opt = new \App\Models\Option();
        $opt->peringatan_stock = 0;
        $opt->profit_konsumen = 0;
        $opt->save();

        $this->info("DONE");
    }
}
