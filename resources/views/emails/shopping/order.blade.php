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
        <table id="products">
            <thead >
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Valor/Unidad</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($shopping->details as $detail)
                <tr>
                    <td>{{$detail->product->name}}</td>
                    <td class="value">{{$detail->quantity}}</td>
                    <td class="value">$ {{$detail->value}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" class="">Total</td>
                <td class="value">$ {{$shopping->total}}</td>
            </tr>
            </tbody>
        </table>
        <p class="texto-rigth">
            Equipo Feel Fit Market
        </p>

    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <img src="{{asset('img/welcome/logo.svg')}}"/>
        @endcomponent
    @endslot
@endcomponent
