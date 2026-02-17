@props(['highlight'])
<div @class(['highlight'=> $highlight, 'card'])>


    <div>
        {{ $slot }}
    </div>

    <!-- Right actions -->
    <div class="flex gap-15 items-center">

        <a href="{{ $attributes->get('viewvar') }}" class='btngray'>View</a>
        <a href="{{ $attributes->get('editvar') }}" class='btnsmall'>EDIT</a>
        <a href="{{ $attributes->get('visitvar') }} " class='btngreen'>VISIT</a>
        <a href="{{ $attributes->get('meetings') }}" class='btnyellow'>MEETINGS</a>
    </div>
</div>