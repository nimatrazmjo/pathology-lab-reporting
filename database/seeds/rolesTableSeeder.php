<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/seeds/data/roles.json");
        Log::info("Starting Faculties Population...");
        $data = json_decode($json);
        foreach($data as $obj) {
            $roleObject = new Role();
            $roleObject->id = $obj->id;
            $roleObject->role = $obj->role;
            $roleObject->save();
        }
    }
}
