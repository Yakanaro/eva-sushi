@extends('layouts.app')
@section('content')
    <div class="mt-20">
        @include('account.layouts.userAccount')
    </div>
    <div>
        @include('account.layouts.listOfOrders')
    </div>
@endsection