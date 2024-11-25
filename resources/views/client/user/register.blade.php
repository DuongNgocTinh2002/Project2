@extends('client.layout._layout')

@section('content')
      <!-- Sign in / Register Modal -->
      <div class="form-box">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warn" style="color: red">
                    {{ $error }}
                </div>        
            @endforeach
        @endif

        <div class="form-tab">
            <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item">
                    <h1 class="nav-link " id="signin-tab">Sign Up</h1>
                </li>
             
            </ul>
            <div class="tab-content" id="tab-content-5">
                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                    <form action="{{ route('user.post.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label >First Name</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label >Last Name</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label >Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="singin-email">Email address *</label>
                            <input type="text" class="form-control" id="singin-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="singin-password">Password *</label>
                            <input type="password" class="form-control" id="singin-password" name="password" required>
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="singin-password">Address *</label>
                            <textarea style="display: block" name="address" id="" cols="30" rows="3"></textarea>
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>Submit</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                    
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .form-tab -->
    </div><!-- End .form-box -->
@endsection