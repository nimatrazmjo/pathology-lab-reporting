<?php

/**
 * User Test Controller
 *
 * author: Nimatullah Razmjo
 */

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{

    /**
     * Test for operator User
     */
    public function testOperatorUser()
    {
        $user = \App\User::find(1);

        $this->be($user); // you are now authenticated

        $this->call("GET",'user/1');

        $this->assertResponseOk();
    }

    /**
     * Test to update the current user if the user is operator
     *
     */
    public function updateOperatorUser()
    {
        $user = \App\User::find(1);
        $this->be($user); // you are now authenticated
        $this->call("PUT", "/user/1", [
            '_method'=>"PUT",
            'user_name'=>'operator',
            'pass_code'=>'',
            'passcode_status'=>'1',
            'age'=>'27',
            'status'=>'Male',
            'address'=>'Kabul, Afghanistan',
        ]);
        $this->assertRedirectedTo(base_url()."/user/1");
    }
    /**
     * Test user table records
     */
    public function testOperatorUserEmail()
    {
        $this->seeInDatabase('users', ['email' => 'operator@gmail.com']);
    }
}
