@extends("layout/master",['title'=>$title])
@section("content")
<h5 class="card-title">Бүх оюутан<h5>
<p class="card-text"><ul>
@foreach($std as $student)
    <li><a href="student/{{$student[0]}}">{{ $student[0] }}</a></li>
@endforeach
<ul></p>
@endsection