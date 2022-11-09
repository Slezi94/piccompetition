<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Competition;

class AddCompetition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:add-event {--title=} {--description=} {--start=} {--end=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $competition= new Competition;
        $competition->competition_title = $this->option('title');
        $competition->competition_description = $this->option('description');
        $competition->competition_start = $this->option('start');
        $competition->competition_end = $this->option('end');
        $competition->statusChange();
        $competition->save();
        $this->info('Success');
    }
}
