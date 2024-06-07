
<section id="header1">
    <a href="/dashboardAdmin"><img src="/img/FixHome.png" class="logo" alt=""></a>
    <div>
      <ul id="navbar">
        <li><a class="active" href="/dashboardAdmin">Home</a></li>
        
        <li><div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{auth('admin')->user()->email}}
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div></li>
        
        
      </ul>
      
    </div>
  </section>
  
  <div class="sidebar">
    <a href="/ManageClients">Clients</a>
    <a href="/ManagePartenaires">Partenaires</a>
  </div>
  