@extends('layouts.admin')

@section('title' , 'create new logo')
@section('content')
<div class="container">
    @if (session()->has('status'))
    @if (session('status'))
    <script>
        $(document).ready(function() {
                                            swal({
                                                icon: "success",
                                                text: "Adding a new logo has been completed successfully!"
                                            })
                                        });
    </script>
    @else
    <script>
        swal("Faild to add new logo row", {
                                            className: "red-bg",
                                        });
    </script>
    @endif
    @endif

    <form action="{{route('about.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <x-input type='text' label='news name' id='name' name='name' />

        <x-input type='file' label='news logo' id='logo' name='logo' />
        {{-- <input type="image" class="form-control" name="image" id="image" placeholder="news image"> --}}

        <button type="submit" class="btn btn-primary">publish</button>
    </form>
</div>

@endsection