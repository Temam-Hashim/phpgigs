@props(['tagCsv'])

@php
    $tags = explode(',', $tagCsv);
@endphp

<ul class='flex items-center'>

    @foreach ($tags as $tag)
        <li class="flex items-center  bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?tag={{ $tag }}"> {{ $tag }}</a>
        </li>
    @endforeach

</ul>
