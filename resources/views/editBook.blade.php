<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-secondary text-white text-center">
  <h1>Edit Book</h1>
  <p>Resize this responsive page to see the effect!</p> 
  <a href="{{route('home')}}">
    <button class="btn btn-dark">All Books</button>
    </a>
</div>

<div class="container mb-5 ">
<form action="{{route('updateBook', $book->id)}}" method="POST">
  @csrf 
  @method("PUT")
  <div class="mb-3 mt-3">
    <label for="title" class="form-label">Title:</label>
    <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{$book->title}}">
    @error("title")
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Description:</label>
    <input type="text" class="form-control" id="pwd" placeholder="Enter book description" name="description" value="{{$book->description}}">
    @error("description")
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Price:</label>
    <input type="price" class="form-control" id="pwd" placeholder="Enter price" name="price" value="{{$book->price}}">
    @error("price")
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Author:</label>
    <input type="text" class="form-control" id="pwd" placeholder="Enter author" name="author" value="{{$book->author}}">
    @error("author")
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
  


</body>
</html>