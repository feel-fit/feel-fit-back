@component('mail::layout')
    {{-- Header --}}
    @slot('header')

    @endslot


    @slot('subcopy')
        <h1 class="titulo-contacto">¡Hola {{$shopping->user->name}}!</h1>
        <p class="texto-left">
            Gracias por tu compra. Estamos preprando tu pedido para que sea enviado a tu direcci&oacute;n.<br>
            A continuacion puedes revisar los detalles de tu orden. <br><br>
            Esperamos volver a verte pronto
        </p>
        <p class="texto-rigth">
            Equipo Feel Fit Market
        </p>

        <table class="table table-bordered mx-5">
            <thead class="thead-dark text-center">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Valor</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($shopping->details as $detail)
                <tr>
                    <td>{{$detail->name}}</td>
                    <td class="text-right">{{$detail->quantity}}</td>
                    <td class="text-right font-italic">{{$detail->value}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" class="font-weight-bold">Total</td>
                <td class="text-right font-weight-bold font-italic">$ 2000</td>
            </tr>
            </tbody>
        </table>

    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <img src="{{asset('img/welcome/logo.svg')}}"/>
        @endcomponent
    @endslot
@endcomponent
