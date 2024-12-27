<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

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
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.destinasi') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Store</span>
				</a>
			</li>
			<li>
				<a href="tiket.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Ticket</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
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
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="flex text-bold w-full text-xl py-4 px-4"> 
        <strong>Jalur Ticket</strong>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
    <th scope="col" class="px-4 py-3">Nama Pemesan</th>
    <th scope="col" class="px-4 py-3">Destinasi</th>
    <th scope="col" class="px-4 py-3">Tanggal</th>
    <th scope="col" class="px-4 py-3">Jumlah</th>
    <th scope="col" class="px-4 py-3">Total Harga</th>
    <th scope="col" class="px-4 py-3">Status</th>
</tr>
</thead>
<tbody>
    @forelse($tickets as $ticket)
    <tr class="border-b dark:border-gray-700">
        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $ticket->nama ?? 'N/A' }}
        </th>
        <td class="px-4 py-3">{{ $ticket->destinasi->nama ?? 'N/A' }}</td>
        <td class="px-4 py-3">{{ $ticket->tanggal }}</td>
        <td class="px-4 py-3">{{ $ticket->jumlah }}</td>
        <td class="px-4 py-3">Rp {{ number_format($ticket->total_harga, 0, ',', '.') }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="5" class="px-4 py-3 text-center">Data tiket tidak tersedia</td>
    </tr>
    @endforelse
</tbody>

        </table>
    </div>
</section>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
	<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
