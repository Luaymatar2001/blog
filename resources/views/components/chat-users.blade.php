<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    @foreach ($users as $item)


    <a href="{{route('show.chat',$item->id)}}" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
            <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
                <h3 class="dropdown-item-title">
                    {{$item->name}} </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$item->updated_at->diffForHumans()}}
                </p>
            </div>
        </div>
        <!-- Message End -->
    </a>

    @endforeach


    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
</div>