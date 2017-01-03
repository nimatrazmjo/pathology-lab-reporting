<?php

use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\Role;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ( Test::count() == 0 ) $this->call('TestSeeder');
        if ( Role::count() == 0 ) $this->call('RoleSeeder');
        if ( User::count() == 0 ) $this->call('UserSeeder');
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

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    public function run()
    {
        // TODO: Implement run() method.
        $json = File::get("database/seeds/data/users.json");
        $data = json_decode($json);
        foreach($data as $obj) {
            $userObject = new User();
            $userObject->id = $obj->id;
            $userObject->name = $obj->name;
            $userObject->email = $obj->email;
            $userObject->password = bcrypt($obj->password);
            $userObject->role_id = $obj->role_id;
            $userObject->save();
        }
    }
}

