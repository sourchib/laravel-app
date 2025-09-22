use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function show_article()
    {
        $article = Article::factory()->create([
            'title' => 'Test Judul',
            'slug' => 'test-judul',
            'description' => 'Isi artikel untuk testing',
            'body' => 'Body artikel',
            'content' => 'Isi artikel lengkap untuk testing',
        ]);

        $response = $this->get(route('articles.show', $article->id));

        $response->assertStatus(200);
        $response->assertSee($article->title);
    }
}
