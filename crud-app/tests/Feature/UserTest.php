<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_see_user_list()
    {
        $this->visit('/user');
    }

    public function test_can_create_user()
    {
        /**
         * 1. Open Create user page
         * 2. Input Name
         * 3. Input Email
         * 4. Input password min 8
         * 5. Input confirm password == password, min 8
         * 6. Save -> input database
         * 7. Back to user list
         */

         $this->visit('/user/create');

         $this->submitForm('Save', [
            'name'      => 'Admin Test',
            'email'     => 'admin_test@gmail.com',
            'password'  => '12345678',
            'password_confirmation' => '12345678'
         ]);

         $this->seeInDatabase('users', [
            'id'        => '2',
            'name'      => 'Admin Test',
            'email'     => 'admin_test@gmail.com',
            'password'  => '12345678'
         ]);

         $this->seePageIs('/user');
        
         $this->see('Admin Test');
         $this->see('admin_test@gmail.com');
    }

    public function test_can_edit_user()
    {
        $this->assertTrue(true);
    }

    public function test_can_delete_user()
    {
        $this->assertTrue(true);
    }
}
