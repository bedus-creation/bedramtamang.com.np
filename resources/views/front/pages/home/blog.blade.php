<div class="w-full lg:flex mb-3">
    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover bg-center rounded-t-lg lg:rounded-t-none lg:rounded-l-lg text-center overflow-hidden"
         style="background-image: url('{{$item->cover('sm') ?? getImage()}}')"
         title="Image of {{$item->title}}">
    </div>
    <div
            class="bg-white w-full rounded-b-lg lg:rounded-b-none lg:rounded-r-lg p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <div class="text-gray-900  font-bold text-xl mb-2">
                <a href="{{$item->link()}}">{{$item->title}}</a>
            </div>
            <p class="text-gray-700 text-base">
                {{\Illuminate\Support\Str::limit(strip_tags(markdownToHtml($item->body)),200)}}
            </p>
        </div>
        <div class="flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="{{url('/img/profile.jpg')}}"
                 alt="Avatar of Bedram Tamang">
            <div class="text-sm">
                <p class="text-gray-900 leading-none">
                    Bedram Tamang
                </p>
                <p class="text-gray-600 text-sm">{{$item->created_at->format('M d, Y')}}</p>
            </div>
        </div>
    </div>
</div>
