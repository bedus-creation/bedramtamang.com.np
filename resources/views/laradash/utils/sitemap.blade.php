<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
    xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <url>
        <loc>https://bedramtamang.com.np/</loc>
        <changefreq>daily</changefreq>
        <image:image>
            <image:loc>https://aammui.com/img/bedus-creation-icon.png</image:loc>
            <image:caption>Sahuba Logo</image:caption>
        </image:image>
    </url>
    @foreach($data as $item)
    <url>
        <loc>{{url($item->link())}}</loc>
        <lastmod>{{$item->updated_at->format('Y-m-d')}}T{{$item->updated_at->format('h:i:s')}}+05:45</lastmod>
        @if($item->media)
        <image:image>
            <image:loc>{{$item->cover}}</image:loc>
            <image:caption>{{$item->title}}</image:caption>
        </image:image>
        @endif
    </url>
    @endforeach
</urlset>
