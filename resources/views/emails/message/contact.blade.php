@component('mail::layout')
    {{-- Header --}}
    @slot('header')

    @endslot

    @slot('subcopy')
        <table>
            <tr>
                <td class="imagen">
                    <img src="{{asset('img/contacto/Group3.svg')}}" class="imagen"/>
                </td>
                <td class="imagen">
                    <h1 class="titulo-contacto">¡Hola {{$message->name}}!</h1>
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
                </td>
            </tr>
        </table>

    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <img src="{{asset('img/welcome/logo.svg')}}"/>
        @endcomponent
    @endslot
@endcomponent
