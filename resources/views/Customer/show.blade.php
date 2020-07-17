<html>
<head>
    <title> Customer Details</title>
</head>
<body>
<h1>Customers Details</h1>
<a href="/customers">back</a><br>
<a href="/customers/{{$customer->id}}/edit">edit</a><br>

<form action="/customers/{{$customer->id}}" method="post">
    @method('DELETE')
    @csrf
    <button>Delete</button>
</form>

<br><br><br>
<b>Name:</b> {{$customer->name}} <br>
<b>Email:</b> {{$customer->email}} <br>
<b>Note:</b> {{$customer->text}} <br>
<b>Time:</b> {{$customer->created_at}} <br>

</body>
</html>
