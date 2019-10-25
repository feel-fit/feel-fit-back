@component('mail::layout')
    {{-- Header --}}
    @slot('header')

    @endslot


    @slot('subcopy')
        <h1 class="titulo-contacto">¡Nuevo Pedido!</h1>
        <p class="texto-left">
            Información del cliente:
        </p>
        <p class="texto-left" style="font-weight: bold;">
            nombre: {{$shopping->user->name}} <br>
            Identificación: {{$shopping->user->identification}}<br>
            Dirección de envió: {{$shopping->address->city->name}} / {{$shopping->address->city->department->name}} -
            {{$shopping->address->address}} <br>
            Teléfono: {{$shopping->user->phone}}
        </p>
        <table id="products">
            <thead >
            <tr>
                <th scope="col" class="title-table">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Valor/Unidad</th>
                <th scope="col">Valor</th>
            </tr>
            </thead>
            <tbody>
            @php
                $subtotal= 0
            @endphp
            @foreach ($shopping->details as $detail)
                <tr>
                    <td>{{$detail->product->name}}</td>
                    <td class="value" style="text-align: center">{{$detail->quantity}}</td>
                    <td class="value">$ {{$detail->value}}</td>
                    <td class="value">$ {{$detail->quantity*$detail->value}}{{!$subtotal = $subtotal+$detail->quantity*$detail->value}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="">Valor de envío</td>
                <td class="value">$ {{$shopping->total-$subtotal}}</td>
            </tr>
            <tr>
                <td colspan="3" class="">Total</td>
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
