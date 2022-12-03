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
    font-family: TimesNewRoman;
    src: url('{{ public_path('fonts/Times-New-Roman.ttf') }}');
  }

  .body {
    position: absolute;
  }

  .container_1 {
    float: left;
    width: 100%;
    height: 2rem;
    font-size: 1rem;
    /* bottom: -23rem; */
    margin-top: 20px;
    position: relative;
  }

  .box_1 {
    float: left;
    margin-left: 20px;
    width: 50%
  }

  .box_2 {
    float: right;
    /* padding-top:20px ; */
    margin-top: -2rem;
    text-align: right;
    margin-right: 20px;
    width: 50%;
  }

  .clr {
    clear: both;
  }

  .box_2 img {
    /* width:50px; */
    height: 35px;
    margin-bottom: 0.2rem;
    padding-bottom: 0.2rem;
    vertical-align: middle;

  }

  .powered a {
    display: inline-block;
  }

  .box_1 p:nth-child(1) {
    color: teal;
    /* font-family: 'Upbolters New', sans-serif; */
    margin-block-start: 0;
    margin-block-end: 0;
    padding-bottom: 0;
    margin-bottom: 0;
    /* font-weight: 300; */
    font-size: 1rem;
  }

  .box_1 p:nth-child(2) {
    color: teal;
    /* font-family: 'Upbolters New', sans-serif; */
    padding: 0;
    margin: 0;
    /* font-weight: 200; */
    font-size: 1rem;
    letter-spacing: 1px;
  }

  .info p {
    font-weight: 100;
  }

  .box_1 a p {
    color: teal;
    /* font-family: 'Upbolters New', sans-serif; */
    font-family: Upbolters;
    padding: 0;
    margin: 0;
    font-weight: 100;
    font-size: 1.2rem;
    letter-spacing: 1px;
  }

  .box_1 a span {
    color: grey;
    /* font-family:'Times New Roman', Times, serif; */
    font-family: TimesNewRoman;
    padding: 0;
    margin: 0;
    font-weight: 100;
    font-size: 0.8rem;

  }

  .box_1 a p {
    display: inline-block;
  }
</style>

<br>
<hr>

<body>
  <div class="container_1">
    <div class="box_1">
      <a href="#" target="_blank">Fall 2022<span>&copy; {{ date('Y') }} </span></a>
    </div>
    <div class="box_2">
      <div class="powered">
        Powered by<a href="#"></a><a href="#"><b>CSE 470 BRACU</b></a>

      </div>
    </div>
    <div class="clr"></div>
  </div>

</body>