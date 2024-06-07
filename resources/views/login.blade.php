<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FIXMYHOME - LogIn</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="Style/style1.css">
    </head>

    <body>

        <section id="header">
            <a href="/"><img src="img/FixHome.png" class="logo" alt=""></a>

            <div>
                <ul id="navbar">
                    <li><a  href="/">Home</a></li>
                    <li><a  href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a class="active" href="/login">Log In</a></li>
                    
                </ul>
            </div>
            
        </section>

        

        <div class="container">
            
            <div class="box form-box">
                <div class="row my-2">
                    @include('partials.flashbag')
        
                </div>
                <header>Se connecter</header>
                
                <form action="{{ route('loginD')}}" method="post">
                    @csrf
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="field input">
                        
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{old('email')}}" required>
                        
                    </div>
    
                    <div class="field input">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" required>
                    </div>
    
                    <div class="d-grid">
                        
                        <button class="btn btn-primary">Se connecter</button>
                    </div>
                    <div class="links">
                        Créer un compte? <a href="/register">S'inscrire</a>
                    </div>
                </form>
            </div>
          </div>
    </body>

</html>