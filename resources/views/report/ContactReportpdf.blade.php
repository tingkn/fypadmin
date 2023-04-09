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
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contact as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->content }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
