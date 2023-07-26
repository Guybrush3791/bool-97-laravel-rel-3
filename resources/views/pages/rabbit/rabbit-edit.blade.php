@extends('layouts.main-layout')

@section('content')

    <div class="text-center">
        <h1>EDIT RABBIT</h1>
        <form
            method="POST"
            action={{ route('rabbit.update', $rabbit -> id) }}
        >

            @csrf
            @method("PUT")

            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name" value={{ $rabbit -> name }}>
            <br>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="code">Code</label>
            <br>
            <input type="text" name="code" id="code" value={{ $rabbit -> code }}>
            <br>
            @error('code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="weight">Weight</label>
            <br>
            <input type="number" name="weight" id="weight" value={{ $rabbit -> weight }}>
            <br>
            @error('number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="farmer_id">Farmer</label>
            <br>
            <select name="farmer_id" id="farmer_id">
                @foreach ($farmers as $farmer)
                    <option value="{{ $farmer -> id }}"
                        @selected($rabbit -> farmer -> id === $farmer -> id)
                    >
                        {{ $farmer -> name }}
                        {{ $farmer -> lastname }}
                    </option>
                @endforeach
            </select>
            <br>
            @error('farmer_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input class="btn btn-primary my-3" type="submit" value="UPDATE">
        </form>
    </div>

@endsection
