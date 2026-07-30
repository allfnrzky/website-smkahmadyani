@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#8B5CF6] focus:ring-[#8B5CF6] rounded-md shadow-sm px-4 py-3']) }}>
