@extends('admin.layout.master')
    @section('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('static/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <style>
    .table_list {
      List-style: none;
      padding: 3px;
      margin-left: -30px;
    }
    .merah {
      color: red;
    }
  </style>

    @endsection

    @section('body')
    <div class="row">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
 
            <!-- /.card-header -->
            <div class="card-body">
            <div class="col-md-20">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/user/update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>
                        <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="address" type="textarea" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus> -->

                                <textarea name="address" id="address" cols="78" rows="5" autofocus="required">{{$user->address}}</textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('gender') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus> -->
                                <select name="gender" id="gender">
                                        @if($user->gender == "L")
                                    <option value="L" selected="selected">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                        @else
                                    <option value="L">Laki-Laki</option>
                                    <option value="P" selected="selected">Perempuan</option>
                                        @endif
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('birthday') }}</label>
                        <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $user->birthday }}" required autofocus>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('role') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus> -->
                                <select name="role" id="role">
                                        @if($user->role == "admin") 
                                    <option value="admin" selected="selected">admin</option>
                                    <option value="member">member</option>
                                    <option value="supplier">supplier</option>     
                                        @elseif($user->role == "member")
                                    <option value="admin">admin</option>
                                    <option value="member" selected="selected">member</option>
                                    <option value="supplier">supplier</option>    
                                        @else
                                    <option value="admin">admin</option>
                                    <option value="member">member</option>
                                    <option value="supplier" selected="selected">supplier</option>
                                        @endif
                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                    
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </div>
            </div>

            </div>
            </div>
            </div>
            </div>
            </div>

            <!-- /.card-body -->
        <!-- /.col -->
    <!-- Default box -->
   
    @endsection

    @section('footer')
    <!-- DataTables -->
<script src="{{asset('static/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('static/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

    @endsection
@show