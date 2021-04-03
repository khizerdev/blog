@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Site Setting</h5>

          @include('admin.includes.error')

          @if(session()->has('message'))
          <div class="alert alert-success">
              <p>{{session('message')}}</p>
          </div>
          @endif

          <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Site Name</label>
                <input type="text" value="{{ $setting->site_name}}" name="site_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" value="{{ $setting->address }}" name="address" class="form-control">
            </div>

            <div class="form-group">
                <label for="contact_no">Contact No</label>
                <input type="text" value="{{ $setting->contact_no }}" name="contact_no" class="form-control">
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" value="{{ $setting->contact_email }}" name="contact_email" class="form-control">
            </div>

            <div class="form-group">
                <label for="logo">Site Logo</label>
                <input type="file" name="logo" class="form-control">
            </div>
            
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Save Settings
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>

@endsection
