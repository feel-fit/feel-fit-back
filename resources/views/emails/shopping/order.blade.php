<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Solicitud</title>

    <style>
        body{
            font-family: "Arial", serif;
        }
        .titulo{
            text-align: left;
            font-style: italic;
            font-weight: bold;
            font-size: 40px;
            margin-bottom: 5%;
            color: #27D8DB;
        }
        .texto-left{
            text-align: left;
            color: #A3A3A3;
        }
        .texto-rigth{
            text-align: right;
            color: #27D8DB;
        }
        .pie-pagina{
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex flex-column">
        <h1 class="titulo">¡Hola {{$shopping->user->name}}!</h1>
        <p class="texto-left">
            Gracias por comprar en FeelFit. Esperamos que hayas disfrutado de tu experiencia de compra con nostros.<br>
        </p>
    </div>
    <div class="row mt-5">
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
    </div>
    <div class="row justify-content-end">
        <p class="texto-rigth m-5">
            Cuidarte, se siente bien.
        </p>
    </div>
</div>
<div class="pie-pagina">
    <img src="{{asset('img/welcome/logo.svg')}}"/>
</div>
</body>
</html>
