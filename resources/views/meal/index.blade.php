@extends('layouts.app')

@section('content')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-info text-light text-center ">جميع الوجبات

                    </div>

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
                                <th scope="col">صورة الوجبة</th>
                                <th scope="col">اسم الوجبة</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">الصنف</th>
                                <th scope="col">السعر </th>
                                <th scope="col">تعديل</th>
                                <th scope="col">حذف</th>

                            </tr>

                            </thead>
                            <tbody>

                            @if (count($meals) > 0)
                                @foreach ($meals as $meal)

                                    <tr>
                                        <th scope="row">{{$meal->id}}</th>
                                        <td><img src="{{asset($meal->image)}}" width="85"></td>
                                        <td>{{$meal->name}}</td>
                                        <td>{{$meal->description}}</td>
                                        <td>{{$meal->category}}</td>
                                        <td>{{$meal->price}} جنيه </td>

                                        <td><a href="{{route('meal.edit',$meal->id)}}"><button class="btn btn-primary">تعديل</button></a></td>

                                        <td> <a href="{{route('meal.delete',$meal->id)}}" class="btn btn-danger" id="delete">حذف</a></td>


                                    </tr>


                                @endforeach

                            @else
                                <p>لا يوجد وجبات </p>
                            @endif


                            </tbody>
                        </table>
                        {{ $meals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
