<html>
<head>
	<title>Laporan Data Rangking Calon Kader</title>
	<link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Data Rangking Calon Kader</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th class="font-weight-bold">Rangking</th>
				<th class="font-weight-bold">Nilai Preferensi</th>
				<th class="font-weight-bold">Nama Kader</th>
				<th class="font-weight-bold">Nomor Telepon</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach ($rangkings as $rangking)
        <tr>
					<th>{{$rangking->getRank()}}</th>
					<th>{{$rangking->nilai_preferensi}}</th>
					<th>{{$rangking->kader->nama}}</th>
					<th>{{$rangking->kader->nomor_telepon}}</th>
        </tr>
      @endforeach
		</tbody>
	</table>

</body>
</html></textarea>