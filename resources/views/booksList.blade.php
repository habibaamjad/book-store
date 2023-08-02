<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>Welcome to the Book Store</h1>
  <p>Find any book of your choice!</p>
  <a href="{{route('createBook')}}">
    <button class="btn btn-light">Create Book</button>
    </a>
</div>
  
<div class="container mt-3">
  @if(session()->has("success"))
<div class="alert alert-success">
  <strong>Success!</strong> {{session()->get('success')}}
</div>
@endif
@if(session()->has("error"))
<div class="alert alert-danger">
  <strong>Success!</strong> {{session()->get('error')}}
</div>
@endif
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Author</th>
        <th>Created At</th>
        <th>Thumbnail</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

      @foreach($books as $book)
      <tr>
        <td>{{$book->id}}</td>
        <td>{{$book->title}}</td>
        <td>{{$book->description}}</td>
        <td>{{$book->price}}</td>
        <td>{{$book->user->name}}</td>
        <td>{{$book->created_at}}</td>
        <td>
          <img src="{{asset('images/'.$book->thumbnail)}}" height="100" width="100">
        </td>
        <td>
          <a href="{{route('editBook', $book->id)}}"><button class="btn btn-success btn-sm">Edit</button></a>
        </td>
        <td>
            <form action="{{route('deleteBook', $book->id)}}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
        
      </tr>
      @endforeach
      
    </tbody>
  </table>
  <div class="mb-5">
  {{ $books->links() }}
  </div>
</div>

</body>
</html>