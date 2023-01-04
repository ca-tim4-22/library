<!-- Title -->
<title>Error 404</title>

<!-- Icon -->
<link rel="icon"
      href="https://i.pinimg.com/originals/a0/26/1b/a0261b885cfba5a65c675c33327acf5a.png">
<meta name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0"/>

<!-- Style -->
<link rel="stylesheet"
      href="{{asset('/css/custom-style/404_page/404_style/404_style.css')}}">

<div class="moon"></div>
<div class="moon__crater moon__crater1"></div>
<div class="moon__crater moon__crater2"></div>
<div class="moon__crater moon__crater3"></div>

<div class="star star1"></div>
<div class="star star2"></div>
<div class="star star3"></div>
<div class="star star4"></div>
<div class="star star5"></div>

<div class="error">
    <div class="error__title">404</div>
    <div class="error__subtitle">Hmm...</div>
    <div class="error__description">
        Prava je misterija kako ste došli ovdje.
        <br>
        Ono što znamo je kako da se vratite!
    </div>
    <button onclick="history.back()"
            class="error__button error__button--active">Vrati se
    </button>
</div>

<div class="astronaut">
    <div class="astronaut__backpack"></div>
    <div class="astronaut__body"></div>
    <div class="astronaut__body__chest"></div>
    <div class="astronaut__arm-left1"></div>
    <div class="astronaut__arm-left2"></div>
    <div class="astronaut__arm-right1"></div>
    <div class="astronaut__arm-right2"></div>
    <div class="astronaut__arm-thumb-left"></div>
    <div class="astronaut__arm-thumb-right"></div>
    <div class="astronaut__leg-left"></div>
    <div class="astronaut__leg-right"></div>
    <div class="astronaut__foot-left"></div>
    <div class="astronaut__foot-right"></div>
    <div class="astronaut__wrist-left"></div>
    <div class="astronaut__wrist-right"></div>

    <div class="astronaut__cord">
        <canvas id="cord" height="500px" width="500px"></canvas>
    </div>

    <div class="astronaut__head">
        <canvas id="visor" width="60px" height="60px"></canvas>
        <div class="astronaut__head-visor-flare1"></div>
        <div class="astronaut__head-visor-flare2"></div>
    </div>
</div>

<script src="{{asset('/css/custom-style/404_page/404_script/404_script.js')}}"></script>