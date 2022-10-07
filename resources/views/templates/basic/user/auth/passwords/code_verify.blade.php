@extends($activeTemplate.'layouts.auth')
@section('content')
@php
    $account_content = getContent('account.content', true);
@endphp
    <!-- account section start -->
  <section class="account-section bg_img" style="background-image: url('{{ getImage('assets/images/frontend/account/' . @$account_content->data_values->image, '1920x1079') }}');">
    <div class="left">
      <div class="account-form-area">
        <div class="text-center">
          <a href="{{ route('home') }}" class="account-logo"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="image"></a>
        </div>
        <form class="account-form mt-5" action="{{ route('user.password.verify.code') }}" method="POST">
            @csrf

            <input type="hidden" name="email" value="{{ $email }}">

            <div class="form-group">
                <label>@lang('Verification Code')</label>
                <input type="text" name="code" id="code" placeholder="@lang('Enter Verification Code')" class="form--control">
            </div>

          <div class="form-group mt-4">
            <button type="submit" class="btn btn--base w-100">@lang('Verify Code') <i class="las la-sign-in-alt"></i></button>
          </div>
          <p class="text-white">@lang('Please check including your Junk/Spam Folder. if not found, you can') <a href="{{route('user.password.request')}}" class="text--base">@lang("Try to send again")</a></p>
        </form>
      </div>
    </div>
  </section> 
  <!-- account section end -->
@endsection
@push('script')
<script>
    (function($){
        "use strict";
        $('#code').on('input change', function () {
          var xx = document.getElementById('code').value;
          $(this).val(function (index, value) {
             value = value.substr(0,7);
              return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
          });
      });
    })(jQuery)
</script>
@endpush