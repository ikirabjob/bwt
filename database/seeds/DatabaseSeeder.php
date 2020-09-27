<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\Country::truncate();
        App\Company::truncate();
        App\User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $country = factory(App\Country::class)->create();

        factory(App\Company::class, 10)
            ->create([ 'county_id' => $country->id ])
            ->each(function ($company){
                $user = factory(App\User::class)->create();
                $user->companies()->attach($company->id, [
                    'start_date' => \Carbon\Carbon::now()->addDays(rand(-100, -500))->addMinutes(rand(0,
                        60 * 23))->addSeconds(rand(0, 60)),
                    'end_date' => \Carbon\Carbon::now()->addDays(rand(-100, -500))->addMinutes(rand(0,
                        60 * 23))->addSeconds(rand(0, 60))
                ]);
            });
    }
}
