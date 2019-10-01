<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud</title>

    <style>

        .caja{
            border:2px red solid;
        }

        .contenido{
            display: flex;
        }

        body{
            font-family: "Arial", serif;
            margin: 0;
        }

        .imagen{
            width: 50%;
        }
        .content-text{
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            margin-right: 3%;
        }

        .titulo{
            text-align: left;
            font-style: italic;
            font-weight: bold;
            font-size: 40px;
            margin-bottom: 10%;
            color: #27D8DB;
        }

        .texto{
            text-align: center;
            color: #A3A3A3;
        }
        .texto-left{
            text-align: left;
            color: #A3A3A3;
        }
        .texto-rigth{
            text-align: right;
            color: #27D8DB;
        }
        .footer{
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        @media (max-width: 550px){
            .imagen{
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="contenido">
        <img src="{{asset('img/solicitud/Group3.svg')}}" class="imagen"/>
        <div class="content-text">
            <h1 class="titulo">¡Hola {{$name}}!</h1>
            <p class="texto-left">
                Solicitud de producto:
            </p>
            <p class="texto">
                Gracias por tu sugerencia, estamos trabajando para satisfacer las necesidades de cada uno de nuestros clientes,
                revisaremos los productos que deseas encontrar en nuestra tienda y te avisaremos cuando est&eacute;n disponibles.
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
        </div>
    </div>
    <div class="footer">
        <img src="{{asset('img/welcome/logo.svg')}}"/>
    </div>
</div>
</body>
</html>
