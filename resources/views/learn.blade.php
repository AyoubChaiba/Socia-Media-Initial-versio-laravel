    @section('title')
        accueil
    @endsection
    @extends('layout.master')
    @section('main')
        {{-- main --}}

        @unless ($nom === 'zor')
        <h2>not found zor => nom : {{$nom}}</h2>
        @endunless

        @if (count($cours) > 0)
        <h3>cours</h3>
        <ul>
            @foreach ($cours as $value)
                <li>{{$value}}</li>
            @endforeach
        </ul>
        @else
        <p>cours not found</p>
        @endif

        @isset($color)
        @switch($color)
            @case('red')
                    <p>this color {{$color}}</p>
                @break
            @case('blue')
                    <p>this color {{$color}}</p>
                @break
            @default <p>sit te plait entrees nom</p>
        @endswitch
        @endisset

        @empty($varEmpty)
        <p>this var is empty</p>
        @endempty

        @php
        $n = 1+ 5
        @endphp
    @endsection

