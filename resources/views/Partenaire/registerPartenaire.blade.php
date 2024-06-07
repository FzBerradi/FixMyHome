<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/style2.css">
    <title>S'inscrire</title>
</head>
<body>
    <section id="header">
        <a href="/"><img src="../img/FIXHOME.png" class="logo" alt="FIXMYHOME"></a>
        <div>
            <ul id="navbar">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a class="active" href="/login">Log In</a></li>
            </ul>
        </div>
    </section>
    
    <section id="inscription" class="section-inscription">
        <h2>Inscription Partenaire</h2>
        <form action="/registerPartenaire/store" method="post" enctype="multipart/form-data">
            @csrf
            @error('email')
                    
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <div class="form-group">
                <input type="text" name="Nom" placeholder="NOM" required>
                <input type="email" name="email" placeholder="EMAIL" required>
                <input type="tel" name="NumTel" placeholder="TÉLÉPHONE" required>
            </div>
            <div class="form-group">
                <input type="text" name="Ville" placeholder="VILLE" required>
                <input type="password" name="password" placeholder="PASSWORD" required>
                <input type="number" name="NbExperience" placeholder="NOMBRE D'ANNÉES D'EXPÉRIENCE" required>
            </div>
            <div class="form-group">
                <select name="Services[]" multiple required onchange="limitSelect(this, 3)">
                    <option value="" disabled>Services</option>
                    <option value="Plomberie">Plomberie</option>
                    <option value="Electricite">Electricité</option>
                    <option value="Peinture">Peinture</option>
                    <option value="Menage">Ménage</option>
                    <option value="Cuisine">Cuisine</option>
                    <option value="Repassage">Repassage</option>
                </select>
                <select name="Disponibilite_Jours[]" multiple required >
                    <option value="" disabled>Jours</option>
                    <option value="Lundi">Lundi</option>
                    <option value="Mardi">Mardi</option>
                    <option value="Mercredi">Mercredi</option>
                    <option value="Jeudi">Jeudi</option>
                    <option value="Vendredi">Vendredi</option>
                    <option value="Samedi">Samedi</option>
                    <option value="Dimanche">Dimanche</option>
                </select>
                
                
            </div>
            <div class="form-group">
                
                <div class="upload-photo">
                    <input type="file" name="Photo" id="upload-photo" accept="image/*" required>
                </div>
            </div>
            <button type="submit">S'inscrire</button>
            <p>Déjà inscrit(e) ? <a href="/login">Se connecter.</a></p>
        </form>
    </section>
    <script>
        function limitSelect(selectElement, limit) {
            var selectedOptions = Array.from(selectElement.selectedOptions);
            if (selectedOptions.length > limit) {
                alert('You can only select up to ' + limit + ' options.');
                selectedOptions[limit].selected = false; 
            }
        }
    </script>
</body>
</html>
