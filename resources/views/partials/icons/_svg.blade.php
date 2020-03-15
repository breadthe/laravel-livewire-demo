<svg
    xmlns="http://www.w3.org/2000/svg"
    id="{{ $id ?? '' }}"
    width="{{ $width ?? '24' }}"
    height="{{ $height ?? '24' }}"
    viewBox="0 0 {{ $viewBox ?? '24 24' }}"
    fill="{{ empty($fill) ? 'none' : 'currentColor' }}"
    stroke="currentColor"
    stroke-width="{{ $strokeWidth ?? '2' }}"
    stroke-linecap="round"
    stroke-linejoin="round"
    class="feather feather-{{ $icon }} {{ $class ?? '' }}"
>
    @include("partials.icons.$icon")
</svg>
