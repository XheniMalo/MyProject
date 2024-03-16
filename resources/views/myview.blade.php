<h3>Matching or not?</h3>
<table border="1">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Username</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Address</td>
        <td>Match Id</td>
    </tr>

    @foreach($data as $peopleinfo)
    <tr>
      <td>{{$peopleinfo['id']}}</td>  
      <td>{{$peopleinfo['name']}}</td>
      <td>{{$peopleinfo['username']}}</td>
      <td>{{$peopleinfo['email']}}</td>
      <td>{{$peopleinfo['phone']}}</td>
      <td>{{$peopleinfo['address']}}</td>
      <td>{{$peopleinfo['match_id']}}</td>
    </tr>
    @endforeach

</table>
