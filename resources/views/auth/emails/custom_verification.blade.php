</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50;
            padding: 50;
            background-color: #f4f4f4;
        }

        .container {
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
            width: 45%;
        }        
                
        .div-button {            
            display: flex;
            justify-content: center;
            align-items: center;            
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
            <img src="{{ 'https://pymais-development-aacvfzhcfkdyc7hu.southcentralus-01.azurewebsites.net/assets/frontend/pymais/images/logo-3.svg' }}" alt="" class="img">
        </div>        
        <p class="titulo" >PYM<span>AI</span>S</p>
        <h2>{{ __('Hello') }} {{ $user->name }}</h2>        
        <p>{{ __('Please click the button below to verify your email address') }}:</p>
        <div class="div-button">
            <a href="{{ $verificationUrl }}" class="button">
                <p class="text">
                    {{ __('Verify Email Address') }}                    
                </p>
            </a>
        </div> 

        <p>
            {{ __('If you did not create an account, no further action is required') }}                    
        </p>

        <div class="footer">
            <p>{{ __('Regards')}}, {{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>
