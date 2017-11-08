<?php

use Illuminate\Database\Seeder;

class StylesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('styles')->delete();
        
        \DB::table('styles')->insert(array (
            0 => 
            array (
                'style_id' => 1,
                'name' => 'Amber ale',
            ),
            1 => 
            array (
                'style_id' => 2,
                'name' => 'Berliner Weisse',
            ),
            2 => 
            array (
                'style_id' => 3,
                'name' => 'Bitter',
            ),
            3 => 
            array (
                'style_id' => 4,
                'name' => 'Blonde Ale',
            ),
            4 => 
            array (
                'style_id' => 5,
                'name' => 'Bock',
            ),
            5 => 
            array (
                'style_id' => 6,
                'name' => 'Brown ale',
            ),
            6 => 
            array (
                'style_id' => 8,
                'name' => 'India pale ale',
            ),
            7 => 
            array (
                'style_id' => 9,
                'name' => 'Light ale',
            ),
            8 => 
            array (
                'style_id' => 10,
                'name' => 'Maibock',
            ),
            9 => 
            array (
                'style_id' => 11,
                'name' => 'Pilsener',
            ),
            10 => 
            array (
                'style_id' => 12,
                'name' => 'Porter',
            ),
            11 => 
            array (
                'style_id' => 13,
                'name' => 'Stout',
            ),
            12 => 
            array (
                'style_id' => 7,
                'name' => 'Summer ale',
            ),
            13 => 
            array (
                'style_id' => 14,
                'name' => 'Weissbier',
            ),
        ));
        
        
    }
}