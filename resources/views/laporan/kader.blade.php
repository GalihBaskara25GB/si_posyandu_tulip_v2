<html>
<head>
	<title>Laporan Data Kader</title>
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
		<h5>Laporan Data Kader</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Nama</th>
        <th class="font-weight-bold">Alamat</th>
        <th class="font-weight-bold">TTL</th>
        <th class="font-weight-bold">Jenis Kelamin</th>
        <th class="font-weight-bold">No. Telepon</th>
        <th class="font-weight-bold">Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach ($kaders as $kader)
        <tr>
					<th class="font-weight-bold">{{ $i++ }}</th>
					<td>{{ $kader->nama }}</td>
					<td>{{ $kader->alamat }}</td>
					<td>{{ $kader->tempat_lahir.', '.date('d M Y', strtotime($kader->tanggal_lahir)) }}</td>
					<td>{{ $kader->jenis_kelamin }}</td>
					<td>{{ $kader->nomor_telepon }}</td>
					<td>{{ ($kader->is_verified) ? 'Sudah' : 'Belum' }} Diverifikasi</td>
        </tr>
      @endforeach
		</tbody>
	</table>

</body>
</html></textarea>