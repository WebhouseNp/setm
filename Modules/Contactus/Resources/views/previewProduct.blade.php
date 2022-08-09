<table class="table table-bordered">
    <thead>
      <p>Request For {{ @$detail->product->title }}</p>
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
        <td>Phone Number</td>
        <td>{{$detail->phone_no}}</td>
      </tr>
      <tr class="success">
        <td>Product Name</td>
        <td>{{ @$detail->product->title }}</td>
      </tr>
      <tr class="success">
        <td>Message</td>
        <td>{{$detail->message}}</td>
      </tr>

    </tbody>
  </table>
