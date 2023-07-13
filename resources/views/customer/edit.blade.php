@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('flash-message')
                <div class="card">
                    <div class="card-header">{{ __('Edit Customer') }}</div>

                    <div class="card-body">
                        <form action="{{ route('customer.update',$customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <label for="name">Name</label>
                                <input type="name" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $customer->name }}">
                                @if ($errors->has('name'))
                                    <p style="color:red;">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $customer->email }}">
                                @if ($errors->has('email'))
                                    <p style="color:red;">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="{{ $customer->phone }}">
                                @if ($errors->has('phone'))
                                    <p style="color:red;">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ \Carbon\Carbon::createFromFormat('d-m-Y', $customer->dob)->format('Y-m-d') }}"
                                    placeholder="Select Date Of Birth">
                                    @if ($errors->has('dob'))
                                    <p style="color:red;">{{ $errors->first('dob') }}</p>
                                @endif
                            </div>

                            <div class="form-group mb-2">

                                <label for="status">Date Of Birth</label>
                                <select name="status" id="status" class="form-control">
                                    <option value=""> Select Status</option>
                                    @foreach ($allStatus as $key => $status)
                                        <option value="{{ $key }}" {{ $customer->status == $key ? "selected" : "" }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    <p style="color:red;">{{ $errors->first('status') }}</p>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
