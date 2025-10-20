<a 
    href="{{ route($route) }}"
    @class(['active' => request()->routeIs($route), 'header-icon' => !isset($label)])
>
    <span></span>
    <span>{{ $label ?? '' }}</span>
    @if(isset($icon))
        <svg>       
            <image xlink:href="{{ asset('icons/' . $icon .'.svg') }}"/>    
        </svg>
    @endif
</a>