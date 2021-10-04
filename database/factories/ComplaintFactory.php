<?php

namespace Database\Factories;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Complaint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'message' => $this->faker->paragraph,
            'reviewed' => $this->faker->boolean,
        ];
    }

    public function unread()
    {
        return $this->state(function () {
            return [
                'reviewed' => false,
            ];
        });
    }

    public function read()
    {
        return $this->state(function () {
            return [
                'reviewed' => true,
            ];
        });
    }
}
