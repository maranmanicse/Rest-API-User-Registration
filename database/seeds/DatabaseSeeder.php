<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $file = public_path('json/countries.json');
        
        $countryObj = json_decode(file_get_contents($file), true);
        //Hash::make($data['password'])
        $file2 = public_path('json/IndianStates.json');
        
        $stateObj = json_decode(file_get_contents($file2), true);

        foreach ($countryObj as  $obj) {
         
                $id = DB::table('countries')->insertGetId([
                  
                    'sortname' => $obj['code'],
                    'name' => $obj['name']
                ]);
                if($obj['code'] == "IN"){
                    
                foreach ($stateObj as  $key => $value) {
                            DB::table('states')->insertGetId([
                        
                                'country_id' => $id,
                                'name' => $value
                            ]);
                    }
                }
        }


        //Hash::make($data['password'])
        // foreach ($countryObj as  $obj) {
         
        //         DB::table('states')->insert([
                  
        //             'sortname' => $obj['code'],
        //             'name' => $obj['name']
        //         ]);
        // }
    }
}
