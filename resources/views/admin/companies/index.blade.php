@extends('layouts.admin')
@section('title', 'Company')
@section('content')
<div class="contents_title application">
    <form action="" method="post">
      @csrf
      <h3 class="bold">Company</h3>
      <a href="{{ route('company.create') }}" class="btn_S" style="position: absolute; top: 0; right: 0;">Creae</a>
      <div class="">
          {{-- {{Session('keyA')}} --}}
          {{Session::get('keyA')}}
          {{-- @can('update', 1)
          <label>xxxxxxxx
              @lang('messages.confirmed', [
              'attribute' =>'Phuong'
              ])
          </label>
            @endcan --}}
        <input type="text" id="company_name" name="company_name" size="30" maxlength="20" value="{{ Request()->company_name }}"/>
      </div>
      <input type="submit" id="search" name="company_search" value="xxxxxxxx" class="btn_M"/>
    </form>
  </div>
  @if(count($companies))
  <form action="#" method="post" style="position: relative;">
    <div style="display: block;">
      <span>{{ $companies->firstItem() }}</span>
      <span>～</span>
      <span>{{ $companies->lastItem() }}</span>
      <span>(</span>
      <span>{{ $companies->total() }}</span>
      <span>)</span>
    </div>
    <!-- pager -->
    {!! $companies->appends(\Request::except('page'))->render('common.pager') !!}
    <!-- //pager -->

    <div class="table_box">
      <!-- table -->
      <table class="login_user_list">
        <thead>
          <tr>
            <th >
              <input type="checkbox" style="display: none;" name="all_company_select" id="all_company_select">
              <label style="color:#fff; margin-left: 5px;" for="all_company_select"></label>
              <span>xxxxxxxx</span>
            </th>
            <th >
                {{-- {{Session::get('variableName')}} --}}

            <input type="button" id="output_license" name="output_license" value="xxxxxxxx" class="btn_S" style="width:200px" data-iziModal-open=".del_confirm" disabled>
            </th>
          </tr>
          <tr>
            <th>@sortablelink('company_code','xxxxxxxx',[],['class' => 'sort_column'])</th>
            <th>@sortablelink('company_business_code_order','xxxxxxxx',[],['class' => 'sort_column'])</th>
            <th>@sortablelink('company_type_code_order','xxxxxxxx',[],['class' => 'sort_column'])</th>
            <th>@sortablelink('company_name','xxxxxxxx',[],['class' => 'sort_column'])</th>
            <th>xxxxxxxx</th>
            <th>@sortablelink('created_at','xxxxxxxx',[],['class' => 'sort_column'])</th>
            <th>@sortablelink('updated_at','xxxxxxxx',[],['class' => 'sort_column'])</th>
            <th>&nbsp;</th>
            <th>xxxxxxxx</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row1 -->
          @foreach ($companies as $c)
          <tr>
            <td>

              <input type="checkbox" style="display: none;" class="company_row" id="company_id_{{ $c->id }}" name="company_id" value="{{ $c->id }}">
              <label for="company_id_{{ $c->id }}"></label>
              <span>{{ $c->company_code }}</span>
            </td>
            <td><span>{{ $c->company_business ? $c->company_business->name : '' }}</span></td>
            <td><span>{{ $c->company_type ? $c->company_type->name : '' }}</span></td>
            <td><span>{{ $c->company_name }}</span></td>
            <td><span>{{ $c->company_site_name }}</span></td>
            <td><span class="date">{{ $c->created_at }}</span></td>
            <td><span class="date">{{ $c->updated_at }}</span></td>
            <td><a href="{{ route('company.edit', ['companyId' => $c->id ]) }}" class="btn_S company_edit">xxxxxxxx</a></td>
            <td><a href="{{ route('company.licenses', ['companyId' => $c->id ]) }}" class="btn_S company_edit">xxxxxxxx</a></td>
            <td><a href="{{ route('company.users', ['compamyId' => $c->id ]) }}" class="btn_S company_edit">xxxxxxxx</a></td>
          </tr>
          @endforeach
          <!-- //Row1 -->
        </tbody>
      </table>
      <!-- //table -->
    </div>

  </form>
  @endif
  <script src="/js/libs/bootstrap-notify.min.js"></script>
  <script>
    @if(Session::has('keyA'))
  $.notify({
    message: "{{ session('keyA') }}"
  },{
    type: 'success'
  });
@endif
  </script>
@endsection
