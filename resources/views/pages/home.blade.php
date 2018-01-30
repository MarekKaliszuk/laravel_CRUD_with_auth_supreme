@extends('layout.master')


@section('content')

    <section id="about-me" class="content-sections center">
        <h1>mgr Natalia Hertmanowska</h1>
        <p>
            {!! nl2br($settings['o_nas']) !!}
        </p>
    </section>

    <section id="offer" class="content-sections-wide offer">
        <div class="offer-content">
            <div class="offer-item center p-3">
                <h1>Oferta podstawowa</h1>
                <p>
                    {!! nl2br($settings['oferta_podstawowa']) !!}
                </p>
                <p>
                    <b>Indywidualne plany żywieniowe</b> (7-dniowe, 14-dniowe)<br/>
                    <b>Edukacja żywieniowa </b>(warsztaty, szkolenia) dla przedszkoli, szkół, grup zorganizowanych, firm<br/>
                    <b>Analiza składu ciała</b> <br/>
                    <b>Konsultacja mobilna</b> - z dojazdem do domu lub pod wskazany adres<br/><br/>

                    <b>Usługi on-line</b> (analiza dotychczasowego sposobu żywienia, konsultacje dietetyczne, układanie
                    jadłospisów)

                </p>
            </div>

            <div class="offer-item center p-3">
                <h1>Oferta specjalistyczna</h1>
                <p>
                    {!! nl2br($settings['oferta_specjalistyczna']) !!}
                </p>
            </div>
        </div>
    </section>
    <h1 id="visits" class="center p-5">Wizyty</h1>
    <section class="content-sections-wide left bg-green p-5">

        <div class="visits-content">
            <div class="visits">
                <h2>Przed pierwszą wizytą</h2>
                <p>
                    {!! nl2br($settings['przed_wizyta']) !!}
                    <br/>
                </p>
            </div>
        </div>
    </section>
    <section class="content-sections-wide bg-white left p-5">
        <div class="visits-content">
            <div class="visits">
                <h2>Na pierwszej wizycie</h2>
                <p>
                    {!! nl2br($settings['pierwsza_wizyta']) !!}
                </p>
            </div>

        </div>
    </section>
    <section class="content-sections-wide left bg-green p-5">
        <div class="visits-content">
            <div class="visits">
                <h2>Wizyta kontrolna</h2>
                <p>
                    {!! nl2br($settings['wizyta_kontrolna']) !!}
                </p>
            </div>
        </div>
    </section>
    <section id="pricelist" class="content-sections center">
        <br/><br/>
        <h1>Cennik</h1><br/>
        <div class="pricelist-content center">
            <div class="offer-item center">
                <div class="pricelist-table border-green">
                    <div class="pricelist-content-wrap text-center brcolor"><h5>Konsultacja</h5>
                        <div class="price-per-day">
                            <span class="price-box-wrap price txcolor">{!! nl2br($settings['cena_konsultacja']) !!}</span>
                        </div>
                        {!! nl2br($settings['konsultacja_opis']) !!}
                    </div>
                </div>
            </div>
            <div class="offer-item center">
                <div class="pricelist-table border-yellow">
                    <div class="pricelist-content-wrap text-center brcolor"><h5>Wizyta kontrolna</h5>
                        <div class="price-per-day"><span
                                    class="price-box-wrap price tycolor">{!! nl2br($settings['cena_wizyta_kontrolna']) !!}</span>
                        </div>
                        {!! nl2br($settings['wizyta_kontrolna_opis']) !!}
                    </div>
                </div>
            </div>
            <div class="offer-item center">
                <div class="pricelist-table border-green">
                    <div class="pricelist-content-wrap text-center brcolor"><h5>Konsultacja online</h5>
                        <div class="price-per-day"><span
                                    class="price-box-wrap price txcolor">{!! nl2br($settings['cena_konsultacja_online']) !!}</span>
                        </div>
                        {!! nl2br($settings['konsultacja_online_opis']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="price-list-description">
            <p>
                {!! nl2br($settings['opis_indeksow']) !!}
            </p>
        </div>
    </section>

    <section class="content-sections center">
        <h1>Przepisy</h1><br/>
        <div id="recipes">
            @forelse($recipes as $recipe)
                <img src="{{ asset('assets/images/slides/small').'/'.$recipe->slide_image_small }}"
                     data-image="{{ asset('assets/images/slides/big').'/'.$recipe->slide_image }}" alt="">
            @empty
                <div class="center alert-danger">Brak przepisów!</div>
            @endforelse
        </div>
    </section>

    <section id="contact" class="content-sections-wide">
        <div class="contact">
            <div class="contact-info">
                <h1>Dietetyk Natalia Hertmanowska</h1>
                <p><br/>
                    Telefon:<br/> {!! nl2br($settings['phone']) !!}
                    <br /><br />
                    Email: <br /> {!! nl2br($settings['email']) !!}
                    <br/><br/>
                    Zapraszam!
                </p>
            </div>
            <div class="contactform">
                <h1>Napisz do mnie</h1>
                <form>
                    <div class="form-group">
                        <input type="fullname" class="form-control" id="fullname" aria-describedby="fullname"
                               placeholder="Imie i nazwisko" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" aria-describedby="email"
                               placeholder="Twój adres email" required>
                    </div>
                    <div class="form-group">
                        <label for="question">Twoja wiadomość</label>
                        <textarea class="form-control" id="question" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn send-button float-right">Wyślij wiadomość</button>
            </div>
            </form>
        </div>
        </div>
    </section>

@endsection