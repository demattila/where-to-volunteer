<!doctype html>
<html lang="en">
<head>
    <title>Terms</title>
    @include('layouts.head')
</head>

<body onload="scrolll()">
@include('layouts.header')

<!--================ Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Terms of Service</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<section class="section-top-border">
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{{session()->get('message')}}</li>
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <h2 class="my-5">Terms of Service</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{route('terms.create')}}" class="btn btn-success my-5">New Term</a>
            </div>
        </div>
        <h4 class="mb-3">Unpublished </h4>
        @foreach($unpublished_terms as $term)
            <div class="accordion" id="accordion">

                <div class="card">
                    <div class="card-header" id="heading{{$term->id}}">
                        <h2 class="mb-0">
                            <a class="btn btn-link"  type="button" data-toggle="collapse" data-target="#collapse{{$term->id}}" aria-expanded="false" aria-controls="collapse{{$term->id}}">
                               {{$term->name}}
                            </a>
                            <a href="#" style="float:right; color: #ae1c17" class="m-1 " onclick="event.preventDefault();
                                document.getElementById('delete-form-{{$term->id}}').submit();">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="{{route('terms.edit',$term)}}" style="float:right; color: #2a9055" class=" m-1 mr-4"><i class="fas fa-edit"></i></a>
                            <a href="#" style="float:right;" class="btn btn-primary m-1 mr-4" onclick="event.preventDefault();
                               document.getElementById('publish-form-{{$term->id}}').submit();">
                                Publish
                            </a>
                            <form id="publish-form-{{$term->id}}" action="{{route('terms.publish',$term)}}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <form id="delete-form-{{$term->id}}" action="{{route('terms.destroy',$term)}}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </h2>
                    </div>


                    <div id="collapse{{$term->id}}" class="collapse" aria-labelledby="heading{{$term->id}}" data-parent="#accordion">
                        <div class="card-body">
                            {{$term->content}}
                        </div>
                    </div>
                </div>
                {{--<a href="#" class="btn btn-primary m-1">Publish</a>--}}
                {{--<a href="#" class="btn btn-secondary m-1">Edit</a>--}}
                {{--<a href="#" class="btn btn-danger m-1">Delete</a>--}}
            </div>
        @endforeach
        <h4 class="mt-5 mb-3">Published </h4>
        @foreach($published_terms as $term)
                <div class="accordion" id="accordion">

                    <div class="card">
                        <div class="card-header" id="heading{{$term->id}}">
                            <h2 class="mb-0">
                                <a class="btn btn-link collapsed"  type="button" data-toggle="collapse" data-target="#collapse{{$term->id}}" aria-expanded="false" aria-controls="collapse{{$term->id}}">
                                    {{$term->published_at}} - {{$term->name}}
                                </a>
                            </h2>
                        </div>

                        <div id="collapse{{$term->id}}" class="collapse" aria-labelledby="heading{{$term->id}}" data-parent="#accordion">
                            <div class="card-body">
                                {{$term->content}}
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach

    </div>
</section>

<!--================ Start footer Area  =================-->
@include('layouts.footer')
<!--================ End footer Area  =================-->

@include('layouts.scripts')

</body>
</html>

