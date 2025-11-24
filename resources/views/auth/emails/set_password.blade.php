</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Set Your Password') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50;
            padding: 50;
            background-color: #f4f4f4;
        }

        .container {
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        .titulo {
            text-align: center;
            font-size: 3em;
            color: black;
            margin-bottom: 20px;   
            font-weight: 900;                     
            margin-bottom: 3rem;
        }

        .titulo span {            
            color: #2849E6;
        }        

        .img {
            width: 200px;
            height: 100px;
        }        
                
        .div-button {            
            display: inline;
            justify-content: center;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .button {            
            padding: 0px 25px;
            background-color: #2849E6;            
            border-radius: 10px;            
            text-decoration: none;              
            font-size: small;
            text-align: center;
            display: inline-block;
        }

        .button:hover {
            background-color: #2848e6d9;            
        }

        .text {
            color: #fff;
            font-size: small;            
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="div-button">
            {{-- <img src="{{ asset('assets/frontend/pymais/images/favicon.svg') }}" alt="" class="img"> --}}
        </div>        
        <p class="titulo" >PYM<span>AI</span>S</p>
        <h2>{{ __('Hello') }} {{ $user->name }}</h2>        
        <p>{{ __('You have been added to the team. Please click the link below to set your password') }}:</p>
        <div class="div-button">
            <a href="{{ $link }}" class="button">
                <p class="text">
                    {{ __('Set New Password') }}                    
                </p>
            </a>
        </div> 
        <br/>
        <p>{{ __('For more information contact the main member') }}.</p>
        <br/><br/><br/>
        <hr/>
        <div class="footer">
            <p>{{ __('Regards')}}, {{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>
