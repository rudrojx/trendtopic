<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Add Blog Details</title>
  <style>
    /* Add your custom styles here */
    body {
      padding: 20px;
    }
    .form-group {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2 class="my-4">Add Blog Details</h2>
    
    <form action="{{url('/storeblogs')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="heading">Heading</label>
            <input type="text" class="form-control" name="heading" id="heading" placeholder="Enter heading" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="shortDescription">Short Description</label>
        <textarea class="form-control" id="shortDescription" name="short_desc" rows="2" placeholder="Enter short description" required></textarea>
      </div>

      <div class="form-group">
        <label for="longDescription">Long Description</label>
        <textarea class="form-control" id="longDescription" name="description" rows="4" placeholder="Enter long description" required></textarea>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="blogSummary">Blog Summary</label>
            <textarea class="form-control" id="blogSummary" name="blog_summary" rows="3" placeholder="Enter blog summary" required></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="cat_id" required>
              <option value="" selected disabled>Select category</option>
              @foreach($catdata as $category)
               <option value="{{ $category->cat_id }}">{{ $category->category_name }}</option>
               @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="bannerImage">Banner Image</label>
        <input type="file" class="form-control-file" name="bannerimage" id="bannerImage" required>
      </div>

      <div class="form-group">
        <label for="bannerImagess">Blog Image Multiple</label>
        <input type="file" class="form-control-file" name="blogimgs[]" multiple required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
