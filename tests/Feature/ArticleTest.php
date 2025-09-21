<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Article;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function show_article()
    {
        // Arrange: buat dummy article di database testing
        $article = Article::factory()->create([
            'title' => 'Test Judul',
            'content' => 'Isi artikel untuk testing',
        ]);

        // Act: request ke endpoint show article
        $response = $this->get("/articles/{$article->id}");

        // Assert: cek status OK & data muncul
        $response->assertStatus(200);
        $response->assertSee($article->title);
    }
}
