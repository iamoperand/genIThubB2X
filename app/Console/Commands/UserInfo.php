<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class UserInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command deletes the temporary table and joins it with the permanent table.';

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
         
         $t_data = DB::table('User')->get();

         foreach($t_data as $t_info)

         {
            $token_num = $t_info->token_num;
            $purpose = $t_info->purpose;
            $name = $t_info->name;
            $phone_num = $t_info->phone_num;
            $start_timestamp = $t_info->start_timestamp;
            $end_timestamp = $t_info->end_timestamp;
            $e_name = $t_info->e_name;
            $a_flag = $t_info->a_flag;
            $e_flag = $t_info->e_flag;
         

         DB::table('P_Users')->insert(
    ['token_num' => $token_num, 'purpose' => $purpose, 'name' => $name, 'phone_num' => $phone_num, 'start_timestamp' => $start_timestamp, 'end_timestamp' => $end_timestamp, 'e_name' => $e_name, 'a_flag' => $a_flag, 'e_flag'=>$e_flag]);
     }
    DB::table('User')->truncate();

    }
}
