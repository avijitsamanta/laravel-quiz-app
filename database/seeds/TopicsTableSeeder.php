<?php

use App\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $topic = new Topic();
        $topic->user_id = 1;
        $topic->title = 'Lietuvos Simtmetis';
        $topic->quiz_time = 15;
        $topic->save();
    }
}
