<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-violet-900 text-white rounded-md shadow-lg hover:bg-violet-800 focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
