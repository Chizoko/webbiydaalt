@extends("layout/master",['title'=>$title])
@section("content")
<h5 class="card-title">Бүх Гүйлгээ<h5>
<table class="table">
@foreach($transactions as $transaction)
    <tr>
        <td>{{$transaction->id}}</td>
        <td>{{$transaction->transaction_from}}</td>
        <td>{{$transaction->transaction_to}}</td>
        <td>{{$transaction->amount}}</td>
        <td>{{$transaction->tranaction_description}}</td>
        <td>{{$transaction->created_at}}</td>
        <td>{{$transaction->updated_at}}</td>
    </tr>
@endforeach
</table>
@endsection