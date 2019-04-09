<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class blogTableSeeder extends Seeder
{
    private function datealeatoire(){
        return Carbon::createFromDate('2019', rand(1,12), rand(1,28));
    }

    public function run()
    {
       // DB::table('posts')->delete();
        $faker = Faker\Factory::create();

        for($i=0; $i<20; $i++){
            $date = $this->datealeatoire();
            DB::table('posts')->insert([
                'titre'=>$faker->text(50),
                'article'=>$faker->text(),
                'created_at'=>$date,
                'updated_at'=>$date

            ]);
        }
    }
}
