@component('mail::layout')
    {{-- Header --}}
    @slot('header')

        <tr>
            <td class="header">
                <div class="content-header">
                    <img src="{{asset('img/welcome/bg.png')}}" width="100%"/>
                    <h1 class="titulo-welcome" >Bienvenido a Feel Fit</h1>
                </div>
            </td>
        </tr>

    @endslot


    @slot('subcopy')
        <p class="texto-center">
            Desde este momento haces parte de nuestra familia de alimentaci&oacute;n saludable,
            gracias por decidir darle a tu cuerpo alimentos que ralmente te nutren;
            nuestro principal objectivo es que tu alam y tu coraz&oacute;n se encuentren felices.
        </p>
        <p class="texto-center">
            Recuerda siempre que tus alimentos son tu medicina
        </p>
        <p class="texto-center">
            Con cariño,
        </p>
        <p class="texto-center">
            Feel Fit
        </p>
        <p class="texto-rigth">
            Cuidarte, se siente bien.
        </p>
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <img src="{{asset('img/welcome/logo.svg')}}"/>
        @endcomponent
    @endslot
@endcomponent
