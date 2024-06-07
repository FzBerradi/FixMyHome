
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/Style/style2.css">
    <title>S'inscrire</title>
</head>
<body>
    <section id="header">
        <a href="/"><img src="../img/FIXHOME.png" class="logo" alt="FIXMYHOME"></a>

        <div>
            <ul id="navbar">
                <li><a  href="/">Home</a></li>
                <li><a  href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a class="active" href="/login">Log In</a></li>
                
            </ul>
        </div>
        
    </section>
    
    <section  class="section-inscription">
        <h2>Inscription Client</h2>
        
        <form action="/registerClient/store" method="post">
            @csrf
            @error('Email')
                    
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <div class="form-group">
                
                <input type="text" name="Nom" placeholder="NOM" required>
                ------
                <input type="email" name="email" placeholder="EMAIL" required>
                
            </div>
            
            <div class="form-group">
                <input type="text" name="Adresse" placeholder="ADRESSE" required>
                <input type="text" name="Ville" placeholder="VILLE" required>
                <input type="password" name="password" placeholder="PASSWORD" required>
            </div>
            
            <button type="submit">S'inscrire</button>
            <p>Déjà inscrit(e) ? <a href="/login">Se connecter.</a></p>
        </form>
    </section>
</body>
</html>