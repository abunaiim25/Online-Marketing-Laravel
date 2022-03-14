@extends('layouts.frontend_layout')


@section('title')
    Online Marketing - Review
@endsection


@section('frontend_content')
    <section id="cart-home " class="mt-5 mb-4 pt-5 container">
        <h2 class="font-weight-bold ">All Reviews</h2>
        <hr>
    </section>



    {{-- Review --}}
    <section>
        <div class="container">
            <div class="card p-4 ">

                <div class="mb-1" style="display: flex; justify-content: space-between;">
                    <div>
                        <h2 class="mx-2">Reviews</h2>
                    </div>
                    <div class="" style="float:right">
                        <a class="btn btn-warning btn-sm " href="{{ url('add-review/' . $products->id) }}"
                            role="button"> Write a review</a>
                    </div>
                </div>

                @foreach ($review as $item)
                    <div class="card ">
                        <div class="user-review">

                            <div class="card-header px-3" style="line-height: 0.5; background: blanchedalmond">
                                <div style="display: flex; justify-content: space-between;">
                                    <div>
                                        <h3>{{ $item->user->name }}</h3>
                                    </div>

                                    <div class="" style="float:right">
                                        @if ($item->user_id == Auth::id())
                                            <a href="{{ url('delete-review/' . $item->id) }}"
                                                class="float-end bg-danger badge text-white mx-1"
                                                onclick="return confirm('Are You Sure To Delete?')"> <i
                                                    class="fa fa-trash"></i></a>

                                            <a href="{{ url('edit-review/' . $item->id) }}"
                                                class="float-end bg-success badge text-white"> <i
                                                    class="fa fa-pencil"></i></a>
                                        @endif
                                    </div>

                                </div>
                                <small><small>{{ $item->created_at->diffForHumans() }}</small></small>
                            </div>

                            <p class="my-2 px-3">
                                {{ $item->user_review }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="d-flex my-5">
                {{-- (paginate) ->Providers\AppServiceProvider.php --}}
                {{ $review->links() }}
                {{-- {{$appoint->onEachSide(1)-> links()}} --}}
            </div>

        </div>
    </section>
@endsection
