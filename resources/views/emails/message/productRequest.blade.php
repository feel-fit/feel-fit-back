@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        <tr>
            <td class="header">
                <img src="{{asset('img/solicitud/Group3.svg')}}" class="imagen"/>
            </td>
        </tr>
    @endslot


    @slot('imag')
        <td>
            <img src="{{asset('img/contacto/Group3.svg')}}" class="imagen"/>
        </td>
    @endslot

    @slot('subcopy')
        <h1 class="titulo">¡Hola {{$message->name}}!</h1>
        <p class="texto">
            Gracias por contactarnos, nos comunicaremos contigo en el menor tiempo posible
            para atender tu solicitud.
        </p>
        <p class="texto">
            Con cariño,
        </p>
        <p class="texto">
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
