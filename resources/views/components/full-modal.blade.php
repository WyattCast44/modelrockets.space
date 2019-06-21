<div class="modal-fullscreen nidden" id="{{ $name }}">

    <a href="#" class="modal-fullscreen-cancel cursor-pointer text-white hover:text-white" data-turbolinks="false">
        @svg('x', 'inline-block fill-current')
    </a>

    <div class="modal-fullscreen-modal">

        {{  $slot }}

    </div>
    
</div>