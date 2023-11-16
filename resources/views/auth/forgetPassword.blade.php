@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Reset Password</div>
                  <div class="card-body">
  
                    @if (Session::has('info'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('info') }}
                        </div>
                    @endif
  
                      <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">Alamat E-Mail </label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                             <!-- Tambahkan input untuk pertanyaan keamanan -->
                             <div class="form-group row">
                                <label for="pertanyaan_keamanan" class="col-md-4 col-form-label text-md-right">Apa Hobi Anda ?</label>
                                <div class="col-md-6">
                                    <input type="text" id="pertanyaan_keamanan" class="form-control" name="pertanyaan_keamanan" required>
                                    @if ($errors->has('pertanyaan_keamanan'))
                                        <span class="text-danger">{{ $errors->first('pertanyaan_keamanan') }}</span>
                                    @endif
                                </div>
                            </div>


                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Kirim Link Reset Password
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection