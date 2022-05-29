@extends('backend.master.master')
@section('title','Ganti Password')
@section('content')
  <div class="main-content">
      <div class="section">
          <div class="section-header">
              <h5>Ganti Password</h5>
          </div>
          @include('backend.master.info')
          <div class="card">
              <div class="card-header">
                  <h4>Form Ganti Password</h4>
              </div>
              <div class="card-body bg-light">
                    <form action="{{ route('ganti-password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="old_password">Password Sekarang</label>
                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Password Sekarang">
                            @error('old_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" name="new_password" class="form-control @error('new-password') is-invalid @enderror" placeholder="Password Baru">
                            @error('new_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Password Baru</label>
                            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Konfirmasi Password Baru">
                            @error('confirm_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                    </form>
              </div>
          </div>
      </div>
  </div>
@endsection