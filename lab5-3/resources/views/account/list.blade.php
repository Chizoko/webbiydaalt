@extends("layout/master",['title'=>$title])
@section("content")
<h5 class="card-title">Бүх дансны мэдээлэл<h5>
<table class="table">
@foreach($accounts as $account)
    <tr>
        <td>{{$account->id}}</td>
        <td><a href="{{url('account')}}/{{$account->account_number}}">{{$account->account_number}}</a></td>
        <td>{{$account->account_name}}</td>
        <td>{{$account->account_balance}}</td>
    </tr>
@endforeach
</table>
@endsection