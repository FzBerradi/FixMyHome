<x-masterPartenaire title="Dashboard">
    <h3>Dashboard</h3>
    <br>
    <br>
    <div class="dashboard-stats c1">
        
        
        <div class="stat-item c2">
            <span class="stat-icon">
                <i class="fas fa-clock"></i>
            </span>
            <div class="stat-value">{{ $reservationsEnAttente }}</div>
            <div class="stat-title">Réservations en attente</div>
        </div>
        
        
        <div class="stat-item c2">
            <span class="stat-icon">
                <i class="fas fa-check"></i>
            </span>
            <div class="stat-value">{{ $servicesRealises }}</div>
            <div class="stat-title">Services réalisés</div>
        </div>
        
    </div>
</x-masterPartenaire>
