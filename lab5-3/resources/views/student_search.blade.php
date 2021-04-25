@extends("layout/master",['title'=>$title])
@section("content")
<h5 class="card-title">Оюутны код оруулах<h5>
<p class="card-text">
<form class="form-inline" action="search" method="post">
{{csrf_field()}}
<input type="text" class="form-control mr-sm-2" name = "id"><br>
<input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="search">
</form>
@if($errors->any())
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
@endif
@if(isset($result))
@foreach($result as $student)
    <h1>{{$student}}<h1>
@endforeach
@endif
<p>
@endsection