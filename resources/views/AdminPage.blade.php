@extends('layouts.app')

@section('content')

    <div class="container" dir="rtl">
        <div class="row ">
            <div class="col-md-12 ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-warning ">
                        <li class="breadcrumb-item active  " aria-current="page">طلبات الزبائن</li>
                    </ol>
                </nav>
                <div class="card ">
                    <div class="card-header">
                        <a style="float:right;" href="{{route('cat.show')}}"><button class="btn btn-success btn-default"
                                                                style="margin-left:6px ;">إضافة صنف جديد </button></a>
                        <a style="float:right;" href="{{route('meal.create')}}"><button class="btn btn-danger btn-default"
                                                                                          style="margin-left:6px ;">إضافة وجبة </button></a>
                        <a style="float:right;" href="{{route('meal.index')}}"><button class="btn btn-info btn-default"
                                                                                         style="margin-left:6px ;">عرض الوجبات</button></a>
                    </div>

                    <div class="card-body text-center">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">الاسم</th>
                                <th scope="col">الايميل</th>
                                <th scope="col">الهاتف</th>

                                <th scope="col">التاريخ</th>
                                <th scope="col">الوقت</th>
                                <th scope="col">اسم الوجبة</th>
                                <th scope="col">العدد</th>
                                <th scope="col">سعر الوجبة</th>
                                <th scope="col">المجموع</th>
                                <th scope="col">العنوان</th>
                                <th scope="col">الحالة </th>
                                <th scope="col">القبول</th>
                                <th scope="col">رفض الطلب</th>
                                <th scope="col">إتمام الطلب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)


                            <tr>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->user->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->date}}</td>
                                <td>{{$order->time}}</td>

                                <td>{{$order->meal->name}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->meal->price}} جنيه </td>
                                <td>{{$order->meal->price * $order->quantity}} جنيه </td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->status}}</td>
                                <form action="{{ route('order.status',$order->id )}}" method="post">
                                    @csrf


                                <td>
                                    <input name="status" type="submit" value="قبول" class="btn btn-primary btn-sm">
                                </td>

                                <td>
                                    <input name="status" type="submit" value="رفض" class="btn btn-danger btn-sm">
                                </td>

                                <td>
                                    <input name="status" type="submit" value="اتمام" class="btn btn-success btn-sm">
                                </td>
                                </form>
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


