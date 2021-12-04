<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id'=>function(){
                return User::all()->random();
            },
            'constituency'=>$this->faker->address(),
            'ward'=>$this->faker->name(),
            'village'=>$this->faker->name(),
            'gender'=>false,
            'dob'=>'23/03/1997',
            'institution_id'=>function(){
                return Institution::all()->random();
            },
            'yearOfStudy'=>$this->faker->numberBetween(1,8),
            'admission'=>'ct201/0014/16',
            'academicLevel'=>$this->faker->numberBetween(1,4),
            'billed'=>$this->faker->numberBetween(10000,900000),
            'paid'=>$this->faker->numberBetween(1000,60000),
            'score'=>$this->faker->numberBetween(0,10),
            'parentals'=>'orphan',
            'ability'=>$this->faker->numberBetween(1,3),
            'gross_income'=>$this->faker->numberBetween(10000,900000),
            
        ];
    }
}
