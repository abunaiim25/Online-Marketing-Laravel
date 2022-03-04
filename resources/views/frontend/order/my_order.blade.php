@extends('layouts.frontend_layout')


@section('title')
    Online Marketing - My Orders
@endsection


@section('frontend_content')
    <section id="blog-home " class="mt-5 pt-5 container">
        <h2 class="font-weight-bold ">My Orders</h2>
        <hr>
    </section>


    <section class=" container blog mb-5 mt-5">
        <div class="sl-mainpanel m-4">

            <div class="sl-pagebody">
                <div class="row row-sm">
                    <div class="col-md-12">

                       
                        <div class="card " style="overflow: auto">
                            <div class="card-header" style="background: coral; color:#fff">My Order History</div>

                            <div class="table-wrapper p-4" style="overflow: auto">

                                @if ($orders->count() > 0)
                                    <div class="product">
                                        <table width="100%" class="table display responsive nowrap text-black">
                                            <thead>

                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Odrer Time</th>
                                                    <th>Odrer Date</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Invoice No</th>
                                                    <th>Payment Type</th>
                                                    <th>Total</th>
                                                    <th>Discount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php $i = $orders->perPage() * ($orders->currentPage() - 1); ?>

                                                @foreach ($orders as $row)
                                                    <tr>
                                                        <td><?php $i++; ?> {{ $i }}</td>
                                                        <td>{{ $row->created_at->diffForHumans() }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                                        <td>{{ $row->user->email }}</td>
                                                        <td>{{ $row->user->phone }}</td>
                                                        <td>#{{ $row->invoice_no }}</td>
                                                        <td>{{ $row->payment_type }}</td>
                                                        <td>{{ $row->total }} TK</td>
                                                        <td>
                                                            @if ($row->discount_percentage == null)
                                                                <span class="badge badge-danger">No</span>
                                                            @else
                                                                <span class="badge badge-success">Yes</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $row->status == '0' ? 'Pending' : 'Completed' }}</td>
                                                        <td>
                                                            <a href="{{ url('my_orders_view/' . $row->id) }}"
                                                                class="btn btn-sm btn-success"
                                                                style="color: #fff!important;"><i
                                                                    class="fa fa-eye"></i></a>
                                                            <a href="{{ url('my_orders_delete/' . $row->id) }}"
                                                                class="btn btn-sm btn-danger" style="color: #fff!important;"
                                                                onclick="return confirm('Are you shure to delete?')"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <h2 class="text-center p-5">Orders Not Available</h2>
                                    <a class="btn float-end" style="background: coral; color:#fff" href="{{ url('shop') }}" role="button">Continue
                                        to Shopping</a>
                                @endif
                            </div><!-- table-wrapper -->
                        </div><!-- card -->
                    </div>

                </div>

            </div>


            <div class="d-flex mt-5">
                {{-- (paginate) ->Providers\AppServiceProvider.php --}}
                {{ $orders->links() }}
                {{-- {{$appoint->onEachSide(1)-> links()}} --}}
            </div>
        </div>
    </section>



    <!--banner-->
    <section id="banner" class="my-5 pt-5 container p-5"
        style=" background-image: url({{ asset('frontend') }}/image/shopping2.jpg); border-radius: 15px;">
        <div class="container">
            <h4>MID SEASON'S SALE</h4>
            <h1>Autumn Collection<br>UP TO 20% OFF</h1>
            <a class="btn text-uppercase  button-style" href="{{ url('shop') }}" role="button">Shop Now</a>
        </div>
    </section>



@endsection
