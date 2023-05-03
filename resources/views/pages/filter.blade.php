@extends('layouts.master')
@section('title', 'Comic Shop')
@section('content')

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sắp xếp theo </span>
                                    <?php
                                    function getUrlExcept($param){
                                        $currentUrl = url()->current(); // Lấy URL hiện tại
                                        $queryParams = request()->except([$param]); // Lấy tất cả các tham số trên URL trừ tham số $param
                                        $newUrl = url($currentUrl) . '?' . http_build_query($queryParams); // Tạo URL mới từ URL hiện tại và các tham số lấy được
                                        return $newUrl;
                                    }
                                    ?>
                                    <select id="basic" class="selectpicker show-tick form-control" onchange="location = this.value;">
                                        <option value="{{ getUrlExcept('sort') }}" @if (!$getSort) selected @endif>Mặc định</option>
                                        <option value="{{ getUrlExcept('sort') }}&sort=desc" @if ($getSort == 'desc') selected @endif>Giá cao → thấp </option>
                                        <option value="{{ getUrlExcept('sort') }}&sort=asc" @if ($getSort == 'asc') selected @endif>Giá thấp → cao</option>
								    </select>
                                </div>
                                <p>Có tất cả {{ count($productsFilter) }} sản phẩm</p>
                            </div>
                            {{-- <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach ($productsFilter as $item)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{ $item->title }}</h4>
                                                    <h5> {{ $item->price }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        {{-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>
                                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>
                                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>
                                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new">New</p>
                                                        </div>
                                                        <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> <del>$ 60.00</del> $40.79</h5>
                                                    <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien, imperdiet quis magna nec, iaculis ultrices ante. Integer vitae suscipit nisi. Morbi dignissim risus sit amet orci porta, eget aliquam purus
                                                        sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis euismod ex volutpat in. Vestibulum eleifend eros ac lobortis aliquet.
                                                        Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut placerat lectus.</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> <del>$ 60.00</del> $40.79</h5>
                                                    <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien, imperdiet quis magna nec, iaculis ultrices ante. Integer vitae suscipit nisi. Morbi dignissim risus sit amet orci porta, eget aliquam purus
                                                        sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis euismod ex volutpat in. Vestibulum eleifend eros ac lobortis aliquet.
                                                        Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut placerat lectus.</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> <del>$ 60.00</del> $40.79</h5>
                                                    <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien, imperdiet quis magna nec, iaculis ultrices ante. Integer vitae suscipit nisi. Morbi dignissim risus sit amet orci porta, eget aliquam purus
                                                        sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis euismod ex volutpat in. Vestibulum eleifend eros ac lobortis aliquet.
                                                        Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut placerat lectus.</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Tìm kiếm..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Bộ lọc</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men1">Thể loại 
								</a>
                                    <div class="collapse  @if($getCategory) show @endif" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="{{ route('product.filter') }}?category=co-trang" class="list-group-item list-group-item-action @if($getCategory == 'co-trang') active @endif">Cổ trang </a>
                                            <a href="{{ route('product.filter') }}?category=thieu-nhi" class="list-group-item list-group-item-action  @if($getCategory == 'thieu-nhi') active @endif">Thiếu nhi </a>
                                            <a href="{{ route('product.filter') }}?category=the-thao" class="list-group-item list-group-item-action  @if($getCategory == 'thethao') active @endif">Thể thao </a>
                                            <a href="{{ route('product.filter') }}?category=than-dong-dat-viet" class="list-group-item list-group-item-action  @if($getCategory == 'than-dong-dat-viet') active @endif">Thần đồng đất việt </a>
                                            <a href="{{ route('product.filter') }}?category=conan" class="list-group-item list-group-item-action  @if($getCategory == 'conan') active @endif">Conan </a>
                                            <a href="{{ route('product.filter') }}?category=doraemon" class="list-group-item list-group-item-action  @if($getCategory == 'doraemon') active @endif">Doraemon </a>
                                            <a href="{{ route('product.filter') }}?category=khac" class="list-group-item list-group-item-action  @if($getCategory == 'khac') active @endif">Khác </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men2">Đối tượng 
								</a>
                                    <div class="collapse @if($getAge) show @endif" id="sub-men2" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="{{ route('product.filter') }}?age=mau-giao" class="list-group-item list-group-item-action @if($getAge == 'mau-giao') active @endif">Nhà trẻ - mẫu giáo (0-6 tuổi) </a>
                                            <a href="{{ route('product.filter') }}?age=nhi-dong" class="list-group-item list-group-item-action @if($getAge == 'nhi-dong') active @endif">Nhi đồng (6-11 tuổi) </a>
                                            <a href="{{ route('product.filter') }}?age=thieu-nien" class="list-group-item list-group-item-action @if($getAge == 'thieu-nien') active @endif">Thiếu niên (11 - 15 tuổi) </a>
                                            <a href="{{ route('product.filter') }}?age=cha-me-doc-cung-con" class="list-group-item list-group-item-action @if($getAge == 'cha-me-doc-cung-con') active @endif">Cha mẹ đọc cùng con </a>
                                            <a href="{{ route('product.filter') }}?age=moi-lon" class="list-group-item list-group-item-action @if($getAge == 'moi-lon') active @endif">Tuổi mới lớn (15 - 18 tuổi) </a>
                                            <a href="{{ route('product.filter') }}?age=thanh-nien" class="list-group-item list-group-item-action @if($getAge == 'thanh-nien') active @endif">Thanh niên (trên 18 tuổi) </a>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="#" class="list-group-item list-group-item-action"> Grocery  <small class="text-muted">(150) </small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(11)</small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(22)</small></a> --}}
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Giá</h3>
                            </div>
                            <div class="price-box-slider">
                                {{-- <div id="slider-range"></div> --}}
                               
                                <div>
                                    <label class="radio-button" style="font-size: 16px; cursor: pointer;">
                                        <input type="radio" name="optionSort" value="{{ getUrlExcept('price') }}" @if (!$getPrice) checked @endif onchange="location = this.value;" style="margin-right: 5px; cursor: pointer;">
                                        Tất cả
                                    </label>
                                </div>
                                <div>
                                    <label class="radio-button" style="font-size: 16px; cursor: pointer;">
                                        <input type="radio" name="optionSort" value="{{ getUrlExcept('price') }}&price=0-15000" @if ($getPrice == '0-15000') checked @endif onchange="location = this.value;" style="margin-right: 5px; cursor: pointer;">
                                        Nhỏ hơn 15,000 VNĐ
                                    </label>
                                </div>
                                <div>
                                    <label class="radio-button" style="font-size: 16px; cursor: pointer;">
                                        <input type="radio" name="optionSort" value="{{ getUrlExcept('price') }}&price=15000-50000" @if ($getPrice == '15000-50000') checked @endif onchange="location = this.value;" style="margin-right: 5px; cursor: pointer;">
                                        Từ 15,000 VNĐ - 50,000 VNĐ
                                    </label>
                                </div>
                                <div>
                                    <label class="radio-button" style="font-size: 16px; cursor: pointer;">
                                        <input type="radio" name="optionSort" value="{{ getUrlExcept('price') }}&price=50000-100000" @if ($getPrice == '50000-100000') checked @endif onchange="location = this.value;" style="margin-right: 5px; cursor: pointer;">
                                        Từ 50,000 VNĐ - 100,000 VNĐ
                                    </label>
                                </div>
                                <div>
                                    <label class="radio-button" style="font-size: 16px; cursor: pointer;">
                                        <input type="radio" name="optionSort" value="{{ getUrlExcept('price') }}&price=100000-max" @if ($getPrice == '100000-max') checked @endif onchange="location = this.value;" style="margin-right: 5px; cursor: pointer;">
                                        Trên 100,000 VNĐ 
                                    </label>
                                </div>
                                
                                {{-- <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Lọc</button>
                                </p> --}}
                            </div>
                            {{-- <p style="margin-top: 20px; text-align: center;">
                                <button class="btn hvr-hover" type="submit">Lọc</button>
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

@endsection