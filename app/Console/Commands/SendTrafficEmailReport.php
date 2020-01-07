<?php

namespace App\Console\Commands;

use App\Mail\SendReport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendTrafficEmailReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendreport:name';

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
        $userCount = DB::table('users')->whereRaw('Date(created_at) = CURDATE()')->count();
        Mail::to('alifdelgado@programmer.net')->send(new SendReport($userCount));
    }
}
