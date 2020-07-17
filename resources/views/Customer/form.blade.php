@csrf
<label>Name:
    <input type="text" name="name" autocomplete="off" value ={{old('name') ?? $customer->name}}>
</label><br>
<p style="color:#ff0000;">@error('name'){{$message}} @enderror</p>

<label>Email:
    <input type="text" name="email" autocomplete="off" value ={{old('email') ?? $customer->email}}>
</label><br>
<p style="color:#ff0000;">@error('email'){{$message}} @enderror</p>
