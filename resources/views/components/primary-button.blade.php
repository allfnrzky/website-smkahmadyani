<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#8B5CF6] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#7C3AED] focus:bg-[#7C3AED] active:bg-[#6D28D9] focus:outline-none focus:ring-2 focus:ring-[#8B5CF6] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
