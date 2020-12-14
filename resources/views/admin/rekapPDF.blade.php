<!DOCTYPE html>
<html>
<head>
	<title>Rekap Bulanan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Rekap Bulanan</h5>
    <br>
	</center>
  <h7>Pengeluaran</h7>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Faktur</th>
				<th>Pengeluaran</th>
				<th>Saldo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pengeluaran as $key => $pengeluaran)
			<tr>
				<td>{{$pengeluaran->tanggal}}</td>
				<td>{{$pengeluaran->faktur}}</td>
				<td>{{$pengeluaran->harga}}</td>
				<td>{{$pengeluaran->saldo}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
  <h7>Pemasukan</h7>
  <table class='table table-bordered'>
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Faktur</th>
				<th>Pemasukan</th>
				<th>Saldo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pemasukan as $key => $pemasukan)
			<tr>
				<td>{{$pemasukan->tanggal}}</td>
				<td>{{$pemasukan->faktur}}</td>
				<td>{{$pemasukan->harga}}</td>
				<td>{{$pemasukan->saldo}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
