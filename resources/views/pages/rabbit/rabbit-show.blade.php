@extends('layouts.main-layout')

@section('content')

    <div class="text-center my-5">
        <img
            src="
            {{ asset(
                $rabbit -> main_picture
                ? 'storage/' . $rabbit -> main_picture
                : 'storage/images/rabbit.jpg'
            ) }}"
            width="200px"
        >

        <h1>
            {{ $rabbit -> name }}
             -
            {{ $rabbit -> code }}
        </h1>
        <h3>Weight: {{ $rabbit -> weight }}g</h3>
        <h3>
            Farmer:
            <a href="{{ route('farmer.show', $rabbit -> farmer -> id )}}">
                {{ $rabbit -> farmer -> name }}
                {{ $rabbit -> farmer -> lastname }}
            </a>
        </h3>
        <a class="btn btn-primary" href="{{ route('rabbit.edit', $rabbit -> id) }}">UPDATE</a>
        @if ($rabbit -> main_picture)
            <form
                class="d-inline"
                method="POST"
                action="{{ route('rabbit.picture.delete', $rabbit -> id) }}"
                >

                @csrf
                @method("DELETE")

                <input class="btn btn-primary" type="submit" value="DELETE PICTURE">
            </form>
        @endif
        <form
            class="d-inline"
            method="POST"
            action="{{ route('rabbit.delete', $rabbit -> id) }}"
            >

            @csrf
            @method("DELETE")

            <input class="btn btn-primary" type="submit" value="DELETE">
        </form>
    </div>

@endsection
