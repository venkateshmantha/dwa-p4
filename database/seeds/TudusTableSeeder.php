<?php

use Illuminate\Database\Seeder;
use App\Tudu;

class TudusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tudus = [
            ['Read a book by tomorrow', 'Medium', false],
            ['Grocery shopping', 'High', false],
            ['Watch a lecture video before midnight', 'High', false],
            ['Go for a run in the morning', 'Low', false],
            ['Attend yoga class on sunday', 'Low', true],
            ['Go for a hike next weekend', 'Medium', false],
            ['Read about investment banking', 'Medium', true]
        ];

        $count = count($tudus);

        foreach ($tudus as $key => $tuduData) {
            $tudu = new Tudu();

            $tudu->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $tudu->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $tudu->description = $tuduData[0];
            $tudu->priority = $tuduData[1];
            $tudu->isdone = $tuduData[2];

            $tudu->save();
            $count--;
        }
    }
}
