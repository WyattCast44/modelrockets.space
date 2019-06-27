@modal(['name' => 'share'])

    <h1 class="font-semibold uppercase text-2xl mb-2">Share Profile</h1>

    <p class="text-gray-700 mb-4">
        We don't have any built in sharing functionality. They all induce a level of 
        user tracking/analytics (👀) that we would like to avoid. But feel free to copy 
        the url to this member profile and share wherever you wish! 🚀
    </p>

    <div data-controller="click-to-copy" class="flex items-center">
        <input type="text"
            data-target="click-to-copy.source" 
            data-action="focus->click-to-copy#focus"  
            class="form-control m-0 form-control-lg bg-blue-100 italic text-sm rounded-r-none" value="{{ $user->path('show') }}" contenteditable="true">
            
        <button data-action="click->click-to-copy#handle" data-target="click-to-copy.button" class="btn btn-primary px-3 py-2 bg-blue-400 hover:bg-blue-500 text-white rounded-l-none rounded-r hidden md:inline">Copy</button>
    </div>

@endmodal