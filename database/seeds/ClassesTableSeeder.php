<?php

use Illuminate\Database\Seeder;
use App\Classes;

class ClassesTableSeeder extends Seeder {

    public function run()
    {
        Classes::create([
            'gid' => '0',
            'name' => '默认班级',
        ]);
    }
}
?>
