<?php

namespace App\Console\Commands;

use App\Models\Message;
use App\Models\User;
use Illuminate\Console\Command;


class wall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:wall {name?}';

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
        $userName = $this->argument('name');
        if(!empty($userName)){
            $name = $this->argument('name');
            $user = User::where('name', $name)->first();
            $messages = Message::where('id_author', $user->id());
            $nb_messages = count($messages);
            $this->info('wall have => '.$nb_messages.' create by = '.$name);
        }
        $message = Message::all();
        $nb_messages = count($message);

        $this->info('Nombre de messages => '.$nb_messages);
    }
}
