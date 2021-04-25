@extends("layout/master",['title'=>$title])
@section("content")
<h5 class="card-title">Гүйлгээ хийх<h5>
@if(isset($result))
<div class="alert alert-{{$result[1]}}" role="alert">
  {{$result[0]}}
</div>
@endif
<form action="transaction" method="post">
{{csrf_field()}}
  <div class="form-group">
    <label for="from">Хэнээс</label>
    <input type="number" class="form-control" name="from" aria-describedby="" placeholder="">
  </div>
  <div class="form-group">
    <label for="to">Хэнд</label>
    <input type="number" class="form-control" name="to" aria-describedby="" placeholder="">
  </div>
  <div class="form-group">
    <label for="amount">Гүйлгээний дүн</label>
    <input type="number" class="form-control" name="amount" aria-describedby="" placeholder="">
  </div>
  <div class="form-group">
    <label for="desc">Гүйлгээний утга</label>
    <input type="text" class="form-control" name="desc" aria-describedby="" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection