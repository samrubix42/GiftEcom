<div>
	<div class="page-body">
		<div class="container-xl">
			<div class="row g-2 align-items-center mb-4">
				<div class="col">
					<h2 class="page-title">Admin Dashboard</h2>
					<div class="page-subtitle text-muted">Overview of store metrics and recent activity</div>
				</div>
			</div>

			<div class="row row-deck row-cards mb-4">
				@php
					$cards = [
						['title' => 'Products', 'value' => $metrics['products'] ?? 0, 'color' => 'bg-primary'],
						['title' => 'Variants', 'value' => $metrics['variants'] ?? 0, 'color' => 'bg-warning'],
						['title' => 'Categories', 'value' => $metrics['categories'] ?? 0, 'color' => 'bg-success'],
						['title' => 'Brands', 'value' => $metrics['brands'] ?? 0, 'color' => 'bg-info'],
						['title' => 'Users', 'value' => $metrics['users'] ?? 0, 'color' => 'bg-indigo'],
						['title' => 'Enquiries', 'value' => $metrics['enquiries'] ?? 0, 'color' => 'bg-danger'],
						['title' => 'Contacts', 'value' => $metrics['contacts'] ?? 0, 'color' => 'bg-teal'],
						['title' => 'Images', 'value' => $metrics['images'] ?? 0, 'color' => 'bg-purple'],
                
					];
				@endphp

				@foreach($cards as $card)
					<div class="col-6 col-sm-4 col-lg-2">
						<div class="card">
							<div class="card-body d-flex align-items-center">
								<div class="me-3">
									<span class="avatar rounded sq-48 {{ $card['color'] }} text-white"> 
										<!-- small icon -->
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="9"/></svg>
									</span>
								</div>
								<div>
									<div class="card-title mb-0">{{ $card['title'] }}</div>
									<div class="fw-bold display-6">{{ $card['value'] }}</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<div class="row row-cards">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Products by Category</h3>
							<div class="card-actions">
								<a href="#" class="btn btn-sm">View all</a>
							</div>
						</div>
						<div class="card-body">
							<div style="height:360px;">
								<canvas id="categoryChart" style="height:100%;"></canvas>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Quick Summary</h3>
						</div>
						<div class="card-body">
							<ul class="list-unstyled mb-0">
								<li class="d-flex justify-content-between py-2 border-bottom"><span>Featured Products</span><strong>{{ $metrics['featured'] ?? 0 }}</strong></li>
								<li class="d-flex justify-content-between py-2 border-bottom"><span>Product Images</span><strong>{{ $metrics['images'] ?? 0 }}</strong></li>
								<li class="d-flex justify-content-between py-2 border-bottom"><span>Attributes</span><strong>{{ $metrics['attributes'] ?? 0 }}</strong></li>
								<li class="d-flex justify-content-between py-2"><span>Users</span><strong>{{ $metrics['users'] ?? 0 }}</strong></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		(function(){
			const data = @json($categoryData ?? []);
			const labels = data.map(d => d.name);
			const counts = data.map(d => d.count);
			const ctx = document.getElementById('categoryChart');
			if (!ctx) return;
			new Chart(ctx, {
				type: 'bar',
				data: {
					labels: labels,
					datasets: [{
						label: 'Products',
						data: counts,
						backgroundColor: labels.map((_,i) => `rgba(${50 + (i*20)%200}, ${120 + (i*30)%120}, ${200 - (i*15)%120}, 0.85)`),
						borderColor: 'rgba(0,0,0,0.05)',
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					plugins: { legend: { display: false } },
					scales: { y: { beginAtZero: true, ticks: { precision:0 } } }
				}
			});
		})();
	</script>
</div>
