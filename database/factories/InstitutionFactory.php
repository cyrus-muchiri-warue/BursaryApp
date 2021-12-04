<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class InstitutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name'=>$this->faker->name,
        'user_id'=>function()
        {
            return User::all()->random();
        }

          
        ];
    }
}
