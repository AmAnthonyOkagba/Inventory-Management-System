<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
                {{-- <a class="btn btn-primary" href="{{route('admin.users')}}">
                    Back
                </a> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<hr>

<div class="container">
    <div class="card">
        <div class="container">
            <div class="row pb-5">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        {{-- <div class="panel-heading">
                            All users
                        </div> --}}
                        <div class="panel-body">
                            @if (Session::has('user_message'))
                                <div class="alert alert-success" role="alert">{{Session::get('user_message')}}</div>
                            @endif
                            <div class="card-body table-sm table-responsive p-0">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Date Registered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->created_at}}</td>
                                                {{-- <td>
                                                    <a href="{{route('admin.userdetails',['user_id'=>$user->id])}}" class="btn btn-primary">Details</a>
                                                    <div class="dropdown">
                                                        <form action="" method="post">
                                                            <button id="my-dropdown" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status</button>
                                                            <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                                                <a class="dropdown-item" href="{{route('admin.users',['status'=>'delivered'])}}">delivered</a>
                                                                <a class="dropdown-item" href="#" wire:click.prevent="updateuserstatus({{$user->id}},'canceled')">canceled</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
