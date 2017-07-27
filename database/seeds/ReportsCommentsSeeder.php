<?php

use Illuminate\Database\Seeder;
use App\Model\Reports_Comments;

class ReportsCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Reports_Comments::create([
            'comment'=>'111',
            'user_id'=>1,
            'reports_id'=>1
        ]);
        Reports_Comments::create([
            'comment'=>'111',
            'user_id'=>1,
            'reports_id'=>1
        ]);
        Reports_Comments::create([
            'comment'=>'111',
            'user_id'=>2,
            'reports_id'=>2
        ]);

    }
}
