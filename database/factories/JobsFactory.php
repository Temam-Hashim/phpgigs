<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tags = ['Web', 'Fullstack', 'frontend', 'backend', 'larvel', 'PHP','design','wordpress'];
        // Get random keys from the array
        $random_keys = array_rand($tags, 3);

        // Create a new array to store the randomly selected tags
        $random_tags = [];

        // Loop through the random keys and get the corresponding tags
        foreach ($random_keys as $key) {
            $random_tags[] = $tags[$key];
        }

        return [
            'title'=>$this->faker->sentence(),
            'tags'=>implode(',',$random_tags),
            'company'=>$this->faker->company(),
            'email'=>$this->faker->companyEmail(),
            // 'picture'=>self::returnImg(),
            'website'=>$this->faker->url(),
            'location'=>$this->faker->city(),
            'description'=>$this->faker->paragraph(8),
        ];
    }

    // custom function
    // public static function returnImg(){
    //     $images = ['img1.jpg','img2.jpg','img3.jpg','img4.jpg','img5.jpg','img6.jpg','img7.jpg','img8.jpg','img9.jpg','img10.jpg'];
    //     $key = array_rand($images, 1);
    //     return $images[$key];
    //   }
}