<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class FleamarcketTest extends TestCase
{
    use RefreshDatabase;

    public function test_example(): void
    {

        //アクセステスト

        //home ログインなしでも表示
        $response = $this->get('/');
        $response->assertStatus(200);

        //home ログインなしでも表示
        $response = $this->get('/login');
        $response->assertStatus(200);
        
        //home ログインなしでも表示
        $response = $this->get('/register');
        $response->assertStatus(200);

        //mypage ログインなし非表示
        $response = $this->get('/mypage');
        $response->assertRedirect('/login');

        //userprofile ログインなし非表示
        $response = $this->get('/mypage/profile');
        $response->assertRedirect('/login');

        //sell ログインなし非表示
        $response = $this->get('/sell');
        $response->assertRedirect('/login');

        //address ログインなし非表示
        $response = $this->get('/admin');
        $response->assertRedirect('/login');

    }
}
