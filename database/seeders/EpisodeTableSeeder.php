<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EpisodeTableSeeder extends Seeder
{
  protected $model= Course::class;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table:'episodes')->insert([
            'title'=>Str::random(length:10),
            'description'=>Str::random(length:20),
            'video_url'=>Str::random(length:20),
            'course_id'=>Course::all()
        ]);
    }
}
