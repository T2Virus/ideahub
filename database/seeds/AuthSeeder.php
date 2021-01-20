<?php

use Illuminate\Database\Seeder;

use App\{Investor, User, Idea};

use Faker\Factory as Faker;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $investor = new Investor;
        $investor->username = 'investor';
        $investor->email = 'investor@investor.com';
        $investor->password = Hash::make('12345678');
        $investor->save();

        $user = new User;
        $user->username = 'user';
        $user->email = 'user@user.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user2 = new User;
        $user2->username = 'user2';
        $user2->email = 'user2@user.com';
        $user2->password = Hash::make('12345678');
        $user2->save();

        $categories = [
            'Engineering',
            'Health',
            'Medicine',
            'Environment',
            'Buisness',
            'Technology',
            'Teachhing'
        ];

        $idea_types = [
            'Buisness',
            'Non-profit'
        ];

        $durations =[
            '01 month',
            '02 months',
            '03 months',
            '04 months',
            '05 months',
            '06 months',
            '07 months',
            '08 months',
            '09 months',
            '10 months',
            '11 months',
            '12 months',
            '12+ months'
        ];
        
        //fake ideas
        $faker = Faker::create();
        for($i=1; $i<=20; $i++){
            $idea = new Idea([
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'idea' => $faker->paragraph($nbSentences = 50, $variableNbSentences = true),
                'budget' => $faker->numberBetween($min = 10000, $max = 90000),
                'category' => $faker->randomElement($categories),
                'idea_type' => $faker->randomElement($idea_types),
                'duration' => $faker->randomElement($durations),
                'image' =>$faker->imageUrl($width = 640, $height = 480)
            ]);
            if($i%3==0){
                $idea->investor_id = $investor->id;
                $idea->user_id= $user->id;
            }else{
                $idea->user_id= $user2->id;
            }

            $idea->save();
        }

    }
}
