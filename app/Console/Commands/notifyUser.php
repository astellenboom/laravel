<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Auth;

class notifyUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifies user when email has changed';

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
        $user =  User::where('id', '=', 1)->get() ;
        $updated = $user[0]->updated_at;
        echo $updated;
         // return response()->json(['updated'=> $updated]);
        
        // return view('showcontact')->with('updated', $updated);



    }
}
