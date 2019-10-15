<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feel Fit</title>
    <style>
        .caja{
            border:2px red solid;
        }
        body{
            font-family: "Arial", serif;
            margin: 0;
        }
        .header{
            position: relative;
        }
        .titulo{
            text-align: center;
            position: absolute;
            margin-left:auto;
            margin-right:auto;
            left:0;
            right:0;
            bottom: 20%;
            color: white;
        }
        .body{
            margin-top: 5%;
            margin-left: 20%;
            margin-right: 20%;
            margin-bottom: 10%;
        }
        .texto-center{
            text-align: center;
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

        #fresa1{
            position: absolute;
            bottom: 70%;
            left: 70%;
        }

        #fresa2{
            position: absolute;
            bottom: 60%;
            left: 85%;
        }

        #fresa3{
            position: absolute;
            bottom: 83%;
            left: 80%;
        }

        #fresa4{
            position: absolute;
            bottom: 20%;
        }

        #fresa5{
            position: absolute;
            bottom: 20%;
        }
        #fresa6{
            position: absolute;
            bottom: 20%;
        }
        #fresa7{
            position: absolute;
            bottom: 20%;
        }

        @media (max-width: 770px){
            #fresa1{
                display: none;
            }
            #fresa2{
                display: none;
            }
            #fresa3{
                display: none;
            }
            #fresa4{
                display: none;
            }
            #fresa5{
                display: none;
            }
            #fresa6{
                display: none;
            }
            #fresa7{
                display: none;
            }
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
<div class="container">
    <div class="header">
        <img src="{{asset('img/welcome/bg.png')}}" width="100%"/>
        <h1 class="titulo" >Bienvenido a Feel Fit</h1>
    </div>
    <div class="body">
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
    </div>
    <div class="pie-pagina">
        <img src="{{asset('img/welcome/logo.svg')}}"/>
    </div>
    <img src="{{asset('img/welcome/fresas/fresa1.png')}}" id="fresa1">
    <img src="{{asset('img/welcome/fresas/fresa2.png')}}" id="fresa2">
    <img src="{{asset('img/welcome/fresas/fresa3.png')}}" id="fresa3">
    <img src="{{asset('img/welcome/fresas/fresa4.png')}}" id="fresa4">
    <img src="{{asset('img/welcome/fresas/fresa5.png')}}" id="fresa5">
    <img src="{{asset('img/welcome/fresas/fresa6.png')}}" id="fresa6">
    <img src="{{asset('img/welcome/fresas/fresa7.png')}}" id="fresa7">
</div>
</body>
</html>
