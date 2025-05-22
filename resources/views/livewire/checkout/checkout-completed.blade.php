<div class="container mx-auto p-4">
    <h2 class="text-3xl font-extrabold text-gray-900 mb-6 px-4">Order complete</h2>

    <div class="text-center py-10 bg-white">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="mx-auto h-16 w-16"
            
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
            />
        </svg>


        <h3 class="mt-2 text-lg font-medium text-gray-900">The order has been successfully placed!</h3>
        <p class="mt-1 text-sm text-gray-500">Thank you for your order. We will process it as quickly as possible.</p>
        <div class="mt-6">
            <a href="{{ route('home') }}"
                class="px-4 py-2 bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">Continue shopping</a>
        </div>
    </div>
</div>