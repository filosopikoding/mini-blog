<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Post::class, function (Faker $faker) {
	$image = "Post_Image_" .rand(1, 5). ".jpg";

  return [
  	'user_id' => rand(1, 5),
    'title' => $faker->sentence(rand(8, 12)),
		'slug' => $faker->slug(),
		'content' => $faker->paragraphs(rand(10, 14), true),
		'image' => $image
  ];
});
