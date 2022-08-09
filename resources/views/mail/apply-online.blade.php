<html>

<body>
    <h4>Child Detail</h4>
    <table border="0">
        <tr>
            <th>Hear : </th>
            <td>{{ $hear }}</td>
        </tr>
        <tr>
            <th>Comment</th>
            <td>{{ $comment }}</td>
        </tr>
        <tr>
            <th>Name : </th>
            <td>{{ $child_firstname }} {{ $child_lastname }}</td>

        </tr>
        <tr>
            <th>Preferred Name</th>
            <td>{{ $child_preffered_name }}</td>
        </tr>
        <tr>
            <th>Gender : </th>
            <td>{{ $gender }}</td>
        </tr>
        <tr>
            <th>Date of Birth : </th>
            <td>{{ $dob }}</td>
        </tr>
        <tr>
            <th>Birth Palace : </th>
            <td>{{ $birthplace }}</td>
        </tr>
        <tr>
            <th>Current Grade : </th>
            <td>{{ $current_grade }}</td>
        </tr>
        <tr>
            <th>Apply Grade : </th>
            <td>{{ $apply_grade }}</td>
        </tr>
        <tr>
            <th>Year Applying : </th>
            <td>{{ $year_applying }}</td>
        </tr>
    </table>
    <h4>Parent Detail</h4>
    <table border="0">
        <tr>
            <th>Mr/Miss/Mrs : </th>
            <td>{{ $title }}</td>
        </tr>
        <tr>
            <th>Name : </th>
            <td>{{ $first_name }} {{ $last_name }}</td>
        </tr>
        <tr>
            <th>Phone : </th>
            <td>{{ $phone }}</td>
        </tr>
        <tr>
            <th>Email : </th>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <th>Residence : </th>
            <td>{{ $residence }}</td>
        </tr>
        <tr>
            <th>
                Address :
            </th>
            <td>{{ $address }}</td>
        </tr>

    </table>
</body>

</html>
