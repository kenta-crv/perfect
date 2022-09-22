<div
    x-data="{
        show: @entangle($attributes->wire('model')).defer
    }"
    x-show="show"
    x-cloak
    x-on:keydown.escape.window="show = false"
    class="bg-[#000000cc] fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40"
>

    <div x-show="show" class="modal-content bg-white rounded-lg  transform  ">
      <div class="close-modal">
        <i x-show="show" class="c-icn-close" x-on:click="show = false">

        </i>
      </div>

        {{ $slot }}
    </div>
</div>
