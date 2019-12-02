@component('mail::layout')
    {{-- Header --}}
    @slot('header')

        <tr>
            <td class="header">
                <div class="content-header">
                    <img src="{{asset('img/welcome/bg.png')}}" width="100%"/>
                </div>
            </td>
        </tr>

    @endslot


    @slot('subcopy')
        <p class="texto-center">
            Feelfit genero una contraseña para ti. <br>
            <strong>{{$newpassword}}</strong>
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
