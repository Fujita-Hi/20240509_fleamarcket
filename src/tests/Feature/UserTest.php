<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_access(): void
    {
        //home ログインなしでも表示
        $response = $this->get('/');
        $response->assertStatus(200);

        //item ログインなしでも表示
        $response = $this->get('/item');
        $response->assertStatus(200);

        //comment ログインなしでも表示
        $response = $this->get('/comment');
        $response->assertStatus(200);

        //purchase ログインなし非表示
        $response = $this->get('/purchase');
        $response->assertStatus(200);

        //mypage ログインなし非表示
        $response = $this->get('/mypage');
        $response->assertStatus(200);

        //userprofile ログインなし非表示
        $response = $this->get('/userprofile');
        $response->assertStatus(200);

        //sell ログインなし非表示
        $response = $this->get('/sell');
        $response->assertStatus(200);

        //address ログインなし非表示
        $response = $this->get('/address');
        $response->assertStatus(200);

    }
}
