@include('Layout.header')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Homepage</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Topics Listing</li>
                    </ol>
                </nav>

                <h2 class="text-white">Topics Listing</h2>
            </div>

        </div>
    </div>
</header>


<section class="section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Popular Topics</h3>
            </div>

            <div class="col-lg-8 col-12 mt-3 mx-auto">

                @foreach($data as $item)
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="{{ '/storage/blogimages/'.$item->banner_img}}" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">{{$item->title}}</h5>

                                <p class="mb-0">{{$item->blog_summary}}</p>

                                <a href="{{ route('blog.show', ['id' => $item->blog_id]) }}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                            </div>

                            <span class="badge bg-design rounded-pill ms-auto">{{$item->blog_id}}</span>
                        </div>
                    </div>
                </div>           

                @endforeach
            </div>

            <div class="col-lg-12 col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item">
                            {{ $data->render() }}
                        </li>                       
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</section>


<section class="section-padding section-bg">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h3 class="mb-4">Trending Topics</h3>
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <a href="{{ route('blog.show', ['id' => $shuffledBlogData->blog_id]) }}">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-2">{{$shuffledBlogData->title}}</h5>

                                <p class="mb-0">{{$shuffledBlogData->blog_summary}}</p>
                            </div>

                            <span class="badge bg-finance rounded-pill ms-auto">{{$shuffledBlogData->blog_id}}</span>
                        </div>

                        <img src="{{ '/storage/blogimages/'.$shuffledBlogData->banner_img}}" class="custom-block-image img-fluid" alt="">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-lg-3">
                <div class="custom-block custom-block-overlay">
                    <div class="d-flex flex-column h-100">
                        <img src="{{ '/storage/blogimages/'.$secondBlogPost->banner_img}}" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-overlay-text d-flex">
                            <div>
                                <h5 class="text-white mb-2">{{$secondBlogPost->title}}</h5>

                                <p class="text-white">{{$secondBlogPost->blog_summary}}</p>

                                <a href="{{ route('blog.show', ['id' => $secondBlogPost->blog_id]) }}" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                            </div>

                            <span class="badge bg-finance rounded-pill ms-auto">{{$secondBlogPost->blog_id}}</span>
                        </div>

                        <div class="social-share d-flex">
                            <p class="text-white me-4">Share:</p>

                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-pinterest"></a>
                                </li>
                            </ul>

                            <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                        </div>

                        <div class="section-overlay"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</main>
@include('Layout.footer')