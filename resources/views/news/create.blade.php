@extends('layouts.admin')

@section('title' , 'create new news')
@section('content')
<div class="container">
    @if (session()->has('status'))
    @if (session('status'))
    <script>
        $(document).ready(function() {
                                            swal({
                                                icon: "success",
                                                text: "Adding a new product has been completed successfully!"
                                            })
                                        });
    </script>
    @else
    <script>
        swal("Faild to add new product row", {
                                            className: "red-bg",
                                        });
    </script>
    @endif
    @endif

    <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <x-input type='text' label='news title' id='title' name='title' />

        <x-input type='file' label='news image' id='image' name='image' />
        {{-- <input type="image" class="form-control" name="image" id="image" placeholder="news image"> --}}
        <x-input type='text' label='news source news' id='source_news' name='source_news' />
        {{-- <x-form.input type='text' label='news subject' id='subject' name='subject' /> --}}
        <div class=" mb-3">
            <textarea name="subject" id="subject" cols="30" rows="10"
                class="form-control @error('subject') is-invalid @enderror"
                placeholder='news subject'>{{old('subject' , 'news subject') }} </textarea>
            <x-errors name="subject" />
        </div>
        <button type="submit" class="btn btn-primary">publish</button>
    </form>
</div>

@endsection