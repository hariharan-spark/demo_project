<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <title>Post CRUD</title>
</head>
<body>
<a href="#" class="btn btn-primary deletebtn" style="margin-top: 1rem;">File Upload</a>
<a href="/post" class="btn btn-secondary deletebtn top corner" style="margin-top:1rem;float:right;">Add Post</a>
<table class="table table-bordered table-striped table-dark">
  
    <table id="myTable" class="display">
    <thead>
        <tr>
        <th scope="col">Name</th>
            <th scope="col">Post</th>  
            <th scope="col">Comment</th>  
            <th class="text-right">Action</th>  
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr >
            <td>{{$user->name}}</td>
            <td>{{$user->post}}</td>
            <td>{{$user->comment}}</td>
            <td><a href="/edit/{{$user->id}}" type="button" class="btn btn-primary ">Edit</a>
                <a href="/delete/{{$user->id}}" class="btn btn-danger deletebtn">Delete</a></td>
        </tr>
        @endforeach

    </tbody>
</table>
</body>
</html>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>