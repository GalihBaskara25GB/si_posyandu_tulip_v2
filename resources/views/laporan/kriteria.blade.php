<html>
<head>
	<title>Laporan Data Kriteria</title>
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
		<h5>Laporan Data Kriteria</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Nama</th>
        <th class="font-weight-bold">Status</th>
				@foreach ($objekKriterias as $objekKriteria)
					<th class="font-weight-bold">{{ $objekKriteria->name }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach ($kriterias as $kriteria)
        <tr>
					<th class="font-weight-bold">{{ $i++ }}</th>
					<td>{{ $kriteria->kader->nama }}</td>
					<td>{{ ($kriteria->kader->is_verified) ? 'Sudah' : 'Belum' }} Diverifikasi</td>
					@foreach ($objekKriterias as $objekKriteria)
					@php
						echo '<td>'.$rowByKaderId[$kriteria->kader_id][$objekKriteria->id].'</td>';
					@endphp
					@endforeach
        </tr>
      @endforeach
		</tbody>
	</table>

</body>
</html></textarea>