@php
    use App\artikel;
    use App\User;
    $artikels = artikel::orderBy("created_at","DESC")->paginate(4);

@endphp

@extends('layouts.frontend')
@section("title")
My Blog
@endsection

@section('content')
    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area section_gap_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="/frontend/img/blog/cat-post/cat-post-1.jpg" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="/c/website"><h5>Web Development</h5></a>
                                <div class="border_line"></div>
                                <p>Enjoy your social life together</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="/frontend/img/blog/cat-post/cat-post-2.jpg" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="/c/games"><h5>Game Development</h5></a>
                                <div class="border_line"></div>
                                <p>Be a part of politics</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="/frontend/img/blog/cat-post/cat-post-3.jpg" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="/c/mobile"><h5>Mobile Development</h5></a>
                                <div class="border_line"></div>
                                <p>Let the food be finished</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->
    
    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">

                        @foreach ($artikels as $item)
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list">
                                        <li><a href="#">
                                        @php
                                            $user = User::find($item->user_id);
                                        @endphp
                                        {{ $user->name}}
                                        <i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">{{ date('d-M-Y', strtotime($item->created_at))}}<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="/img/{{$item->img}}" alt="{{ $item->judul}}">
                                    <div class="blog_details">
                                        <a href="/{{$item->slug}}"><h2>{{ $item->judul}}</h2></a>
                                        <div class="post_tag">
                                            <a href="#">{{$item->kategori }}</a>
                                        </div>
                                        <p>{!! str_limit($item->isi,200) !!}</p>
                                        <a href="{{$item->slug}}" class="primary_btn"><span>View More</span></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        @endforeach

                        {{ $artikels->links()}}
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('frontend.sidebar')
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
    @endsection