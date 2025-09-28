@props([
    'variant' => 'primary',
    'size' => 'default',
    'href' => null,
    'type' => 'button',
    'disabled' => false,
    'icon' => null,
    'iconPosition' => 'right',
    'class' => ''
])

@php
    $baseClasses = 'cta-btn';
    
    // Variant classes
    $variantClasses = match($variant) {
        'primary' => 'crevo-special',
        'secondary' => 'scale-effect',
        'alt' => 'crevo-special-alt',
        'blue' => 'crevo-special-blue',
        'success' => 'gradient-btn-success',
        'warning' => 'gradient-btn-warning',
        'ocean' => 'gradient-btn-ocean',
        'sunset' => 'gradient-btn-sunset',
        'forest' => 'gradient-btn-forest',
        default => 'crevo-special'
    };
    
    // Size classes
    $sizeClasses = match($size) {
        'small' => 'px-4 py-2 text-sm',
        'large' => 'px-6 py-4 text-lg',
        default => 'px-8 py-4 text-base'
    };
    
    $classes = $baseClasses . ' ' . $variantClasses . ' ' . $sizeClasses . ' ' . $class;
    
    if ($disabled) {
        $classes .= ' opacity-50 cursor-not-allowed';
    }
@endphp


@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon && $iconPosition === 'left')
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        @endif
        <span>{{ $slot }}</span>
        @if($icon && $iconPosition === 'right')
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} @disabled($disabled)>
        @if($icon && $iconPosition === 'left')
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        @endif
        <span>{{ $slot }}</span>
        @if($icon && $iconPosition === 'right')
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        @endif
    </button>
@endif