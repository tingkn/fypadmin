<style>
table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background-color: #ddd;
}

thead th {
  font-weight: bold;
  text-align: left;
  padding: 8px;
  border: 1px solid #ccc;
}

tbody td {
  padding: 8px;
  border: 1px solid #ccc;
}

tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>

<table>
    <thead>
        <tr>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($newsletter as $newsletter)
            <tr>
                <td>{{ $newsletter->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
