@extends('layouts.app')


@section('content')


    <div class="container" dir="rtl">
        <div class="row justify-content-center">


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center bg-success text-light">الصنف</div>
                    <form action="{{route('cat.store')}}" method="post">
                        @csrf
                        <div class="card-body text-right">
                            <div class="form-group">
                                <label for="name">اسم الصنف</label>
                                <input type="text" class="form-control" name="cat_name" placeholder="اسم الصنف">
                            </div>
                            <br>

                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-light bg-primary">الأصناف</div>


                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم الصنف</th>
                                <th colspan="2">العملية</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($cats as $key=> $cat)

                                <tr>
                                    <th style="width: 10%" scope="row">{{$key+=1}}</th>
                                    <td>{{$cat->cat_name}}</td>
                                    <td style="width: 20%"><a href="{{route('cat.edit',$cat->id)}}"><button class="btn btn-primary">تعديل</button></a></td>
                                    <td style="width: 20%"><a href="{{route('cat.delete',$cat->id)}}"><button id="delete" class="btn btn-danger">حذف</button></a></td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
