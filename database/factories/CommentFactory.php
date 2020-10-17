<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
    	'post_id' => rand(1, 10),
    	'name' => $faker->name,
			'email' => $faker->email,
			'website' => $faker->domainName,
      'comment' => $faker->text(rand(50, 100)),
      'created_at' => new DateTime()
    ];
});
