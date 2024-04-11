@extends('layout.app')

@section('title', 'City')

@section('content')
    <div class="container-fluid text-center p-5">
        <h1 class="mb-5">
            Detail obce
        </h1>
        <div class="container section_city_card">
            <div class="row">
                <div class="col-md-12 col-xl-6 section_city_card_left">
                    <div class="row">
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Meno starostu:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            {{$city->mayor_name}}
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Adresa obecného úradu:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            {{$city->city_hall_address}}
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Telefón:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            {{$city->phone}}
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Fax:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            {{$city->fax}}
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Email:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            {{$city->email}}
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Web:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            {{$city->web_address}}
                        </div>
                        <div class="col-md-6 col-xl-6 label">
                            Zemepisné súradnice:
                        </div>
                        <div class="col-md-6 col-xl-6">
                            {{ $city->latitude.', '.$city->longitude}}
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-6 section_city_card_right">
                    <img src="{{ asset($city->file_path) }}" alt="">
                    <h2 class="color_blue_dark mt-3">
                        Nové mesto nad Váhom
                    </h2>
                </div>
            </div>
        </div>
    </div>
@stop
