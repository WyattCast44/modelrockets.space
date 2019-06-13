<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_article_can_have_a_featured_image()
    {
        $this->assertTrue(true);
    }

    public function test_a_article_needs_a_title()
    {
        $this->assertTrue(true);
    }

    public function test_an_article_needs_a_subtitle()
    {
        $this->assertTrue(true);
    }

    public function test_an_article_needs_a_body()
    {
        $this->assertTrue(true);
    }

    public function test_an_article_can_be_published()
    {
        $this->assertTrue(true);
    }

    public function test_an_article_can_be_unpublished()
    {
        $this->assertTrue(true);
    }
}
