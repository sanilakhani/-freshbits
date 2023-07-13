@extends('layouts.app')
@push('style')
    <link href="{{ asset('resources/css/custom.css') }}"/>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Customer List') }}</div>

                    <div class="card-body">
                        @include('flash-message')
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">
                                            Sr.No
                                        </th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date Of Birth</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $customer?->name }}</td>
                                            <td>{{ $customer?->dob }}</td>
                                            <td>{{ $customer?->email }}</td>
                                            <td>{{ $customer?->phone }}</td>
                                            <td>{{ $customer?->status }}</td>
                                            <td>
                                                <form action="{{ route('customer.destroy',$customer->id) }}" method="Post">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('customer.edit',$customer->id) }}" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $customers->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
