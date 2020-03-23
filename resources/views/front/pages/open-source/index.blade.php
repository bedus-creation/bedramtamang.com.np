@extends('theme.front.app')

@section('title')
Open source | packages | Bedram Tamang
@endsection

@section('content')
<div style="background:url('/img/page-header-bg.png')" class="h-32 flex items-center">
    <div class="container mx-auto md:px-20 px-2">
        <h1 class="text-white text-2xl">Open Source</h1>
    </div>
</div>
<div class="container mx-auto py-2 my-4 md:px-20 px-2">
    <div class="md:flex md:-mx-4">

        <div class="w-full md:w-1/3 md:mx-4">
            <div class="w-full rounded overflow-hidden shadow-lg">
                <div class="h-32 w-full flex bg-center bg-cover items-center"
                    style="background-image:url('/img/image-01.jpg')">
                </div>
                <div class="px-6 py-4">
                    <a href="https://github.com/bedus-creation/ddd" target="_blank">
                        <div class="font-bold text-xl mb-2">DDD Console Tool</div>
                    </a>
                    <p class="text-gray-700 text-base">
                        Laravel Domain Driven Development Console Tool.
                    </p>
                </div>
                <div class="px-6 py-4">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#ddd</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#laravel</span>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/3">
            <div class="w-full rounded overflow-hidden shadow-lg">
                <div class="h-32 w-full flex bg-center bg-cover items-center"
                    style="background-image:url('/img/image-02.jpg')">
                </div>
                <div class="px-6 py-4">
                    <a href="https://github.com/bedus-creation/role-permission" target="_blank">
                        <div class="font-bold text-xl mb-2">Laravel Role Permission package.</div>
                    </a>
                    <p class="text-gray-700 text-base">
                        Laravel Role Permission package for 80% use cases.
                    </p>
                </div>
                <div class="px-6 py-4">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Role</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Permission</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Laravel</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
