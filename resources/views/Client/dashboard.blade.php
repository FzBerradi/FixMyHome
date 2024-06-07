<x-master title="Dashboard">
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
                <i class="fas fa-city"></i>
            </span>
            <div class="stat-value">{{ $partenairesDansVille }}</div>
            <div class="stat-title">Partenaires dans votre ville</div>
        </div>
        
    </div>
</x-master>
