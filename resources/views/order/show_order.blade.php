
@extends('layouts.app')

@section('content')


    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card" dir="rtl" >
                    <div class="card-header text-center" >طلباتك السابقة

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th scope="col">الاسم</th>
                                <th scope="col">الهاتف</th>
                                <th scope="col">الايميل</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col">الوقت</th>
                                <th scope="col">اسم الوجبة</th>
                                <th scope="col">وصف الوجبة</th>
                                <th scope="col">العدد</th>
                                <th scope="col">سعر الوجبة</th>
                                <th scope="col">المجموع(جنيه)</th>
                                <th scope="col">العنوان</th>
                                <th scope="col">حالة الطلب</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>  {{$order->phone}}</td>
                                    <td >{{ $order->user->email }} </td>

                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->time }}</td>
                                    <td>{{ $order->meal->name }}</td>
                                    <td>{{ $order->meal->description }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->meal->price}} جنيه </td>
                                    <td>{{ ($order->meal->price * $order->quantity)}} جنيه </td>

                                    <td>{{ $order->address }}</td>

                                    @if($order->status=="تتم مراجعة الطلب")

                                        <td class="text-light bg-secondary" >{{ $order->status }}</td>

                                    @endif

                                    @if($order->status=="رفض")

                                        <td class="text-light bg-danger" >{{ $order->status }}</td>

                                    @endif

                                    @if($order->status=="قبول")

                                        <td class="text-light bg-primary" >{{ $order->status }}</td>

                                    @endif

                                    @if($order->status=="إتمام")

                                        <td class="text-light bg-success" >{{ $order->status }}</td>

                                    @endif

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>

        .card-header {
            background-color:rgb(94, 175, 83);
            color: #fff;
            font-size: 20px;
        }

    </style>





@endsection
