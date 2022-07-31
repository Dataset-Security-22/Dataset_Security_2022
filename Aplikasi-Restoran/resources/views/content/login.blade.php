<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <center>
    <form method="POST" action="{{ url('/signin') }}">
      {{ csrf_field() }}
      <table>
        <tr>
          <td>
            <label> Username </label>
          </td>
          <td>
            <input type="text" name="username" placeholder="Username">
          </td>
        </tr>
        <tr>
          <td>
            <label> Password </label>
          </td>
          <td>
            <input type="password" name="password" placeholder="Password">
          </td>
        </tr>
        <tr>
          <td>
            <button type="submit"> Login </button>
          </td>
        </tr>
      </table>
    </form>
  </center>

</body>
</html>