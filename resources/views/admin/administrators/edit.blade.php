
@extends('layouts.admin')
@section('title', 'xxxxxxxx')
@section('content')
<!-- contents_title -->
<div class="contents_title">
        <h3 class="bold">xxxxxxxx</h3>
        @if($delOk)
            <input type="submit" name="del_user" value="xxxxxxxx" class="btn_S del_alert" data-iziModal-open=".del_confirm" />
        @else
            <input type="submit" name="del_user" value="xxxxxxxx" class="btn_S del_alert" data-iziModal-open=".single_account_alert" />
        @endif
</div>
<!-- //contents_title -->

<div class="container">
    <form action="{{route('administrators.update')}}" method="post">
        @csrf
        <input type="hidden" name="administrators_id" value="{{ $administrator->id }}">

        <div>
            <table class="add_new_admin add_new_company">
                <tbody>
                    <tr>
                        <td class="must"><span>xxxxxxxx</span></td>
                        <td>
                            <span><input type="text" name="account" size="40" value="{{ old('account') ? old('account') : $administrator->account }}"></span>
                            @if ($errors->has('account'))
                                <span class="err_msg">{{$errors->first('account')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="" colspan="2">
                            <span style="font-size:12px;color:red">xxxxxxxx<span>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><span>xxxxxxxx。</span></td>
                        <td>
                            <span><input type="password" name="password" size="40" value=""></span>
                            @if ($errors->has('password'))
                                <span class="err_msg">{{$errors->first('password')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class=""><span>xxxxxxxx</span></td>
                        <td>
                            <span><input type="password" name="password_confirm" size="40" value=""></span>
                            @if ($errors->has('password_confirm'))
                                <span class="err_msg">{{$errors->first('password_confirm')}}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{Session('preUrl')}}"  class="btn_S btn_Back" style="background-color: #ccc; margin-bottom: 30px;">Back</a>
        <input type="submit" name="new_admin_info_submit" value="Submit" class="btn_M" style="margin-top: 20px; margin-bottom: 30px;">
    </form>
    <link rel="stylesheet" type="text/css" href="/libs/iziModal.min.css" media="screen">
    <script type="text/javascript" src="/libs/iziModal.min.js"></script>
    <script>
        $(function(){
            $(".del_confirm").iziModal({
                onOpening: function() { resizeBody(); }
            });
            $(".single_account_alert").iziModal({
                onOpening: function() { resizeBody(); }
            });
        })

        function resizeBody() {
            $("body").css("min-height", $("#sidebar").height());
        }
    </script>

    <!-- Modal Box -->
    <div class="modal del_confirm">
        <form action="{{route('administrators.delete')}}" method="post">
            @csrf
            <h3><span class="bold">{{$administrator->account}}</span>xxxxxxxx</h3>
            <span data-izimodal-close="" class="btn_M btn_Back">xxxxxxxx</span>
            <input type="submit" name="del_confirm_ok" value="OK" class="btn_M" style="margin-top: 20px;">
            <input type="hidden" name="administrators_id" value="{{ $administrator->id }}">
        </form>
    </div>
    <div class="modal single_account_alert">
        <h3>xxxxxxxx</h3>
        <input data-izimodal-close="" type="button" name="single_account_alert_ok" value="OK" class="btn_M" style="margin-top: 20px;">
    </div>
    <!-- //Modal Box -->
</div>
@endsection
