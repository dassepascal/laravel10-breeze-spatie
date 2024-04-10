@props([
    'href' => '#',
    'title',
    'block' => false,
    'active' => false
])
<a
    href="{{ $href }}"
    class="@if($active) bg-red-800 text-white @else  hover:bg-red-800 @endif p-2  @if($block) block @endif rounded-md"
>
    {{ $title }}
</a>
