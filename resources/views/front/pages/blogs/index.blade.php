@extends('theme.front.app')

@section('title')
Blogs from Bedram Tamang
@endsection


@section('content')
<div style="background:url('/img/page-header-bg.png')" class="h-32 flex items-center">
    <div class="container mx-auto md:px-20 px-2">
        <h1 class="text-white text-2xl">Blogs</h1>
    </div>
</div>
<div class="container mx-auto py-2 my-4 md:px-20 px-2">
    <div class="md:flex">
        <div class="md:w-3/4 md:pr-2">
            @foreach($posts as $item)
            <div class="w-full lg:flex mb-3">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover bg-center rounded-t-lg lg:rounded-t-none lg:rounded-l-lg text-center overflow-hidden"
                    style="background-image: url('{{$item->cover ?? getImage()}}')" title="Woman holding a mug">
                </div>
                <div
                    class="bg-white w-full rounded-b lg:rounded-b-none lg:rounded-r-lg p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <p class="text-sm text-gray-600  flex items-center">
                            <svg class="fill-current text-grey w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                            </svg>
                            Members only
                        </p>
                        <div class="text-gray-900  font-bold text-xl mb-2">
                            <a href="{{$item->frontUrl()}}">{{$item->title}}</a>
                        </div>
                        <p class="text-gray-700 text-base">
                            {{str_limit(strip_tags($item->body),200)}}
                        </p>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full mr-4" src="{{url('/img/profile.jpg')}}"
                            alt="Avatar of Jonathan Reinink">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">Root User</p>
                            <p class="text-gray-600">{{$item->created_at->format('M d, Y')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="float-right">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
