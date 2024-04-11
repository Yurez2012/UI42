@extends('layout.app')

@section('title', 'Home page')

@section('content')
<div id="section_home" class="container-fluid">
    <h1>
        Vyhl'adat v databáze obcí
    </h1>
    <form action="{{route('city.index')}}" method="GET">
        <input id="search" type="text" placeholder="Zadajte názoy" name="search">
    </form>
    <div id="search_autocomplete" class="">

    </div>
</div>
@stop
