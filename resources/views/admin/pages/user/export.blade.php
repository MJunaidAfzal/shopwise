<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Date Of Birth</th>
        <th>Type</th>
        <th>Registration Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $index=>$user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->image }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->type }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
