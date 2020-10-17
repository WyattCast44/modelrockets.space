@modal(['name' => 'share'])

    <div {{ $attributes }}>
        <h1 class="mb-2 text-2xl font-semibold uppercase">Share this {{ $title }}</h1>

        <p class="mb-4 text-gray-700">
            We don't have any built in sharing functionality. They all induce a level of 
            user tracking/analytics (👀) that we would like to avoid. But feel free to copy 
            the url to this article and share wherever you wish! 🚀
        </p>

        <div x-data="{ url: '{{ url()->current() }}' }" class="flex items-center">

            <input type="text" class="m-0 text-sm italic bg-blue-100 rounded-r-none form-control form-control-lg" x-model="url" x-ref="url">
            
            <button 
                data-turbolinks="false" 
                class="hidden px-3 py-2 text-white bg-blue-400 rounded-l-none rounded-r btn btn-primary hover:bg-blue-500 md:inline" 
                x-on:click="$refs.url.select();document.execCommand('copy');$event.target.innerText = 'Copied!';">
                Copy
            </button>
            
        </div>
    </div>

@endmodal