<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            if($index == 1) {
                $data = is_array(config('reviewMsg')) ? config('reviewMsg') : [config('reviewMsg')];
                $product = \App\Core\Models\Product::find(1);
                $user = \App\Core\Models\User::find(2);
                $data['user_id'] = $user->id;
                $data['product_id'] = $product->id;
                $data['hidden'] = false;
                $productReview = $user->productReview()->create($data);

                $data["subject"] = $product->title;

                $thread = $productReview->comments()->create([
                    'subject' => $data["subject"]
                ]);

                $roleAdmin = \App\Core\Models\Role::find(1);
                $adminArr = $roleAdmin->getRoleUsers("Admin");

                $thread->addParticipants($adminArr);

            }
            $userId = $faker->numberBetween(2, 22);
            $message = \App\Core\Components\Messenger\Models\Message::create([
                'thread_id' => $thread->id,
                'user_id' => $userId,
                'body' => $faker->paragraphs(5, true),
            ]);

            $participant = \App\Core\Components\Messenger\Models\Participant::create([
                'thread_id' => $thread->id,
                'user_id' => $userId,
                'last_read' => new \Carbon\Carbon()
            ]);
        }

        foreach (range(1, 10) as $index) {
            if($index == 1) {
                $data = [];
                $data['review'] =  $faker->paragraphs(5, true);
                $product = \App\Core\Models\Product::find(1);
                $user = \App\Core\Models\User::find(2);
                $data['user_id'] = $user->id;
                $data['product_id'] = $product->id;
                $data['hidden'] = false;
                $productReview = $user->productReview()->create($data);
                $data["subject"] = $product->title;
                $thread =  $thread =  $productReview->comments()->create([
                    'subject' => $data["subject"]
                ]);


                $roleAdmin = \App\Core\Models\Role::find(1);
                $adminArr = $roleAdmin->getRoleUsers("Admin");

                $thread->addParticipants($adminArr);

            }
            $userId = $faker->numberBetween(2, 22);
            $message = \App\Core\Components\Messenger\Models\Message::create([
                'thread_id' => $thread->id,
                'user_id' => $userId,
                'body' => $faker->paragraphs(5, true),
            ]);

            $participant = \App\Core\Components\Messenger\Models\Participant::create([
                'thread_id' => $thread->id,
                'user_id' => $userId,
                'last_read' => new \Carbon\Carbon()
            ]);
        }
    }
}
