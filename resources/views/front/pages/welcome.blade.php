@extends('theme.front.app')

@section('content')
<div class="container mx-auto py-2 my-4 md:px-20 px-2">
    <div class="md:flex">
        <div class="md:w-3/4 md:pr-2">
            @foreach($posts as $item)
            <div class="w-full lg:flex mb-3">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover bg-center rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                    style="background-image: url('{{optional($item->media)->link() ?? getImage()}}')"
                    title="Woman holding a mug">
                </div>
                <div
                    class="bg-white w-full rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
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
        </div>
        <div class="md:w-1/4 bg-white pr-2">
            <div class="px-6 py-4 py-1">
                <div class="flex justify-center ">
                    <img src="/img/profile.jpg" class="rounded-full h-24 w-24" />
                </div>
                <div class="text-center">
                    <h4>Bedram Tamang</h4>

                    <div class="text-justify text-gray-700 leading-normal my-6">
                        Hello, I am <a href="https://twitter.com/tmg_bedus" target="_blank">@Bedram Tamang</a>, I am
                        a
                        Software
                        Architect, Developer, Freelancer with more than 4 years of experience in the web development
                        field,
                        passionate for cutting edge technology. My core objective is to understand the business need
                        and
                        design
                        high performance scalable web application using best fit technology stack.
                        TDD, SOLID, DRY, Design Patterns are some recurring terms in my workplace.
                        My major expertise are Listed below.

                        PHP (Plain PHP, Laravel )
                        API (Rest + GraphQL )
                        Design (Html, Css, bootstrap, tailwind, bulma )
                        JS (Vue, Jquery, React)
                        Database (Mysql, MongoDB, Redis, Elastic Search)
                        Optimization (Query Optimization, Caching,)
                        Server (server setup, Website installation, Load balancing, firewall, server security, AWS,
                        Iptable)
                        Data (Python, Pandas, Sqlite,)
                        Testing (UnitTest with phpunit, Behat, Selenium Test)

                        Below are the services area that I offer:

                        -New website installation, server maintenance, firewall, securities
                        -PSD to Responsive HTML, HTML5, CSS , CSS3 ( Bootstrap Foundation), Vue Js/ React Js
                        -SIte performance upgrade, Refactoring of current sites, Database migration from old
                        database to new database, Rewrite of old website into new website

                        Some of my projects on web are

                        jobsnepal.com - Job Portal with daily 10k visitors

                        laradash - Beautiful laravel admin panel

                        sahuba.com - Ecommerce for everyOne

                        movie.aammui.com - Movie streaming website

                        manamohanmemorialcollege.com

                        publicitynepal.com

                        aammui.com

                        sajiload.com

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
