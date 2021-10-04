<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
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
            <!-- <td><a href="/edit/{{$user->id}}" type="button" class="btn btn-primary ">Edit</a> -->
           <td> <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editmodal-{{$user->id}}">Edit </button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#deletemodal-{{$user->id}}">Delete </button>
        </td>
        </tr>
        @endforeach

    </tbody>
</table>
@foreach($users as $user)

<div class="modal fade" id="editmodal-{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
             <div class="modal-body">       
                 <form action="{{route('update-post')}}" method="post">
                         <input type="hidden" name="id" value="{{$user->id}}">
                             <div class='container'>
                                 <div class="form-group-row">
                                     <div class="form-group col-md-6">
                                        <label for="inputName">Name</label>
                                         <input type="text" class="form-control"name="name" id="inputName"  value="{{$user->name}}">
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="inputPost">Post</label>
                                        <input type="text" class="form-control" name="post" id="inputPost" value="{{$user->post}}">
                                     </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputComments">Comments</label>
                                        <input type="text" class="form-control" name="comment" id="inputComments" value="{{$user->comment}}">
                                     </div>
                                 </div>
                                    <button type="submit" class="btn btn-primary">Update Post</button>
                             </div>
                 </form> 
             </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="deletemodal-{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
         <div class="modal-body">
                <p>Are you sure want to delete</p>
                <form method="POST" action="{{route('delete-post')}}">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    @csrf
                    <div class="row">
                        <div class="col s12 display-flex justify-content-end form-action">
                            <button type="submit" class="btn gradient-45deg-purple-deep-purple waves-effect waves-light mr-1 btn-success">Confirm
                            </button>
                            <button type="reset" class="modal-action modal-close btn red waves-effect waves-light">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
  </div>
</div>

@endforeach


                       
</body>
</html>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>