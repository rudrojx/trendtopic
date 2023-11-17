@include('Admin.Layout.header')

  <section style="margin-left: -200px;">
    <h2 class="my-4">Edit Blog Details</h2>
    
    <form action="{{url('/update-blog')}}/{{$blogData->blog_id}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{$blogData->title}}" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="heading">Heading</label>
            <input type="text" class="form-control" name="heading" id="heading" placeholder="Enter heading" value="{{$blogData->heading}}" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="shortDescription">Short Description</label>
        <textarea class="form-control" id="shortDescription" name="short_desc" rows="2" placeholder="Enter short description" required>{{$blogData->short_desc}}</textarea>
      </div>

      <div class="form-group">
        <label for="longDescription">Long Description</label>
        <textarea class="form-control" id="longDescription" name="description" rows="4" placeholder="Enter long description" required>{{$blogData->description}}</textarea>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="blogSummary">Blog Summary</label>
            <textarea class="form-control" id="blogSummary" name="blog_summary" rows="3" placeholder="Enter blog summary" required>{{$blogData->blog_summary}}</textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="cat_id" required>
              <option value="{{$blogData->cat_id}}" selected>{{$blogData->trendcategory->category_name}}</option>
              @foreach($catdata as $category)
               <option value="{{ $category->cat_id }}">{{ $category->category_name }}</option>
               @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="bannerImage">Choose Banner Image :-</label>
        <input type="file" class="form-control-file" name="banner_img" id="bannerImage">
      </div>
      <div class="form-group">
        <label for="bannerImage"> Displaying Banner Image :- </label>
        <img src="{{ '/storage/blogimages/'.$blogData->banner_img}}" name="previous_image" value="{{$blogData->banner_img}}" alt="No image selected" style="width:100px;height:auto;">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  @include('Admin.Layout.footer')
