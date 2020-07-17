<html>
<head>
    <title> Index</title>
</head>
<body>
<h1>Customers</h1>
<br>
<h3>
    <a href="/customers/create">Add New</a>
    <a href="/customers?active=1">Active</a>
    <a href="/customers?active=0">Inactive</a>
</h3>

<table border="1">
    <tr>
        <td><b>Name</b></td>
        <td><b>Email</b></td>
    </tr>
    <tr>
        @forelse($customers as $customer)
            <td>
                <a href="/customers/{{$customer->id}}">{{$customer->name}} </a>
            </td>
            <td>{{$customer->email}}</td>
    </tr>
    @empty <tr>
                <td colspan="2">
                    <p> No Customer To Show</p>
                </td>
            </tr>

    @endforelse
</table>
</body>
</html>
