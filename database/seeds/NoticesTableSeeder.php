<?php

use Illuminate\Database\Seeder;
use App\Notices;

class NoticesTableSeeder extends Seeder {

    public function run()
    {
        Notices::create([
            'content' => 'content',
            'class' => '1',
        ]);

        for($i=1; $i < 10; $i++) {
            Notices::create([
                'title' => 'title'.$i,
                'content' => 'notice'.$i,
                'summary' => 'summary'.$i,
                'type' => 1,
                'class' => 1,
            ]);
        }
    }
}
?>
