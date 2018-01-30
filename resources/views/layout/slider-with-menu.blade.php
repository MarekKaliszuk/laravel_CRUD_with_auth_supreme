<header>
    <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('layout/img/logo.png') }}">
        </a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="#about-me"> O mnie </a></li>
            <li><a href="#offer"> Oferta </a></li>
            <li><a href="#visits"> Wizyty </a></li>
            <li><a href="#pricelist"> Cennik </a></li>
            <li><a href="#recipes"> Przepisy </a></li>
            <li><a href="#contact"> Kontakt </a></li>
        </ul>
    </div>
</header>

<div id="slider">
    @forelse($slides as $slide)
        <div class="rsContent">
            <img class="rsImg" src="{{ asset('assets/images/slides/big').'/'.$slide->slide_image }}">
        </div>
    @empty
        Brak slajdów!
    @endforelse
</div>