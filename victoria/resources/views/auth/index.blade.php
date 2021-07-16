@extends('app')

@section('content')

    <div style="padding: 25px 0;">
        <div class="carousel" style="width: 80%; margin: auto; margin-bottom: 25px; overflow: hidden; /*border: 1px solid black;*/ border-radius: 15px; position: relative;">

            <style>
                .btn-slider {
                    opacity: 25%;
                    cursor: pointer;
                }
                .btn-slider:hover {
                    opacity: 100%;
                    transition: opacity 200ms ease-out;
                }
                .carousel-container {
                    position: relative;
                    height: 350px;
                }
                .carousel-container>.img-carousel {
                    display: none;
                }
                .carousel-container>.active {
                        display: flex;
                }
            </style>

            <div class="carousel-container" style="box-shadow: 0 0 10px rgb(0 0 0 / 75%); border-radius: 15px;">
{{--                <img class="img-carousel active" style="width: 100%; height: 350px; border-radius: 15px;" src="img.jpg" alt="">--}}
                <div class="img-carousel active" style="justify-content: center; align-items: center; width: 100%; height: 350px; border-radius: 15px; background-color: grey; text-align: center; font-size: 50px;">
                    <div style="padding: 0 50px;">Рассчитай стоимость онлайн. Онлайн калькулятор.</div>
                </div>
                <div class="img-carousel" style="justify-content: center; align-items: center; width: 100%; height: 350px; border-radius: 15px; background-color: grey; text-align: center; font-size: 50px;">
                    <div style="padding: 0 50px;">Купи 1000 визиток за 100 рублей</div>
                </div>
                <div class="img-carousel" style="justify-content: center; align-items: center; width: 100%; height: 350px; border-radius: 15px; background-color: grey; text-align: center; font-size: 50px;">
                    <div style="padding: 0 50px;">При заказе до 15 числа скидка 15%</div>
                </div>
{{--                <img class="img-carousel" style="width: 100%; height: 350px; border-radius: 15px;" src="https://via.placeholder.com/900x300?text=First IMG" alt="">--}}
{{--                <img class="img-carousel" style="width: 100%; height: 350px; border-radius: 15px;" src="https://via.placeholder.com/900x300?text=Two IMG" alt="">--}}
{{--                <img class="img-carousel" style="width: 100%; height: 350px; border-radius: 15px;" src="https://via.placeholder.com/900x300?text=Three IMG" alt="">--}}
{{--                <img class="img-carousel" style="width: 100%; height: 350px; border-radius: 15px;" src="https://via.placeholder.com/900x300?text=Four IMG" alt="">--}}
{{--                <img class="img-carousel" style="width: 100%; height: 350px; border-radius: 15px;" src="https://via.placeholder.com/900x300?text=Five IMG" alt="">--}}
{{--                <img class="img-carousel" style="width: 100%; height: 350px; border-radius: 15px;" src="https://via.placeholder.com/900x300?text=Six IMG" alt="">--}}
            </div>

            <div style="position: absolute; top: calc(50% - 24px); left: 24px;">
                <div class="btn-slider btn-slider-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </div>
            </div>

            <div style="position: absolute; top: calc(50% - 24px); right: 24px;">
                <div class="btn-slider btn-slider-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg>
                </div>
            </div>

        </div>

        <style>
            .smooth-block:hover {
                transform: scale(1.05);
                cursor: pointer;
                transition: transform .3s;
            }
        </style>

        <div style="display: flex; flex-wrap: wrap; width: 100%;">
            @for($i = 0; $i < 10; $i++)
                <div class="smooth-block" style="width: 48%; margin: 1%; /*border: 1px solid black;*/ border-radius: 15px; box-shadow: 0 0 10px rgb(0 0 0 / 75%);">
                    <img style="width: 100%; height: 350px; border-radius: 15px;" src="img.jpg" alt="">
                </div>
            @endfor
        </div>

    </div>



@stop

@section('js')

@stop