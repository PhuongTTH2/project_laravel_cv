
@extends('layouts.admin')
@section('content')
@section('title', 'xxxxxxxx')
@include('common/head_meta_datapicker')
<div class="contents_title application">
    <h3 class="bold">xxxxxxxx</h3>
		<input type="submit" name="del_user" value="xxxxxxxx" class="btn_S del_alert" data-iziModal-open=".del_confirm" />
</div>
<form action="{{ route('company.update') }}" method="post">
  @csrf
	<input type="hidden" name="company_id" value="{{ $company->id }}">
  <div>
    <table class="add_new_company">
      <tbody>
        <tr>
          <td class="must">
            <span>xxxxxxxx</span>
          </td>
          <td>
            <span>
              <input type="text" name="company_code_1" size="5" maxlength="5" value="{{ old('company_code_1') ? old('company_code_1') : substr($company->company_code, 0, 5) }}">
              <input type="text" name="company_code_2" size="3" maxlength="3" value="{{ old('company_code_2') ? old('company_code_2') : substr($company->company_code, 5, 3) }}">
              <input type="text" name="company_code_3" size="2" maxlength="2" value="{{ old('company_code_3') ? old('company_code_3') : substr($company->company_code, 8) }}">
                            <span style="display: inline-block; padding-left: 5px">xxxxxxxx</span>
            </span>
            <div class="err_msg">{{$errors->first('company_code')}}</div>
          </td>
        </tr>
        <tr>
          <td class="must">
            <span>xxxxxxxx</span>
          </td>
          <td>
            <span>
              <input type="text" name="company_name" size="40" value="{{ old('company_name') ? old('company_name') : $company->company_name }}">
            </span>
            <div class="err_msg">{{$errors->first('company_name')}}</div>
          </td>
        </tr>
        <tr>
          <td>
            <span>xxxxxxxx</span>
          </td>
          <td>
            <span>
              <input type="text" name="company_site_name" size="40" value="{{ old('company_site_name') ? old('company_site_name') :$company->company_site_name }}">
            </span>
            <div class="err_msg">{{$errors->first('company_site_name')}}</div>
          </td>
        </tr>
        <tr>
            <td class="must">
                <span>xxxxxxxx</span>
            </td>
            <td>
                <span>
                    <input type="text" name="account_lead" size="10" value="{{ old('account_lead') ? old('account_lead') : $company->account_lead }}">
                </span>
                <div class="err_msg">{{ $errors->first('account_lead') }}</div>
            </td>
        </tr>
        <?php
          $companyBusinessCodes = \App\Models\Eloquent\CompanyBusinessCode::orderBy('order_num')->get();
        ?>
        <tr>
          <td class="must">
            <span>xxxxxxxx</span>
          </td>
          <td>
            <label class="select_container">
              <select id="select_company_business_code" name="company_business_code" style="width: 150px; border: solid 1px #2483c5;">
								<option value="0">-</option>
								@foreach ($companyBusinessCodes as $companyBusinessCode)
                <option value="{{ $companyBusinessCode->id }}"
                @if(old('company_business_code'))
                  @if(old('company_business_code') == $companyBusinessCode->id)
                    selected
                  @endif
                @else
                  @if($company->company_business_code == $companyBusinessCode->id)
                    selected
                  @endif
                @endif>
                {{ $companyBusinessCode->name }}</option>
								@endforeach
              </select>
            </label>
            <div class="err_msg">{{$errors->first('company_business_code')}}</div>
          </td>
        </tr>
        <tr>
          <td>
            <span>xxxxxxxx</span>
          </td>
          <td>
            <label class="select_container">
              <select id="select_broadcaster_id" name="broadcaster_id" style="width: 150px; border: solid 1px #2483c5;"
              @if(old('company_business_code'))
                @if(old('company_business_code') != \App\Models\Eloquent\Company::COMPANY_BUSINESS_CODE_BROADCASTER)
                  disabled
                @endif
              @else
                @if($company->company_business_code != \App\Models\Eloquent\Company::COMPANY_BUSINESS_CODE_BROADCASTER)
                  disabled
                @endif
              @endif
              >
								<option value="0">-</option>
								@foreach ($broadcasters as $broadcaster)
                <option value="{{ $broadcaster->id }}"
                @if(old('broadcaster_id'))
                  @if(old('broadcaster_id') == $broadcaster->id)
                    selected
                  @endif
                @else
                  @if($company->broadcaster_id == $broadcaster->id)
                    selected
                  @endif
                @endif>
                {{ $broadcaster->broadcaster_name }}</option>
								@endforeach
              </select>
            </label>
            <div class="err_msg">{{$errors->first('broadcaster_id')}}</div>
          </td>
        </tr>
        <tr>
          <td class="must">
            <span>xxxxxxxx</span>
          </td>
          <td>
            <label class="select_container">
              <?php
                $companyTypeCodes = \App\Models\Eloquent\CompanyTypeCode::orderBy('order_num')->get();
                $company_type_code = old('company_type_code', $company->company_type_code);
              ?>
              <select id="select_company_type_code" name="company_type_code" style="width: 150px; border: solid 1px #2483c5;">
                <option value="0">-</option>
				@foreach ($companyTypeCodes as $code)
                <option value="{{ $code->id }}" {{ ($company_type_code == $code->id) ? 'selected' : ''}} >{{ $code->name }}</option>
				@endforeach
              </select>
            </label>
            <div class="err_msg">{{$errors->first('company_type_code')}}</div>
          </td>
        </tr>
        <tr>
          <td class="must">
            <span>xxxxxxxx</span>
          </td>
          <td>
            <span>
              <input type="radio" name="auth_type_id" id="new_company_auth_1" value="1"
              @if(old('auth_type_id'))
                @if(old('auth_type_id') == '1')
                  checked
                @endif
              @else
                @if($company->auth_type_id == '1')
                    checked
                @endif
              @endif>
              <label for="new_company_auth_1">xxxxxxxx</label>
              <input type="radio" name="auth_type_id" id="new_company_auth_2" value="2"
              @if(old('auth_type_id'))
                @if(old('auth_type_id') == '2')
                  checked
                @endif
              @else
                @if($company->auth_type_id == '2')
                    checked
                @endif
              @endif>
              <label for="new_company_auth_2">xxxxxxxx</label>
            </span>
            <div class="err_msg">{{$errors->first('auth_type_id')}}</div>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: left;">
            <span>xxxxxxxx</span>
          </td>
        </tr>
        @if(!$errors->any())
            @foreach($company->company_ips as $company_ip)
            <tr>
              <td></td>
              <td>
                <input type="text" name="access_ips[]" value="{{ $company_ip->ip_address }}">
                <span class="delete_ip_btn fa fa-close" onclick="formDelete(this)"></span>
              </td>
            </tr>
            @endforeach
        @else

          @if($errors->has('access_ips.*'))
          <tr>
            <td></td>
            <td>
              <div class="err_msg">{{$errors->first('access_ips.*')}}</div>
            </td>
          </tr>
          @endif

          @if(old('access_ips'))
            @foreach(old('access_ips') as $key => $access_ip)
            <tr>
              <td></td>
              <td>
                <input type="text"  name="access_ips[]" value="{{ old('access_ips.'.$key) }}">
                <span class="delete_ip_btn fa fa-close" onclick="formDelete(this)" style="margin-left: 4px;">
                </span>
              </td>
            </tr>
            @endforeach
          @else
              <tr>
                <td></td>
                <td>
                  <input type="text"  name="access_ips[]">
                  <span class="delete_ip_btn fa fa-close" onclick="formDelete(this)"></span>
          @endif
        @endif
        <tr>
          <td></td>
          <td>
            <input class="btn_S" id="add_access_ip" type="button" value="+" onclick="addForm(this)">
          </td>
        </tr>
        <tr>
          <td class="must">
            <span>xxxxxxxx</span>
          </td>
          <td>
            <span>
              <input type="text" name="issuable_number_user_id" value="{{ old('issuable_number_user_id') ? old('issuable_number_user_id') : $company->issuable_number_user_id }}">
            </span>
            <div class="err_msg">{{$errors->first('issuable_number_user_id')}}</div>
          </td>
        </tr>
        <tr>
        <tr>
					<td>
            <span>xxxxxxxx</span>
          </td>
          <td>
						<div>
              <input type="checkbox" name="can_use_gyokyomaster" id="can_use_gyokyomaster" value="1"
              @if(!$errors->any())
                @if($company->can_use_gyokyomaster == '1')
                  checked
                @endif
              @else
                @if(old('can_use_gyokyomaster') == '1')
                  checked
                @endif
              @endif>
							<label for="can_use_gyokyomaster"></label>
            <div class="err_msg">{{$errors->first('can_use_gyokyomaster')}}</div>
						</div>
          </td>
      </tbody>
    </table>
  </div>
  <a href="{{Session('preUrl')}} " class="btn_S btn_Back" style="background-color: #ccc; margin-bottom: 30px;">Back</a>
  <input type="submit" name="new_company_info_submit" value="xxxxxxxx" class="btn_M" style="margin-top: 20px; margin-bottom: 30px;">
</form>
<!-- Modal Box -->
<!-- Modal Box -->
<div class="modal del_confirm">
	<form action="{{ route('company.remove', ['id' => $company->id]) }}" method="post">
		@csrf
		<h3><span class="bold">「{{$company->company_name}}」</span>xxxxxxxx</h3>
		<span class="btn_M btn_Back" style="background-color: #ccc" data-izimodal-close="">xxxxxxxx</span>
		<input type="submit" name="del_confirm_ok" value="OK" class="btn_M" style="margin-top: 20px;">
		<input name="_method" type="hidden" value="DELETE">
	</form>
</div>
<!-- //Modal Box -->
<script src="/js/libs/bootstrap-notify.min.js"></script>
<link rel="stylesheet" type="text/css" href="/libs/iziModal.min.css" media="screen">
<script type="text/javascript" src="/libs/iziModal.min.js"></script>
<script>
  function formDelete(btn) {
    var record = btn.parentNode.parentNode;
    record.style.display = "none";
    record.parentNode.removeChild(record)
  }
  function addForm(btn) {
    var addElement = '<tr><td></td><td><input type="text" name="access_ips[]"><span class="delete_ip_btn fa fa-close" onclick="formDelete(this)" style="margin-left: 4px;"></span></td></tr>';
    var insertPoint = btn.parentNode.parentNode;
    $(addElement).insertBefore(insertPoint);
  }

  $(function(){
      $(".del_confirm").iziModal();
      $(".data_license_group_modal").iziModal();

      $('#datepicker-daterange .input-daterange').datepicker({
          language: 'ja',
          format: "yyyy-mm-dd",
          weekStart: 1
      });

      $('#datepicker input.datepicker').datepicker({
          language: 'ja',
          format: "yyyy-mm-dd",
          weekStart: 1
      });
      //--- end
      $("#select_company_business_code").change(function() {
        var val =  $(this).val();
        if(val == {{ \App\Models\Eloquent\Company::COMPANY_BUSINESS_CODE_BROADCASTER }}){
          $("#select_broadcaster_id").prop("disabled", false);
        }else{
          $("#select_broadcaster_id").prop("disabled", true);
          $("#select_broadcaster_id").val(0);
        }
      })
  });
  @if(Session::has('success'))
    $.notify({message: "xxxxxxxx"},{type: 'success',});
  @endif
  @if(Session::has('error'))
    $.notify({message: "xxxxxxxx"},{type: 'danger',});
  @endif
  @if(Session::has('successDelete'))
    $.notify({message: "xxxxxxxx"},{type: 'success',});
  @endif

</script>
@endsection
