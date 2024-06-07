
<section id="header1">
    <a href="/dashboard"><img src="/img/FixHome.png" class="logo" alt=""></a>
    <div>
      <ul id="navbar">
        <li><a class="active" href="/dashboard">Home</a></li>
        @auth
        <li><div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle navCustom" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            
            {{auth()->user()->Nom}}
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div></li>
        @endauth
        
      </ul>
      
    </div>
  </section>
  
  <div class="sidebar">
    <a href="/demanderservice">Demander un service</a>
    <div class="dropdown">
      <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        
        Réservations
      </button>
      <ul class="dropdown-menu custom-dropdown-menu">
        <li><a class="dropdown-item custom" href="/reservationAttente">Réservations en attente</a></li>
        <li><a class="dropdown-item custom" href="/serviceRealise">Services réalisés</a></li>
      </ul>
    </div>
    <a href="/profil">Mon profil</a>
  </div>
  