<?php

use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Test::count() == 0 ) $this->call('TestSeeder');
        if(Role::count() == 0 ) $this->call('RoleSeeder');
    }
}

/**
 * Class TestSeeder
 */
class TestSeeder extends Seeder
{
    public function run()
    {
        // TODO: Implement run() method.
        $json = File::get("database/seeds/data/test.json");
        Log::info("Starting Faculties Population...");
        $data = json_decode($json);
        foreach($data as $obj) {
            $test = new Test();
            $test->id = $obj->id;
            $test->test = $obj->test;
            $test->save();
        }
    }
}

/**
 * Class RoleSeeder
 */
class RoleSeeder extends Seeder
{
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

