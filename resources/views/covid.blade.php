      <?php $count = 0;
?>
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
        <td class="table-primary" data-toggle="modal" data-target="#myModal-{{$respon->state}}">{{$respon->state}}</td>
        <td class="table-danger" data-toggle="modal" data-target="#myModal">{{$respon->active}}</td>
        <td class="table-success" data-toggle="modal" data-target="#myModal">{{$respon->cured}}</td>
        <td class="table-active" data-toggle="modal" data-target="#myModal">{{$respon->deaths}}</td>
        <td data-toggle="modal" data-target="#myModal">{{$respon->noOfCases}}</td>
         </tr>
       </tbody>

<div class="modal fade" id="myModal-{{$respon->state}}" role="dialog">

    <div class="modal-dialog">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <p>{{$respon->state}}</p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
<p>{{$respon->state}}</p>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  {{$count++}}
 @endforeach
</table>
</div>
</body>
</html>
