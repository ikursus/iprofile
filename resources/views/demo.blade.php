<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Umur</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($senaraiPelajar as $pelajar)
        <tr>
            <td>{{ $pelajar['id'] }}</td>
            <td>{{ $pelajar['nama'] }}</td>
            <td><?php echo $pelajar['umur'];?></td>
        </tr>
        @endforeach
    </tbody>
</table>