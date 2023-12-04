@extends('theme.front.app')

@section('content')
    <div class="container mx-auto py-2 my-4 md:px-20 px-6">
        <div class="w-full lg:flex justify-around mb-4 px-0 lg:px-40">
            <div class="text-base text-gray-700 w-full lg:w-2/3 mb-4 lg:mb-0">
                I am <a class="font-bold underline" target="_blank" href="https://twitter.com/tmg_bedus">Bedram Tamang</a>, a fullstack Software Engineer,
                specialize in Laravel, Vuejs, Tailwind, SQL, PHP, Python, with more than six years of professional experience.
                <br>
                <br>
                Presently, I am employed as a remote developer for
                <a class="font-bold underline" target="_blank" href="https://corp.jobins.jp/">JoBins Co., Ltd.</a>,
                a company based in Japan. I hold a Master's Degree in
                <a class="font-bold underline" target="_blank" href="https://cdcsit.edu.np/">Computer Science and Information Technology</a>, as well as
                a Bachelor's Degree in <a class="font-bold underline" target="_blank" href="https://www.ioepc.edu.np/">
                    Electronics and Communication Engineering.
                </a>
            </div>
            <div class="w-full lg:w-1/3">
                <img class="rounded w-full" src="{{url('/assets/img/bedram-tamang.png')}}" alt="Image of Bedram Tamang at Waterfront, Vancouver, BC, Canada">
            </div>
        </div>
        <h2 class="font-bold text-2xl mb-2">
            From the Blogs
        </h2>
        <div class="md:flex">
            <div class="w-full md:w-3/4 mx-auto md:pr-2">
                @foreach($posts as $item)
                    @include('front.pages.home.blog', ['blog'=>$item])
                @endforeach
            </div>
        </div>
    </div>
@endsection
