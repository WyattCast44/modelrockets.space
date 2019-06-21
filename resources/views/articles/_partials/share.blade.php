@modal(['name' => 'share'])

    <h1 class="font-semibold uppercase text-2xl mb-2">Share this article</h1>

    <p class="text-gray-700 mb-4">
        We don't have any built in sharing functionality. They all induce a level of 
        user tracking/analytics (👀) that we would like to avoid. But feel free to copy 
        the url to this article and share wherever you wish! 🚀
    </p>

    <div data-controller="copy" class="flex items-center">
        <input data-target="copy.source" type="text" class="form-control m-0 form-control-lg bg-blue-100 italic text-sm rounded-r-none" value="{{ $article->path($article, true) }}" readonly>
        <button data-action="click->copy#handle" data-target="copy.button" class="btn btn-primary px-3 py-2 bg-blue-400 hover:bg-blue-500 text-white rounded-l-none rounded-r" data-turbolinks="false">Copy</button>
    </div>

@endmodal