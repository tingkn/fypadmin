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
            <th>Title</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>{{ $blog->title }}</td>
                <td>{!! $blog->content !!}</td>
            </tr>
        @endforeach
    </tbody>
</table>
