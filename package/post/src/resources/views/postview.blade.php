<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<form action="{{route('add-post')}}" method="post">
<div class='container'>
  <div class="form-group-row">
    <div class="form-group col-md-6">
      <label for="inputName">Name</label>
      <input type="text" class="form-control"name="name" id="inputName">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPost">Post</label>
      <input type="text" class="form-control" name="post" id="inputPost">
    </div>
    <div class="form-group col-md-6">
      <label for="inputComments">Comments</label>
      <input type="text" class="form-control" name="comment" id="inputComments">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Add Post</button>
 </div>
</form>
</body>
</html>