
@extends('layouts.admin')
@section('title', 'xxxxxxxx')
@section('content')
<!-- contents_title -->
<div class="contents_title application">
  <form action="" method="post">
    @csrf
    <h3 class="bold">xxxxxxxx</h3>
    <a href="{{ route('administrators.create') }}" class="btn_S" style="position: absolute; top: 0; right: 0;">xxxxxxxx</a>
    <div class="">
      <label>xxxxxxxx</label>
      <input type="text" id="loginid" name="loginid" size="30" maxlength="20" value="{{ Request()->loginid }}">
    </div>
    <input type="submit" name="company_search" value="xxxxxxxx" class="btn_M">
  </form>
</div>
<!-- //contents_title -->

@if(count($administrators))
<div class="cart_table_container">
  <form action="#" method="post" style="position: relative;">
    <div style="display: block;">
      <span>{{ $administrators->firstItem() }}</span>
      <span></span>
      <span>&#12316;</span>
      <span>{{ $administrators->lastItem() }}</span>
      <span></span>
      <span>(</span>
      <span>{{ $administrators->total() }}</span>
      <span>)</span>
    </div>
    <!-- pager -->
    {{-- {!! $administrators->appends(\Request::except('page'))->render('common.pager') !!} --}}
    <!-- pager -->
    <div class="table_box" style="max-height: 450px;">
      <!-- table -->
      <table class="user_list">
        <thead>
          <tr>
            <th>@sortablelink('account','xxxxxxxx',[],['class' => 'sort_column'])</th>
            <th>@sortablelink('created_at','xxxxxxxx',[],['class' => 'sort_column'])</th>
            <th>@sortablelink('updated_at','xxxxxxxx',[],['class' => 'sort_column'])</th>
            <th>xxxxxxxx</th>
          </tr>
        </thead>
        <tbody>
          @foreach($administrators as $a)
          <tr>
            <td>
              <span>{{$a->account}}</span>
            </td>
            <td>
              <span class="date">{{ $a->created_at->format('Y-m-d')}}</span>
            </td>
            <td>
              <span class="date">{{ $a->updated_at->format('Y-m-d')}}</span>
            </td>
            <td>
              <a href="{{ route('administrators.edit', ['administratorId' => $a->id]) }}" class="btn_S">xxxxxxxx</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- //table -->
    </div>
  </form>
</div>
@endif

<script src="/js/libs/bootstrap-notify.min.js"></script>
<script language="javascript" src="/js/admin.js?v={{ time() }}"></script>
<script>
$('form').submit(function() {
  let loginid = $('#loginid').val()
  let url = "{{ route('administrators.search') }}"
  if (loginid.length) {
    url += '?loginid='+loginid
  }
  location.href = url
  return false
})

@if(Session::has('message'))
  $.notify({
    message: "{{ session('message') }}"
  },{
    type: 'success'
  });
@endif
</script>
@endsection
