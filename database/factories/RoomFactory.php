<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_no' => $this->faker->name(),
            'floor' => rand(2,5),
            'image' => $this->faker->image('public/upload/rooms',640,480, null, false),
            'detail' => $this->faker->sentence(50),
            'price' => rand(0, 100000),
        ];
    }
}
