
@extends('layouts.admin')
@section('title', '')
@section('content')
<!-- contents_title -->
<div class="contents_title application">
  <form action ="#" method="post">
    <h3 class="bold"></h3>
  </form>
</div>
<!-- //contents_title -->
<form action="{{route('administrators.update')}}" method="post">
  @csrf
  <div>
    <table class="add_new_admin add_new_company">
      <tbody>
        <tr>
          <td class="must"><span>Đăng nhập</span></td>
          <td>
            <span><input type="text" name="account" size="40" value="{{ old('account') }}"></span>
            @if ($errors->has('account'))
                <span class="err_msg">{{$errors->first('account')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <td class="must"><span>mật khẩu</span></td>
          <td>
            <span><input type="password" name="password" size="40" value=""></span>
            @if ($errors->has('password'))
                <span class="err_msg">{{$errors->first('password')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <td class="must"><span>Xác nhận mật khẩu</span></td>
          <td>
            <span><input type="password" name="password_confirm" size="40" value="" ></span>
            @if ($errors->has('password_confirm'))
                <span class="err_msg">{{$errors->first('password_confirm')}}</span>
            @endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <a href="{{Session('preUrl')}}"  class="btn_S btn_Back" style="background-color: #ccc; margin-bottom: 30px;">Back</a>
  <input type="submit" name="new_admin_info_submit" value=" đăng ký" class="btn_M" style="margin-top: 20px; margin-bottom: 30px;">
</form>
@endsection
