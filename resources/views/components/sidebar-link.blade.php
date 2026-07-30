@props(['active', 'icon'])

@php
$classes = ($active ?? false)
            ? 'group flex items-center gap-3 px-4 py-3 rounded-2xl bg-white/20 text-white font-black text-xs uppercase tracking-widest transition-all shadow-sm hover:bg-white/30'
            : 'group flex items-center gap-3 px-4 py-3 rounded-2xl text-purple-100 hover:bg-white/10 hover:text-white font-bold text-xs uppercase tracking-widest transition-all';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <i class="{{ $icon }} {{ ($active ?? false) ? 'text-white' : 'text-purple-200 group-hover:text-white' }} w-5 text-center transition-colors"></i>
    @endif
    
    <span class="flex-1">{{ $slot }}</span>
</a>