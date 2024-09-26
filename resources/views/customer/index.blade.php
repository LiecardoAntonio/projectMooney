<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>
  <div>Customer - Index</div>

  <br>

  <table border="1">
    <thead>
      <td>id</td>
      <td>username</td>
      <td>email</td>
      <td>password</td>
    </thead>
    @foreach ($customers as $customer)
      <tr>
        <td>{{$customer->id}}</td>
        <td>{{$customer->username}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->password}}</td>
      </tr>
    @endforeach
  </table>

</body>
</html>