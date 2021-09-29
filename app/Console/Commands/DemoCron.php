<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Log;
use Mail;
use App\Mail\SchedulerMail;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sending email';

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
        $users=DB::table('users')->get();

        $details = [
            'title' => 'the scheduler mail',
        ];
        foreach($users as $user)
        {
            Mail::to($user->email)->send(new SchedulerMail($details));
        }
       
        
  }
     
    
}


