<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->buildingNumber(),
            'nama' => $this->faker->name(),
            'jenis_kelamin' => 'L',
            'agama' => 'islam',
            'no_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'id_kelas' => 1
        ];
    }
}
