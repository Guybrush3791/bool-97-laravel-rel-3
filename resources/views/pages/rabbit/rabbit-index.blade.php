@extends('layouts.main-layout')

@section('content')

    <div class="text-center">
        <h1>
            RABBIT FARM
            <a
                class="btn btn-primary"
                href="{{ route('rabbit.create') }}">
                +
            </a>
        </h1>
        <ul class="list-unstyled">
            @foreach ($rabbits as $rabbit)
                <li>
                    <a href="{{ route('rabbit.show', $rabbit -> id) }}">
                        {{ $rabbit -> name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
