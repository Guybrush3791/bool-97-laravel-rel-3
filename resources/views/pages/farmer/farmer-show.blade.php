@extends('layouts.main-layout')

@section('content')

    <div class="text-center">
        <h1>
            {{ $farmer -> name }}
            {{ $farmer -> lastname }}
        </h1>
        <h3>Date of birth: {{ $farmer -> dateOfBirth }}</h3>

        {{-- RABBITS --}}
        @if (count($farmer -> rabbits) > 0)
            <h3>Rabbits: {{ count($farmer -> rabbits) }}</h3>
            <ul class="mx-auto" style="max-width: 300px">
                @foreach ($farmer -> rabbits as $rabbit)
                    <li>
                        <a href="{{ route('rabbit.show', $rabbit -> id) }}">
                            {{ $rabbit -> name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <h3>NO RABBITS</h3>
        @endif

        {{-- FARMS --}}
        @if (count($farmer -> farms) > 0)
            <h3>Farms: {{ count($farmer -> farms) }}</h3>
            <ul class="mx-auto" style="max-width: 300px">
                @foreach ($farmer -> farms as $farm)
                    <li>
                        {{ $farm -> location }}
                        ({{ $farm -> nation }})
                    </li>
                @endforeach
            </ul>
        @else
            <h3>NO FARMS</h3>
        @endif

        {{-- ACTIONS --}}
        <a class="btn btn-primary my-3" href="{{ route('farmer.edit', $farmer -> id) }}">UPDATE</a>
        <form
            class="d-inline"
            method="POST"
            action="{{ route('farmer.delete', $farmer -> id) }}"
        >

            @csrf
            @method("DELETE")

            <input class="btn btn-primary" type="submit" value="DELETE">
            <select name="farmer_id" id="farmer_id">
                @foreach ($farmers as $subFurmer)
                    <option value="{{ $subFurmer -> id }}"
                        @disabled($farmer -> id === $subFurmer -> id)
                    >
                        {{ $subFurmer -> name }}
                        {{ $subFurmer -> lastname }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

@endsection
