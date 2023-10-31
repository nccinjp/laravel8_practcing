<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class ArticleFactory extends Factory
{
    protected $model = Article::class;  //$model是変数 記得要在上面加上USE　
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()  //method
    {
        return [
            //
            "title" => $this->faker->realtext(20),  //
            "body" =>  $this->faker->realtext(200), //"sample's content",
            "created_at" => $this->faker->dateTimeBetween($startDate = '-1 week', $endDate = 'now'),
        ];
    }
}
