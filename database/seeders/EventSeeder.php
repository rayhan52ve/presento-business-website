<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = [
            'title'=>'helfire',
            'description'=>'helfirehelfirehelfirehelfire',
            'user_id'=>1
        ];
        Event::create($event);
    }
}
