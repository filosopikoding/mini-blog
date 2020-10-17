@extends('layouts.main')

@section('content')
@if($post)
<div class="site-cover site-cover-sm same-height overlay single-page" 
  style="background-image: url('{{ asset('miniblog/images/'.$post->image) }}');">
  <div class="container">
    <div class="row same-height justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="post-entry text-center">
          <span class="post-category text-white bg-success mb-3">{{ $post->user->email }}</span>
          <h1 class="mb-4"><a href="#">{{ $post->title }}</a></h1>
          <div class="post-meta align-items-center text-center">
            <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{ asset('miniblog/images/person_'.$post->user->id. '.jpg') }}" alt="{{ $post->user->name }}" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
            <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="site-section py-lg">
  <div class="container">
    <div class="row blog-entries element-animate">
      <div class="col-md-12 col-lg-8 main-content">
        
        <div class="post-content-body">
          <p>{{ $post->content }}</p>
        </div>

        @include('posts.comment')
      </div>
      <!-- END main-content -->

      <div class="col-md-12 col-lg-4 sidebar">
        <!-- END sidebar-box -->  
        <div class="sidebar-box">
          <h3 class="heading">Popular Posts</h3>
          <div class="post-entry-sidebar">
            <ul>
              <li>
                <a href="">
                  <img src="{{ asset('miniblog/images/Post_Image_1.jpg') }}" alt="Image placeholder" class="mr-4">
                  <div class="text">
                    <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                    <div class="post-meta">
                      <span class="mr-2">March 15, 2018 </span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="">
                  <img src="{{ asset('miniblog/images/Post_Image_2.jpg') }}" alt="Image placeholder" class="mr-4">
                  <div class="text">
                    <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                    <div class="post-meta">
                      <span class="mr-2">March 15, 2018 </span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="">
                  <img src="{{ asset('miniblog/images/Post_Image_3.jpg') }}" alt="Image placeholder" class="mr-4">
                  <div class="text">
                    <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                    <div class="post-meta">
                      <span class="mr-2">March 15, 2018 </span>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- END sidebar-box -->

        <div class="sidebar-box">
          <h3 class="heading">Tags</h3>
          <ul class="tags">
            <li><a href="#">Travel</a></li>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Food</a></li>
            <li><a href="#">Lifestyle</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Freelancing</a></li>
          </ul>
        </div>
      </div>
      <!-- END sidebar -->
    </div>
  </div>
</section>
@else
<div class="alert-danger text-center p-2">
  <p>Postingan tidak ditemukan..</p>
  <a href="/" class="post-category text-white bg-primary mb-3">Kembali</a>
</div>
@endif
@endsection