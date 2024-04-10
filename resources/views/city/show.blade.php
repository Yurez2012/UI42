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
                            Ing. Ivan Patoprsty
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Adresa obecného úradu:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            SNP 65, 900 84 Báhon
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Telefón:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            0907 325 523
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Fax:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            033 645 5340
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Email:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            starosta@bahon.sk
                        </div>
                        <div class="col-md-6 col-xl-6 label mb-3">
                            Web:
                        </div>
                        <div class="col-md-6 col-xl-6 mb-3">
                            www.bahon.com
                        </div>
                        <div class="col-md-6 col-xl-6 label">
                            Zemepisné súradnice:
                        </div>
                        <div class="col-md-6 col-xl-6">
                            48.1523834, 17.0904241
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-6 section_city_card_right">
                    <img src="{{ asset('assets/img/icon_test.png') }}" alt="">
                    <h2 class="color_blue_dark mt-3">
                        Nové mesto nad Váhom
                    </h2>
                </div>
            </div>
        </div>
    </div>
@stop
