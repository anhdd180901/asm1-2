<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\RoomService;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => Room::all()->random()->id,
            'service_id' =>Service::all()->random()->id,
            'additional_price' => rand(100000, 10000000),
        ];
    }
}
