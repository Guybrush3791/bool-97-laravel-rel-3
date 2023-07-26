@extends('layouts.main-layout')

@section('content')

    <div class="text-center">
        <h1>
            NEW FARMER
        </h1>
        <form
            method="POST"
            action="{{ route("farmer.store") }}"
        >

            @csrf
            @method("POST")

            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name">
            <br>
            <label for="lastname">Lastname</label>
            <br>
            <input type="text" name="lastname" id="lastname">
            <br>
            <label for="dateOfBirth">Date of birth</label>
            <br>
            <input type="date" name="dateOfBirth" id="dateOfBirth">
            <br><br>
            @foreach ($farms as $farm)
                <div class="form-check mx-auto" style="max-width: 300px">
                    <input class="form-check-input" type="checkbox" value="{{ $farm -> id }}"  name="farms[]" id="farm{{ $farm -> id }}">
                    <label class="form-check-label" for="farm{{ $farm -> id }}">
                    {{ $farm -> location }} ({{ $farm -> nation }})
                    </label>
                </div>
            @endforeach

            <input class="btn btn-primary my-3" type="submit" value="CREATE">
        </form>
    </div>

@endsection
