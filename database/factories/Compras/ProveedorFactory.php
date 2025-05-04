<?php

namespace Database\Factories\Compras;

use App\Models\Ciudad;
use App\Models\Compras\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Proveedor::class;

    public function definition(): array
    {
        return [
            'prov_razonsocial' => $this->faker->company(),
            'prov_ruc' => $this->faker->unique()->numerify('########-#'),
            'prov_direccion' => $this->faker->address(),
            'prov_telefono' => $this->faker->phoneNumber(),
            'prov_correo' => $this->faker->unique()->companyEmail(),
            'ciudad_id' => Ciudad::inRandomOrder()->first()->id,
        ];
    }
}
