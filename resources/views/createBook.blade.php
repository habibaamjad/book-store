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
  <h1>Book Store</h1>
  <p>Resize this responsive page to see the effect!</p> 
  <a href="{{url('get-book')}}">
    <button class="btn btn-light">All Books</button>
    </a>
</div>

<div class="container mb-5 ">
<form action="{{route('storeBook')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3 mt-3">
    <label for="title" class="form-label">Title:</label>
    <input type="text" class="form-control" placeholder="Enter title" name="title">
    @error("title")
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Description:</label>
    <input type="text" class="form-control" id="pwd" placeholder="Enter book description" name="description">
    @error("description")
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Price:</label>
    <input type="price" class="form-control" id="pwd" placeholder="Enter price" name="price">
    @error("price")
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Author:</label>
    <input type="text" class="form-control" id="pwd" placeholder="Enter author" name="author">
    @error("author")
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image:</label>
    <input type="file" class="form-control" id="image" placeholder="Enter author" name="image">
    @error("image")
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  


</body>
</html>