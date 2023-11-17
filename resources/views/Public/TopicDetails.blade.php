@include('Layout.header')

<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12 mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Homepage</a></li>

                        <li class="breadcrumb-item active" aria-current="page">{{$blogPost->trendcategory->category_name}}</li>
                    </ol>
                </nav>

                <h2 class="text-white">{{$blogPost->title}}</h2>

                <div class="d-flex align-items-center mt-5">
                    <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4">Read More</a>
                    @php
                    $userId = request()->cookie('user-id');
                    $isBookmarked = $userId && \App\Models\bookmark::where('user_id', $userId)->where('blog_id', $blogPost->blog_id)->exists();
                    @endphp
                   
                      {{-- {{ $isBookmarked ? 'Bookmarked' : 'Not Bookmarked' }} --}}
                      <a href="{{route('toggle.bookmark',$blogPost->blog_id)}}" class="bi bi-bookmark{{ $isBookmarked ? '-check-fill' : '' }} smoothscroll"  style="font-size: 30px;"></a>
                </div>
            </div>

            <div class="col-lg-5 col-12">
                <div class="topics-detail-block bg-white shadow-lg">
                    <img src="{{ '/storage/blogimages/'.$blogPost->banner_img}}" class="topics-detail-block-image img-fluid">
                </div>
            </div>

        </div>
    </div>
</header>


<section class="topics-detail-section section-padding" id="topics-detail">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 m-auto">
                <h3 class="mb-4">{{$blogPost->heading}}</h3>

                <p>{{$blogPost->blog_summary}}</p>

                <p>{{$blogPost->short_desc}}</p>

             

                <div class="row my-4">
                    @foreach($blogPost->blogimages as $image)
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ '/storage/blogimages/'.$image->blogimgs}}" class="topics-detail-block-image img-fluid">
                    </div>
                    @endforeach
                </div>

                <p>{{$blogPost->description}}</p>
            </div>

        </div>
    </div>
</section>


<section class="section-padding section-bg">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-5 col-12">
                <img src="images/rear-view-young-college-student.jpg" class="newsletter-image img-fluid" alt="">
            </div>

            <div class="col-lg-5 col-12 subscribe-form-wrap d-flex justify-content-center align-items-center">
                <form class="custom-form subscribe-form" action="{{url('/topic-details/' . $blogPost->blog_id)}}" method="post" role="form">
                    @csrf
                    <h4 class="mb-4 pb-2">User's Comments </h4>
                    <input type="hidden" name="userid" value="{{request()->cookie('user-id')}}">
                    <input type="hidden" name="username" value="{{request()->cookie('user_name')}}">
                    <input type="hidden" name="blog_id" value="{{$blogPost->blog_id}}">
                    <textarea name="comment"  class="form-control" placeholder="Enter your thoughts" required=""> </textarea>

                    <div class="col-lg-12 col-12">
                        <button type="submit" class="form-control">Submit</button>
                    </div>
                </form>
            </div>

        </div>
        <hr>
        <div class="comments">
          @foreach($commentpost as $commentData)
            <div class="media">           
                <div class="media-body">
                    <h6 class="mt-0">{{ $commentData->username}}</h6>
                    {{ $commentData->comment}}
                </div>
            </div><hr>
         @endforeach           
        </div>
    </div>

   

   
</section>
</main>

@include('Layout.footer')