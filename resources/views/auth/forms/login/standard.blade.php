<div class="form-group">
    <label for="email">{{ trans('auth.email') }}</label>
    @include('form/text', ['name' => 'email', 'tabindex' => 1, 'placeholder' => trans('auth.log_email')])
</div>

<div class="form-group">
    <label for="password">{{ trans('auth.password') }}</label>
    @include('form/password', ['name' => 'password', 'tabindex' => 2, 'placeholder' => trans('auth.log_pass')])
    <span class="block small"><a href="{{ baseUrl('/password/email') }}">{{ trans('auth.forgot_password') }}</a></span>
</div>