<table class="table table-bordered">
    <thead>
      <p>Message from {{$detail->name}}</p>
    </thead>
    <tbody>
      <tr class="success">
        <td>Name</td>
        <td>{{$detail->name}}</td>
      </tr>
      <tr class="success">
        <td>Email</td>
        <td>{{$detail->email}}</td>
      </tr>
      <tr class="success">
        <td>Subject</td>
        <td>{{ $detail->subject}}</td>
      </tr>
      <tr class="success">
        <td>Message</td>
        <td>{{$detail->message}}</td>
      </tr>

    </tbody>
  </table>
