<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $size = new Size();
        $size->size = 'Extra Small';
        $size->save();

        $size = new Size();
        $size->size = 'Small';
        $size->save();

        $size = new Size();
        $size->size = 'Medium';
        $size->save();

        $size = new Size();
        $size->size = 'Large';
        $size->save();

        $size = new Size();
        $size->size = 'Extra Large';
        $size->save();

        $size = new Size();
        $size->size = '2x Extra Large';
        $size->save();

        $size = new Size();
        $size->size = '3x Extra Large';
        $size->save();
    }
}
