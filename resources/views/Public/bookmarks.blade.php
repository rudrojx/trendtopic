@include('Layout.header')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Homepage</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Bookmarks</li>
                    </ol>
                </nav>

                <h4 class="text-white">Showing Saved Bookmarks For - {{  request()->cookie('user_name') }}</h4>
            </div>

        </div>
    </div>
</header>


<section class="section-padding">
    <div class="container">
        <div class="row">
            @if(count($bookmarks) > 0)
            <div class="col-lg-8 col-12 mt-3 mx-auto">

                @foreach($bookmarks as $item)
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="{{ '/storage/blogimages/'.$item->blogdata->banner_img}}" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">{{$item->blogdata->title}}</h5>

                                <p class="mb-0">{{$item->blogdata->blog_summary}}</p>

                                <a href="{{ route('blog.show', ['id' => $item->blogdata->blog_id]) }}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                            </div>

                            <span class="badge bg-design rounded-pill ms-auto">{{$item->blogdata->blog_id}}</span>
                        </div>
                    </div>
                </div>           

                @endforeach
            </div>
            @else
            <p>No results found.</p>
            @endif
            {{-- <div class="col-lg-12 col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item">
                            {{ $results->render() }}
                        </li>                       
                    </ul>
                </nav>
            </div> --}}

        </div>
    </div>
</section>
</main>
@include('Layout.footer')