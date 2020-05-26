<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class UserAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lista los usuarios existentes en consola ';

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
        $users = User::all();
        foreach ($users as $user) {
            print($user->email);
            print("\n");
        }
        $this->info('Finalizo el listado de usuarios user:all');
    }
}
