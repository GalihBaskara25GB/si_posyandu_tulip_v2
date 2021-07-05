<html>
<head>
	<title>Laporan Data Objek Kriteria</title>
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
		<h5>Laporan Data Objek Kriteria</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Nama</th>
        <th class="font-weight-bold">Tipe Jawaban</th>
        <th class="font-weight-bold">Keterangan</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach ($objekKriterias as $objekKriteria)
        <tr>
					<th class="font-weight-bold">{{ $i++ }}</th>
					<td>{{ $objekKriteria->name }}</td>
					<td>
					<td>
						@php
							$types = explode('_', strtoupper($objekKriteria->type));
							foreach($types as $type) {
								echo '<li>'.$type.'</li>';
							}
						@endphp
					</td>
					<td>{{ $objekKriteria->keterangan }}</td>
        </tr>
      @endforeach
		</tbody>
	</table>

</body>
</html></textarea>