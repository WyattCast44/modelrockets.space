<form 
    action="{{ $board->path('store-thread') }}" 
    method="post" enctype="multipart/form-data" 
    data-controller="form-submitter"
    data-target="form-submitter.form"
    data-action="submit->form-submitter#handle"
    >

    @csrf
    @honeypot

    <div class="hidden my-8 p-4 bg-indigo-100 border-solid border border-indigo-300" data-target="form-submitter.workingMessage">
        <p class="text-lg text-indigo-800">
            Your submission is currently being validated and uploaded, this may take awhile depending on
            the size of your attachments. In the meantime feel free to 
            <a href="{{ route('forum.index') }}" target="_blank">keep browsing in another tab</a>
        </p>
    </div>

    <div data-target="form-submitter.fieldsContainer">

        <!-- Title -->
        <div class="form-group">
            <label for="title" class="text-lg text-gray-600">Title</label>
            <input name="title" id="title" class="form-control" placeholder="Your title..." value="{{ old('title') }}" required autofocus/>

            @error('title')
                <small class="text-red-400 font-semibol">{{ $message }}</small>
            @enderror

        </div>
    
        <!-- Body -->
        <div class="form-group">
            <label for="body" class="text-lg text-gray-600">Body</label>
            <textarea name="body" id="body" rows="10" class="form-control" placeholder="Your thoughts, ideas, etc..." required>{{ old('body') }}</textarea>
            <small class="text-gray-600">This textarea supports markdown</small>
    
            @error('body')
                <small class="text-red-400 font-semibol">{{ $message }}</small>
            @enderror
    
        </div>
    
        <!-- Attachments -->
        <div class="form-group" data-controller="multifile">
            <label for="attachments[]" class="text-lg text-gray-600">Attachments</label>
        
            <div class="custom-file">
                <input
                    type="file"
                    data-target="multifile.source form-submitter.attachments"
                    data-action="change->multifile#handle"
                    class="custom-file-input"
                    name="attachments[]"
                    id="attachments"
                    multiple
                />
        
                <label class="custom-file-label" for="attachments[]" data-target="multifile.text"
                    >Choose file(s)</label
                >
            </div>
    
            @error('attachments.*')
                <small class="text-red-400 font-semibol">{{ $message }}</small>
            @enderror
        
            <div class="-mx-2" data-target="multifile.listContainer">
                <li
                    data-target="multifile.listTemplate"
                    class="mx-2 mb-2 p-2 bg-gray-200 text-xs hidden border border-solid border-gray-300 rounded"
                ></li>
                <ul data-target="multifile.list" class="list-none flex my-4 flex-wrap"></ul>
            </div>
    
        </div>     

    </div>  

    <!-- Actions -->
    <div class="form-group flex justify-end">
        <a href="{{ $board->path($board) }}" class="btn btn-link">Cancel</a>
        <button 
            type="submit" 
            data-target="form-submitter.submit"
            data-action="click->form-submitter#handle"
            class="btn btn-primary" 
        >Submit</button>
    </div>

</form>