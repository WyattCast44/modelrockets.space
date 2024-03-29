<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_accessible()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_forum_page_is_accessible()
    {
        $response = $this->get('/forum');

        $response->assertOk();
    }

    public function test_articles_page_is_accessible()
    {
        $response = $this->get('/articles');

        $response->assertOk();
    }

    public function test_members_page_is_accessible()
    {
        $response = $this->get('/members');

        $response->assertOk();
    }

    public function test_roadmap_page_is_accessible()
    {
        $response = $this->get('/roadmap');

        $response->assertOk();
    }

    public function test_terms_is_accessible()
    {
        $response = $this->get('/pages/terms');

        $response->assertOk();
    }

    public function test_privacy_is_accessible()
    {
        $response = $this->get('/pages/privacy');

        $response->assertOk();
    }

    public function test_login_is_accessible()
    {
        $response = $this->get('/login');

        $response->assertOk();
    }

    public function test_register_is_accessible()
    {
        $response = $this->get('/register');

        $response->assertOk();
    }
}
