@extends('layouts.app')

@section('content')

    <div class="container" dir="rtl">
        <div class="row justify-content-center">


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center bg-success text-light">الصنف</div>
                    <form action="{{route('cat.update',$cats->id)}}" method="post">
                        @csrf
                        <div class="card-body text-right">
                            <div class="form-group">
                                <label for="name">اسم الصنف</label>
                                <input type="text" class="form-control" name="cat_name" value="{{$cats->cat_name}}">
                            </div>
                            <br>

                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">تعديل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
