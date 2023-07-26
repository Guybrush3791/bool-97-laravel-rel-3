@extends('layouts.main-layout')

@section('content')

    <div class="text-center">
        <h1>
            NEW FARMER
        </h1>
        <form
            method="POST"
            action="{{ route("farmer.update", $farmer -> id) }}"
        >

            @csrf
            @method("PUT")

            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name" value="{{ $farmer -> name }}">
            <br>
            <label for="lastname">Lastname</label>
            <br>
            <input type="text" name="lastname" id="lastname" value="{{ $farmer -> lastname }}">
            <br>
            <label for="dateOfBirth">Date of birth</label>
            <br>
            <input type="date" name="dateOfBirth" id="dateOfBirth" value="{{ $farmer -> dateOfBirth }}">
            <br><br>
            @foreach ($farms as $farm)
                <div class="form-check mx-auto" style="max-width: 300px">
                    <input class="form-check-input" type="checkbox" value="{{ $farm -> id }}"  name="farms[]" id="farm{{ $farm -> id }}"
                        @foreach ($farmer -> farms as $farmerFarm)
                            @checked($farmerFarm -> id === $farm -> id)
                        @endforeach
                    >
                    <label class="form-check-label" for="farm{{ $farm -> id }}">
                    {{ $farm -> location }} ({{ $farm -> nation }})
                    </label>
                </div>
            @endforeach
            <input class="btn btn-primary my-3" type="submit" value="UPDATE">
        </form>
    </div>

@endsection
