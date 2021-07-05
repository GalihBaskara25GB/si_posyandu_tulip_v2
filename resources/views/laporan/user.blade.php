<html>
<head>
	<title>Laporan Data User</title>
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
		<h5>Laporan Data User</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Username</th>
        <th class="font-weight-bold">Nama</th>
        <th class="font-weight-bold">No. Telepon</th>
        <th class="font-weight-bold">Role</th>
        <th class="font-weight-bold">Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach ($users as $user)
        <tr>
					<th class="font-weight-bold">{{ $i++ }}</th>
					<td>{{ $user->username }}</td>
					<td>{{ $user->kader->nama }}</td>
					<td>{{ $user->kader->nomor_telepon }}</td>
					<td>{{ ucfirst($user->role) }}</td>
					<td>{{ ($user->kader->is_verified) ? 'Sudah' : 'Belum' }} Diverifikasi</td>
        </tr>
      @endforeach
		</tbody>
	</table>

</body>
</html></textarea>