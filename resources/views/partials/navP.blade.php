
<section id="header1">
    <a href="/dashboardPartenaire"><img src="/img/FixHome.png" class="logo" alt=""></a>
    <div>
      <ul id="navbar">
        <li><a class="active" href="/dashboardPartenaire">Home</a></li>
        
        <li><div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle navCustom" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            
            {{auth('partenaire')->user()->Nom}}
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div></li>
        
        
      </ul>
      
    </div>
  </section>
  
  <div class="sidebar">
    <a href="/reservations">Réservations</a>
    <a href="/serviceFait">Services</a>
    <a href="/profilPartenaire">Mon profil</a>
  </div>
  