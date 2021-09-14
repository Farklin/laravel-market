{{ Request::header('Content-Type : text/xml') }}
<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($products as $product)
        <url>
            <loc>{{ url('product/' . $product->seo->slug) }}</loc>
            <lastmod>{{$product->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>1</priority>
        </url>
    @endforeach
    @foreach ($categories as $category)
    <url>
        <loc>{{ url('category/' . $category->seo->slug) }}</loc>
        <lastmod>{{ $category->updated_at->tz('GMT')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1</priority>
    </url>
    @endforeach
    @foreach ($pages as $page)
    <url>
        <loc>{{ url('page/' . $page->seo->slug) }}</loc>
        <lastmod>{{ $page->updated_at->tz('GMT')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1</priority>
    </url>
    @endforeach
</urlset>