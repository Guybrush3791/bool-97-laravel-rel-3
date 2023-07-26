@extends('layouts.main-layout')

@section('content')

    <div class="text-center">
        <h1>
            FARMERS
            <a class="btn btn-primary" href="{{ route('farmer.create') }}">
                +
            </a>
        </h1>
        <ul class="list-unstyled">
            @foreach ($farmers as $farmer)
                <li>
                    <a href="{{ route('farmer.show', $farmer -> id) }}">
                        {{ $farmer -> name }}
                        {{ $farmer -> lastname }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
