<x-masterAdmin title="Dashboard">
    <h3>Dashboard</h3>
    <br>
    <br>
    <div class="dashboard-stats">
        <div class="stat-item">
            <span class="stat-icon">
                
                <i class="fas fa-users"></i>
            </span>
            <div class="stat-value">{{ $nombreDeClients }}</div>
            <div class="stat-title">Nombre de clients</div>
        </div>
        
        <div class="stat-item">
            <span class="stat-icon">
                
                <i class="fas fa-handshake"></i>
            </span>
            <div class="stat-value">{{ $nombreDePartenaires }}</div>
            <div class="stat-title">Nombre de partenaires</div>
        </div>
        
        <div class="stat-item">
            <span class="stat-icon">
                
                <i class="fas fa-check-circle"></i>
            </span>
            <div class="stat-value">{{ $reservationsRealisees }}</div>
            <div class="stat-title">Services réalisés</div>
        </div>
    </div>
</x-masterAdmin>
