<?php

namespace Database\Factories;

use App\Models\Kader;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KaderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kader::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'tempat_lahir' => $this->faker->state,
            'tanggal_lahir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'jenis_kelamin' => $this->faker->randomElement($array = array ('Laki-Laki', 'Perempuan')),
            'nomor_telepon' => $this->faker->e164PhoneNumber,
            'is_verified' => $this->faker->randomElement($array = array (true, false)),
        ];
    }
}
