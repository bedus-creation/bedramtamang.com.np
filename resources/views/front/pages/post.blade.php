@extends('theme.front.app')

@section('content')
<section class="py-5 my-4 ">
    <div class="container">
        <div class="mx-auto w-3/4">
            <a href="{{optional($post->media)->link('big') ?? getImage()}}">
                <img src="{{optional($post->media)->link('big') ?? getImage()}}" class="img-fluid w-full">
            </a>
            <div class="bg-white p-6">
                <div class="flex items-center">
                    <svg aria-hidden="true" data-prefix="far" data-icon="clock" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="fill-current h-4 w-4  tw-font-16 text-dark">
                        <path fill="currentColor"
                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z">
                        </path>
                    </svg>
                    <span class="pl-2">
                        December 10, 2018
                    </span>
                    <span class="pl-4"></span>
                    <svg aria-hidden="true" data-prefix="fas" data-icon="user" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        class="fill-current h-4 w-4  tw-font-16 text-dark">
                        <path fill="currentColor"
                            d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z">
                        </path>
                    </svg> <span class="pl-2">
                        Root User
                    </span>
                </div>
                <hr>
                {!! $post->body !!}
                <hr>
                <div id="disqus_thread"></div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    var disqus_config = function () {
        this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier =
            PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    (function () {
        var d = document,
            s = d.createElement('script');
        s.src = 'https://bedramtamang-com-np.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();

</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
        Disqus.</a></noscript>
@endsection
