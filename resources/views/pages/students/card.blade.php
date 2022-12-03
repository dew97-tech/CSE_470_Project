<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="./">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ public_path('assets/favicon/kandari.png') }}">
        <link rel="manifest" href="assets/favicon/manifest.json">
        <title>Augmenta - ID CARD</title>
        {{-- <link href="{{ public_path('css/card.css') }}" rel="stylesheet" type="text/css" /> --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/card.css') }}"/> --}}
    </head>
    <body>
        <style>
            @font-face {
                font-family: Oswald;
                src: url('{{ public_path('fonts/Oswald-Medium.ttf') }}');
            }
            @font-face {
                font-family: Upbolters;
                src: url('{{ public_path('fonts/Upbolters-New-Regular.otf') }}');
            }
            @font-face {
                font-family: Montserrat;
                src: url('{{ public_path('fonts/Montserrat-Medium.ttf') }}');
            }

            /* common css start */
            * {
                margin: 0;
            }

            img {
                vertical-align: middle;
            }

            /* Common css End */

            .id_card_main {
                height: 500px;
                width: 700px;
                /* display: flex; */
                margin: 100px auto;
                /* background: #000; */
                text-align: center;
            }

            /* Front Part Start */
            .id_card_inner {
                width: 48%;
                /* background: red; */
                /* flex-direction: row; */
                margin: 5px;
                height: 100%;
                border: 2px solid #15858c;
            }

            .front_mid {
                position: relative;
                background: #15858c;
                height: 40%;
                font-family: Upbolters;
            }

            .front_mid h1 {
                padding-top: 70px;
                color: #fff;
            }

            .front_mid h6 {
                padding-top: 20px;
                color: #fff;
                font-size: 20px;
            }

            .id_image {
                /* width: 100%; */
                width: 150px;
                height: 150px;
                /* line-height: 70px; */
                position: absolute;
                /* border-radius: 50%; */
                left: 27%;
                top: -50%;
                transform: translateX(-50%);
                /* background: #000; */
            }

            .id_image img {
                height: 150px;
                width: 150px;
                /* width: 100%; */
                border-radius: 50%;
                /* border: 4px solid #33b8bd; */
                /* object-fit: cover; */
            }

            .front_top {
                position: relative;
                height: 40%;
            }

            .front_top img {
                width: 100%;
                height: 33.33%;
            }

            .front_bottom {
                position: relative;
                background: #15858c;
                height: 20%;
                font-family: Upbolters;
                font-weight: 400;
                color: #15858c;
            }

            .name {
                position: relative;
            }

            .name h1 {
                /* text-decoration: underline; */
                text-decoration-thickness: 2px;
                text-transform: uppercase;
            }

            .std_id_part {
                height: 50%;
                background: #f1f1f1;
            }

            .std_id_part h1 {
                /* font-size: 20px; */
                padding-top: 5px;
            }
            /* Front Part-End */


            /* Back Part Start */
            .back_top {
                position: relative;
                height: 20%;
            }

            .logo_part {
                position: absolute;
                width: 100%;
                top: 20px;
            }

            .logo_part img {
                width: 80%;
            }

            .back_mid {
                /* background: #15858c; */
                height: 55%;
            }

            .qr_container {
                padding-top: 4px;
                border: solid 2px #15858c;
                border-radius: 5%;
                margin: 0 auto;
                width: 40%;
            }

            .qr_container img {
                height: 70%;
                width: 70%;
                object-fit: contain;
            }

            .back_bottom {
                height: 25%;
                bottom: 0;
                position: relative;
            }

            .back_bottom h6 {
                font-size: 16px;
                padding: 2px 0;
                font-weight: 400;
                font-family: Oswald;
            }

            .back_bottom img {
                width: 100%;
                bottom: 0;
            }

            .address {
                font-size: 24px;
                color: #258b8f;
            }
            .phone {
                font-size: 28px;
                color: #fff;
                padding: 1px;
            }
            .phone_div {
                text-align: center;
                width: 40%;
                background-color: #15858c;
                margin: 0 auto;
            }

            .found {
                margin-top: 10px;
            }
            .student_word {
                margin: 2px;
            }
            .student_word img {
                margin-bottom: 1px;
            }
            #stu_i_0 {
                opacity: 1;
                position: relative;
                z-index: -1;
            }
            #stu_i_1 {
                opacity: 0.75;
                position: relative;
                z-index: -1;
            }
            #stu_i_2 {
                opacity: 0.5;
                position: relative;
                z-index: -1;
            }

            .disclaimer {
                padding-top: 15px;
                font-size: 16px;
                color: #258b8f;
                font-family: Montserrat;
            }

            .disclaimer li {
                padding-right: 10px;
                text-align: left;
                font-size: 12px;
            }
            .disclaimer h4 {
                padding-bottom: 10px;
            }
            /* Back Part End */
        </style>
        <div class="id_card_main">
            <!-- id card front part design start -->
            <div class="id_card_inner" style="float: left;">
                <div class="front_top">
                    <!-- <h1>Top</h1> -->
                    <div class="logo_part">
                        <img src="{{ public_path('assets/img/augmenta_logo_w_bg.png') }}" alt="">
                    </div>
                    <div class="student_word">
                    @for ($i = 0; $i < 3; $i++)
                        <img id="stu_i_{{$i}}" src="{{ public_path('assets/img/student_word_old.png') }}" alt="">
                    @endfor
                    </div>
                </div>
                <div class="front_mid">
                    <div class="id_image">
                        @if ($student->photo)
                            <img src="data:image/jpeg;base64, {{ base64_encode(@file_get_contents(url($student->photo)))}}" alt="" class="rounded">
                        @else
                            <img src="{{ public_path('assets/img/default_user_image.jpeg') }}" alt="" class="rounded">
                        @endif
                    </div>
                    <div class="name">
                        <h1>{{ $student->name }}</h1>
                        <hr style="width:50%; margin:0 auto; color:#fff">
                    </div>
                    <h6>{{ $student->enrolling_level }} <br> VALID TILL: JUNE 2024</h6>
                </div>
                <div class="front_bottom">
                    <div class="std_id_part">
                        <h1>{{ $student->student_id }}</h1>
                    </div>
                </div>
            </div>
            <!-- Front-part Design End -->
            <div class="id_card_inner" style="float: right;">
                <div class="back_top">
                    <div class="logo_part">
                        <img src="{{ public_path('assets/img/augmenta_logo_w_bg.png') }}" alt="">
                    </div>
                </div>
                <div class="back_mid">
                    <div class="qr_container">
                        {{ QrCode::size(125)->generate( $student->student_id ) }}
                    </div>
                    <div class="disclaimer">
                        <h4>Blood Group: <strong>{{ $student->blood_group }}</strong></h4>
                        <ul>
                            <li>The bearer of this card is a registered student of Augmenta Education. In case of emergency, call the number mentioned.</li>
                            <li>If lost, kindly return it to Augmenta Education.</li>
                        </ul>
                    </div>
                </div>
                <div class="back_bottom">
                    {{-- <h6 class="found">If found please return to following address:</h6> --}}
                    <div class="phone_div">
                        <h6 class="phone">+8801711583663</h6>
                    </div>
                    <h6 class="address">13/14 Nawab Street, Wari, Dhaka - 1203</h6>
                    {{-- <h6 class="address">augmentaedu@gmail.com</h6> --}}
                    <img src="{{ public_path('assets/img/card_back_footer.png') }}" alt="">
                </div>
            </div>
        </div>
    </body>
</html>
