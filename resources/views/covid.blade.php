<!DOCTYPE html>
<html lang="en">
<head>
  <title>COVID-19 Statistics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <h1 class="display-3">COVID-19 Statistics</h1>
  <table class="table" id="example">
    <thead class="thead-dark">
      <tr>
        <th>State</th>
        <th>Active</th>
        <th>Cured</th>
        <th>Deaths</th>
        <th>Total Cases</th>
      </tr>
    </thead>
    <tbody>
       @foreach($respon as $respon)
      <tr>
        <td class="table-primary">{{$respon->state}}</td>
        <td class="table-danger">{{$respon->active}}</td>
        <td class="table-success">{{$respon->cured}}</td>
        <td class="table-active">{{$respon->deaths}}</td>
        <td>{{$respon->noOfCases}}</td>
      </tr>
      @endforeach
    </tbody>
    <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable();
} );
      
    </script>
  </table>
</div>


</body>
</html>
