@extends('client.layout._layout')

@section('content')
      <!-- Sign in / Register Modal -->
      <div class="form-box">
        <div class="form-tab">
            <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item">
                    <h1 class="nav-link " id="signin-tab">Sign In</h1>
                </li>
             
            </ul>
            <div class="tab-content" id="tab-content-5">
                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                    <form action="{{ route('user.check.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="singin-email">Username or email address *</label>
                            <input type="text" class="form-control" id="singin-email" name="email" required>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="singin-password">Password *</label>
                            <input type="password" class="form-control" id="singin-password" name="password" required>
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>LOG IN</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                            </div><!-- End .custom-checkbox -->

                        </div><!-- End .form-footer -->
                    </form>
                    <a href="{{ route('user.register') }}">You not a member ? Signup</a>
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .form-tab -->
    </div><!-- End .form-box -->
@endsection