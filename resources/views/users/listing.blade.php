@extends('layouts.app')

@section('content')


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>View User</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a>Home</a></li>
                            <li class="breadcrumb-item active">User Management</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-md-offset-3">
                        @include('partials.flash_message')
                    </div>
                </div>
            </div>
        </section>



        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User List</h3>
                            </div>

                            <div class="card-body p-0">

                                <div class="table-responsive">
                                     
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>User Role</th>
                                                <th>Email</th>
                                                <th>Default Currency</th>
                                                <th>Default Brand</th>
                                                <th>Supervisor</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                            @foreach ($users as $key => $value)
                                            <tr>
    
                                                <td>{{ $value->name }}</td>
                                                <td style="text-transform: capitalize;">{{ $value->getRole->name ?? null }}
                                                <td>{{ $value->email }}</td>
                                                <td>{{ !empty($value->getCurrency->code) && !empty($value->getCurrency->name) ? $value->getCurrency->code . ' - ' . $value->getCurrency->name : null }}</td>
                                                <td>{{ $value->getBrand->name ?? null }}</td>
                                                <td>{{ $value->getSupervisor->name ?? null }}</td>
                                                <td>
                                                    <form method="post" action="{{ route('users.delete', encrypt($value->id)) }}">
                                                    <a href="{{ route('users.edit', encrypt($value->id)) }}" title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-xs ml-0 text-danger" onclick="return confirm('Are you sure want to Delete this record?');">
                                                          <span class="fa fa-trash"></span>
                                                        </button>
                                                    </form>
                                                    
                                                    {{-- <a href="{{ route('users.delete', encrypt($value->id)) }}" title="Delete"><i class="fa fa-fw fa-trash text-danger"></i></a> --}}
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                    {{-- {!! $users->render() !!} --}}

                                    {{-- {{ dd( $users->links() ) }} --}}
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>



            </div>
        </section>

    </div>


@endsection
