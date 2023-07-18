<x-PageMenu breadcrumbs1="blog page">

    @foreach ($news as $item)


    <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
        <div class="inner-box">
            <div class="image">
                <a href="blog-detail.html"><img src="{{$item->image_url}}" alt="" /></a>
            </div>
            <div class="lower-content">
                <div class="content">
                    <ul class="post-info">
                        <li><span class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span>
                            {{$item->reviews()->count()}}</li>
                        {{-- <li><span class="icon flaticon-heart"></span> 126</li> --}}
                    </ul>
                    <ul class="post-meta">
                        <li>{{$item->time_format}}</li>
                        <li>Post By: {{$item->user->name}}</li>
                        <li>
                            <ul class="review">
                                @php
                                $starRating = $item->reviews()->count() > 0 ?
                                ceil( $item->reviews()->sum('rate')/$item->reviews()->count())
                                : 0;

                                @endphp

                                @for ($i = 0; $i < 5; $i++) @if ($i < $starRating) <li><i class="fas fa-star"
                                        style="color: #e5e7eb;"></i>
                        </li>
                        @else
                        <li><i class="far fa-star" style="color: #e5e7eb;"></i></li>
                        @endif
                        @endfor
                    </ul>
                    </li>
                    </ul>
                    <h3><a href="blog-detail.html">{{$item->title}}</a>
                    </h3>
                    <div class="text">{{$item->subject}}</div>
                    <a href="{{route('news.show' , $item->slug)}}" class="theme-btn btn-style-five"><span
                            class="txt">read
                            more</span></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-PageMenu>