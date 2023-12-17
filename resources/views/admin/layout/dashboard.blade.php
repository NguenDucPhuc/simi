@extends('admin.layout.index')

@section('content')
@if(ucfirst(Auth()->user()->role)==2)
<script src="{{asset('admin_assets/js/statistiacl.js')}}"></script>
<div class="col_3" style="font-size: 50px;color:blue;text-align: left">
   <p>Chào mừng,</p>
                                    {{ ucfirst(Auth()->user()->name) }} !!!    
@else
<div class="alert alert-danger">
    Bạn chưa đựơc phân quyền cho các chức năng này !
</div>
@endif
@endsection
