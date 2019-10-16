@component('mail::layout')
    {{-- Header --}}
    @slot('header')

    @endslot


    @slot('imag')

    @endslot

    @slot('subcopy')
        <h1 class="titulo">¡Hola {{$shopping->user->name}}!</h1>
        <p class="texto-left">
            Gracias por comprar en FeelFit. Esperamos que hayas disfrutado de tu experiencia de compra con nostros.<br>
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
