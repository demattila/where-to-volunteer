<!doctype html>
<html lang="en">
<head>
    <title>Users</title>
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
                <h2>Manage Users</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<section class="section-top-border">
    <div class="container">
        @include('layouts.message')
        <div class="row">
            <div class="col-md-6">
                <h2 class="my-5">Manage Users</h2>
            </div>
        </div>
        <h4 class="mb-3">Volunteers </h4>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($volunteers as $volunteer)
                <tr>
                    <th scope="row">{{$volunteer->id}}</th>
                    <td>{{$volunteer->name}}</td>
                    <td>{{$volunteer->email}}</td>
                    <td>
                        <a href="#" class="genric-btn btn-danger small" onclick="event.preventDefault();
                                document.getElementById('delete-volunteer-{{$volunteer->id}}').submit();">
                            Delete
                        </a>
                    </td>
                </tr>
                <form id="delete-volunteer-{{$volunteer->id}}" action="{{route('users.destroy',['type' => 'volunteer', 'id' => $volunteer->id])}}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                @endforeach
            </tbody>
        </table>

        <h4 class="mt-5 mb-3">Organizations </h4>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($organizations as $organization)
                <tr>
                    <th scope="row">{{$organization->id}}</th>
                    <td>{{$organization->name}}</td>
                    <td>{{$organization->email}}</td>
                    <td>
                        <a href="#" class="genric-btn btn-danger small " onclick="event.preventDefault();
                                document.getElementById('delete-organization-{{$organization->id}}').submit();">
                            Delete
                        </a>
                    </td>
                </tr>
                <form id="delete-organization-{{$organization->id}}" action="{{route('users.destroy',['type' => 'organization', 'id' => $organization->id])}}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
            </tbody>
        </table>

    </div>
</section>

<!--================ Start footer Area  =================-->
@include('layouts.footer')
<!--================ End footer Area  =================-->

@include('layouts.scripts')

</body>
</html>

