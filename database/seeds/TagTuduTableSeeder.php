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
            'Attend yoga class on sunday' => ['Entertainment', 'Health', 'Misc']
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
