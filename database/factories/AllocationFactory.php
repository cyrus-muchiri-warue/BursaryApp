<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AllocationFactory extends Factory
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
            
            'status'=>$this->faker->numberBetween(0,1),
            'application_id'=>function(){
                return Application::all()->random();
            },
            'amountAwarded'=>$this->faker->numberBetween(1000,10000),
        
            'chequeNumber'=>$this->faker->swiftBicNumber(),
           
        ];
    }
}
