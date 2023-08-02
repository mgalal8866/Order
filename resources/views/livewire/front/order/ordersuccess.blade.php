<div>
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-9 col-lg-8">
                    <div class="cart-table order-table order-table-2">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    @foreach ( $order->salesdetails as $item )
                                    <tr>
                                        <td class="product-detail">
                                            <div class="product border-0">
                                                <a href="product.left-sidebar.html" class="product-image">
                                                    <img src="{{$item->productdetails->productd_image}}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <a href="">{{$item->productdetails->productheader->product_name}}</a>
                                                        </li>

                                                        {{-- <li class="text-content">Sold By: Fresho</li> --}}

                                                        {{-- <li class="text-content">Quantity -{{$item->quantity}}</li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <h4 class="table-title text-content">{{__('tran.price')}}</h4>
                                            <h6 class="theme-color">{{$item->sellprice}}</h6>
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content">{{__('tran.qty')}}</h4>
                                            <h4 class="text-title">{{$item->quantity}}</h4>
                                        </td>

                                        <td class="subtotal">
                                            <h4 class="table-title text-content">Total</h4>
                                            <h5>{{$item->grandtotal}}</h5>
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4">
                    <div class="row g-4">
                        <div class="col-lg-12 col-sm-6">
                            <div class="summery-box">
                                <div class="summery-header">
                                    <h3>التفاصيل</h3>
                                    <h5 class="ms-auto theme-color"> عدد المنتجات({{$order->salesdetails->count()}})</h5>
                                </div>

                                <ul class="summery-contain">
                                    <li>
                                        <h4>اجمالى الفرعى</h4>
                                        <h4 class="price">{{$order->subtotal}}</h4>
                                    </li>

                                    <li>
                                        <h4>اجمالى التوفير</h4>
                                        <h4 class="price theme-color">{{$order->discount_product}}</h4>
                                    </li>

                                    <li>
                                        <h4>خصم الكوبون</h4>
                                        <h4 class="price text-danger">{{$order->discount_g}}</h4>
                                    </li>
                                </ul>

                                <ul class="summery-total">
                                    <li class="list-total">
                                        <h4>اجمالى النهائي</h4>
                                        <h4 class="price">{{$order->grandtotal}}</h4>
                                    </li>
                                </ul>
                                <ul class="summery-total">
                                    <li class="list-total">
                                        <h6>  ملاحظات  </h6>
                                        <h4 class="price">{{$order->note}}</h4>
                                    </li>
                                </ul>
                                <ul class="summery-total">
                                    <li class="list-total">
                                        <h6>  حاله الطلب  </h6>
                                        <h4 class="price text-danger">{{$order->type_order}}</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- <div class="col-lg-12 col-sm-6">
                            <div class="summery-box">
                                <div class="summery-header d-block">
                                    <h3>Shipping Address</h3>
                                </div>

                                <ul class="summery-contain pb-0 border-bottom-0">
                                    <li class="d-block">
                                        <h4>8424 James Lane South</h4>
                                        <h4 class="mt-2">San Francisco, CA 94080</h4>
                                    </li>

                                    <li class="pb-0">
                                        <h4>Expected Date Of Delivery:</h4>
                                        <h4 class="price theme-color">
                                            <a href="order-tracking.html" class="text-danger">Track Order</a>
                                        </h4>
                                    </li>
                                </ul>

                                <ul class="summery-total">
                                    <li class="list-total border-top-0 pt-2">
                                        <h4 class="fw-bold">Oct 21, 2021</h4>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
