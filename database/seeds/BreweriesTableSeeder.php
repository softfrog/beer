<?php

use Illuminate\Database\Seeder;

class BreweriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('breweries')->delete();
        
        \DB::table('breweries')->insert(array (
            0 => 
            array (
                'brewery_id' => 1,
                'name' => 'Zebonkey Brewery',
                'location' => 'Stellenbosch, Western Cape',
            ),
            1 => 
            array (
                'brewery_id' => 2,
                'name' => 'Frontier Beer Co',
                'location' => 'Pretoria, Gauteng',
            ),
            2 => 
            array (
                'brewery_id' => 3,
                'name' => 'Cluver & Jack Cider Co.',
                'location' => 'Grabouw, Western Cape',
            ),
            3 => 
            array (
                'brewery_id' => 4,
                'name' => 'Inmind Brewing',
                'location' => 'Johannesburg, Gauteng',
            ),
            4 => 
            array (
                'brewery_id' => 5,
                'name' => 'Black Horse Brewery',
                'location' => 'Magaliesburg, Gauteng',
            ),
            5 => 
            array (
                'brewery_id' => 6,
                'name' => 'Little Wolf Brewery',
                'location' => 'Kommetjie, Western Cape',
            ),
            6 => 
            array (
                'brewery_id' => 7,
                'name' => 'Basset Breweries',
                'location' => 'Pennington, KwaZulu-Natal',
            ),
            7 => 
            array (
                'brewery_id' => 8,
                'name' => 'Great Railroad Brewing Co',
                'location' => 'Imbonini, KwaZulu-Natal',
            ),
            8 => 
            array (
                'brewery_id' => 9,
                'name' => 'Stellenbosch Brewing Co',
                'location' => 'Stellenbosch, Western Cape',
            ),
            9 => 
            array (
                'brewery_id' => 10,
                'name' => 'Lakeside Brewing Co.',
                'location' => 'Cape Town, Western Cape',
            ),
            10 => 
            array (
                'brewery_id' => 11,
                'name' => 'Aegir Project Brewery',
                'location' => 'Noordhoek, Western Cape',
            ),
            11 => 
            array (
                'brewery_id' => 12,
                'name' => 'Mountain Brewing Co.',
                'location' => 'Worcester, Western Cape',
            ),
            12 => 
            array (
                'brewery_id' => 13,
                'name' => 'Diesel & Dust Craft Beer',
                'location' => 'Cape Town, Western Cape',
            ),
            13 => 
            array (
                'brewery_id' => 14,
                'name' => 'Elysium Brewing Co.',
                'location' => 'Cape Town, South Africa',
            ),
            14 => 
            array (
                'brewery_id' => 15,
                'name' => 'Boet Beer Brewing Co',
                'location' => 'Robertson, Western Cape',
            ),
            15 => 
            array (
                'brewery_id' => 16,
                'name' => 'Jakkalsvlei Craft Beer',
                'location' => 'Herbertsdale, Western Cape',
            ),
            16 => 
            array (
                'brewery_id' => 17,
                'name' => 'Ukhamba Beerworx',
                'location' => 'Woodstock, Western Cape',
            ),
            17 => 
            array (
                'brewery_id' => 18,
                'name' => 'Brauhaus am Damm',
                'location' => 'Rustenburg, Gauteng',
            ),
            18 => 
            array (
                'brewery_id' => 19,
                'name' => 'Wagon Trail Brewery',
                'location' => 'Stellenbosch, Western Cape',
            ),
            19 => 
            array (
                'brewery_id' => 20,
                'name' => 'Wild Beast Brewing',
                'location' => 'Stellenbosch, Western Cape',
            ),
            20 => 
            array (
                'brewery_id' => 21,
                'name' => 'AWOL Brewhouse',
                'location' => 'Stellenbosch, Western Cape',
            ),
            21 => 
            array (
                'brewery_id' => 22,
                'name' => 'Franschhoek Beer Co.',
                'location' => 'Franschhoek, Western Cape',
            ),
            22 => 
            array (
                'brewery_id' => 23,
                'name' => 'Ceres Brewery',
                'location' => 'Ceres, Western Cape',
            ),
            23 => 
            array (
                'brewery_id' => 24,
                'name' => 'Club House Breweries',
                'location' => 'Richards Bay, KwaZulu-Natal',
            ),
            24 => 
            array (
                'brewery_id' => 25,
                'name' => 'Bootlegger',
                'location' => 'Wilderness, Western Cape',
            ),
            25 => 
            array (
                'brewery_id' => 26,
                'name' => 'Kas Bier',
                'location' => 'Port Elizabeth, Eastern Cape',
            ),
            26 => 
            array (
                'brewery_id' => 27,
                'name' => 'Aces Brew Worx',
                'location' => 'Johannesburg, Gauteng',
            ),
            27 => 
            array (
                'brewery_id' => 28,
                'name' => 'Nieuw Brew',
                'location' => 'Clanwilliam, Western Cape',
            ),
            28 => 
            array (
                'brewery_id' => 29,
                'name' => 'Table Mountain Breweries',
                'location' => 'Cape Town, Western Cape',
            ),
            29 => 
            array (
                'brewery_id' => 30,
                'name' => 'Optimum Craft Brewery',
                'location' => 'Johannesburg, Gauteng',
            ),
            30 => 
            array (
                'brewery_id' => 31,
                'name' => 'Riot Beer',
                'location' => 'Cape Town, Western Cape',
            ),
            31 => 
            array (
                'brewery_id' => 32,
                'name' => 'Hoghouse Brewing Co',
                'location' => 'Stellenbosch, Western Cape',
            ),
            32 => 
            array (
                'brewery_id' => 33,
                'name' => 'Wild Clover Breweries',
                'location' => 'Stellenbosch, Western Cape',
            ),
            33 => 
            array (
                'brewery_id' => 34,
                'name' => 'Sir Thomas Brewing Co',
                'location' => 'Stellenbosch, Western Cape',
            ),
            34 => 
            array (
                'brewery_id' => 35,
                'name' => 'Woodstock Brewery',
                'location' => 'Cape Town, Western Cape',
            ),
            35 => 
            array (
                'brewery_id' => 36,
                'name' => 'Noon Gun Brewery',
                'location' => 'Muizenberg, Western Cape',
            ),
            36 => 
            array (
                'brewery_id' => 37,
                'name' => 'Table 58 Brewing',
                'location' => 'East London, Eastern Cape',
            ),
            37 => 
            array (
                'brewery_id' => 38,
                'name' => 'Makers Brew',
                'location' => 'Barrydale, Western Cape',
            ),
        ));
        
        
    }
}