<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<title>AdminHub</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">TrekTrove</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{ route('admin.dashboard') }}">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.destinasi') }}">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">My Store</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.ticket') }}">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Ticket</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<!-- <input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button> -->
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile">
				<img src="{{asset('images/profile.jpg')}}">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-chart'></i>
					<span class="text">
						<h3>{{ $countTicket }}</h3>
						<p>Ticket Sold</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3>{{ $countUser }}</h3>
						<p>User Registered</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-home'></i>
					<span class="text">
						<h3>{{ $countDestinasi }}</h3>
						<p>Total Destination</p>
					</span>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($recentTickets as $ticket)
							<tr>
								<td>
									<!-- Assuming there's a relationship between Ticket and User -->
									<p>{{ $ticket->user->name ?? 'N/A' }}</p>
								</td>
								<td>{{ $ticket->created_at->format('Y-m-d') }}</td>
								<td>
									<span class="status 
                @if($ticket->payment_status == 'paid') 
                    paid
                @elseif($ticket->payment_status == 'unpaid') 
                    unpaid
                @endif
            ">
										{{ ucfirst($ticket->payment_status) }}
									</span>
								</td>
							</tr>
							@endforeach
						</tbody>

					</table>
				</div>

				<div class="todo">
					<div class="head">
						<h3>Recent Destinations</h3>
					</div>
					<ul class="todo-list">
						@foreach($recentDestinasi as $destinasi)
						<li class="completed">
							<p>{{ $destinasi->nama ?? 'No Destination Available' }}</p>
						</li>
						@endforeach
					</ul>
				</div>

			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>