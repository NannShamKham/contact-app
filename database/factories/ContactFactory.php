<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $first = $this->faker->name;
        $last = $this->faker->name;

        return [
            "fname"=>$first,
            "lname"=> $first,
            "fullName"=>$first." ".$last,
            "email"=> $this->faker->email(),
            "phone"=>'09'.rand(11111111,99999999),
            "birthday"=> $this->faker->date,
            "user_id"=>User::inRandomOrder()->first()->id,
        ];
    }
}
