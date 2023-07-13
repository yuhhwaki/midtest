<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class contactFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     * @return array
     */

    protected $model = Contact::class;

    public function definition()
    {
        return [
            //
            'fullname' => $this->faker->name(),
            'gender' => rand(1, 2),
            'email' => $this->faker->email(),
            'postcode' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'building_name' => $this->faker->text(),
            'opinion' => $this->faker->realText(20),
        ];
    }
}
