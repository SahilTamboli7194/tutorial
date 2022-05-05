@props(['trigger'])
<div x-data="{show:false}" @click.away="show=false">
{{-- trigger --}}
<div @click="show = !show">
    {{ $trigger }}
</div>
<div x-show="show" class="py-2 absolute bg-gray-200 w-32 mt-2 rounded-xl z-50 text-left overflow-auto max-h-52" style="display: none;">
{{-- links --}}
{{ $slot }}
</div>
</div>