<html>
<head>
    <title> Edit User</title>
</head>
<body>
<h1>Edit Current User</h1>
<br>
<form action="/customers/{{$customer->id}}" method="post">
    @method('PATCH')

    @include('customer.form')

    <button>Save</button>
    <br>

</form>
</table>
</body>
</html>
