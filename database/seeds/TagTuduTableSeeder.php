<?php

use Illuminate\Database\Seeder;
use App\Tudu;
use App\Tag;

class TagTuduTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $tudus = [
            'Read a book by tomorrow' => ['Productivity', 'Misc'],
            'Grocery shopping' => ['Misc', 'Health'],
            'Watch a lecture video before midnight' => ['Productivity', 'Work'],
            'Go for a run in the morning' => ['Health', 'Productivity'],
            'Attend yoga class on sunday' => ['Entertainment', 'Health', 'Misc'],
            'Go for a hike next weekend' => ['Entertainment', 'Misc', 'Health'],
            'Read about investment banking' => ['Work', 'Productivity']
        ];

        foreach ($tudus as $desc => $tags) {
            $tudu = Tudu::where('description', 'like', $desc)->first();

            foreach ($tags as $tagName) {
                $tag = Tag::where('name', 'like', $tagName)->first();

                $tudu->tags()->save($tag);
            }
        }
    }
}
