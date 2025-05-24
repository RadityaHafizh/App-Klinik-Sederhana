<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $medicineNames = [
        'Paracetamol', 'Amoxicillin', 'Ibuprofen', 'Metformin', 'Omeprazole',
        'Aspirin', 'Cetirizine', 'Dexamethasone', 'Azithromycin', 'Loratadine',
        // add more medicine names here...
    ];

    public function definition()
    {
        return [
            'nama_obat' => $this->faker->unique()->randomElement(self::$medicineNames),
            'satuan' => $this->faker->randomElement(['tablet', 'ml', 'kapsul', 'botol']),
        ];
    }

}
