<a class="nav-link" data-toggle="dropdown" href="#">
    {{-- <i class="far fa-comments"></i> --}}
    <i class="fas fa-bell fa-lg"></i>
    <span class="badge badge-danger navbar-badge" id="unread_count">{{$unread}}</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="div_notification">
    @foreach ($notifications as $item)
    <a href="{{$item->data['link']}}?nid={{$item->id}}#{{$item->data['ID'] ?? 0}}" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
            {{-- {{$item->data['icon']}} --}}
            <div class="mr-3">
                <i class="{{$item->data['icon']}} fa-2x"></i>
            </div>
            {{-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
            <div class="media-body">
                <h3 class="dropdown-item-title">
                    {{-- {{$item->data['name']}} --}}
                    {{-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> --}}
                </h3>
                <p class="text-sm">{{$item->data['body']}}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$item->updated_at->diffForHumans()}}
                </p>
            </div>
        </div>
        <!-- Message End -->
    </a>
    <div class="dropdown-divider"></div>

    @endforeach

    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
</div>