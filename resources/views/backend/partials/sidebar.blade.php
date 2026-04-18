@php
$admin=App\Models\Admin::where('id',Auth::guard('admin')->user()->id)->first();
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

<div class="pb-3 sidebar" style="background: #d7dceb !important">
    <nav class="navbar bg-white text-dark navbar-dark">

        <a href="{{ url('/admin/dashboard') }}" class="mx-4 mb-3 navbar-brand">
            <h3 class="text-primary"><img src="{{asset(\App\Models\Basicinfo::first()->logo)}}" alt="logo" style="width:100%"></h3>
        </a>

        <div class="navbar-nav w-100">

        <!-- New sidebar -->
        <a class="top-title">ম্যানেজ অর্ডার</a>
        <a href="{{ url('/admin/dashboard') }}" class="nav-item new-nav-link active">
            <i class="bi bi-speedometer me-2"></i>ড্যাশবোর্ড
        </a>

        <div class="nav-item dropdown">
            <a href="#" class="new-nav-link dropdown-toggle mt-2" data-bs-toggle="dropdown">
                <i class="bi bi-bag me-2"></i></i>অর্ডার লিস্ট
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> পেন্ডিং অর্ডার</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> সকল অর্ডার</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> এক্সেল ভিউ</a>
            </div>
        </div>
        <div class="nav-item dropdown mt-2">
            <a href="#" class="new-nav-link dropdown-toggle mt-2" data-bs-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane" viewBox="0 0 16 16">
                    <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849m.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1s-.458.158-.678.599"/>
                </svg> কুরিয়ারে বুকিং
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> অটো বুকিং</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> ম্যানুয়াল বুকিং</a>
            </div>
        </div>
        <div class="nav-item dropdown mt-2">
            <a href="#" class="new-nav-link dropdown-toggle mt-2" data-bs-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dropbox" viewBox="0 0 16 16">
                <path d="M8.01 4.555 4.005 7.11 8.01 9.665 4.005 12.22 0 9.651l4.005-2.555L0 4.555 4.005 2zm-4.026 8.487 4.006-2.555 4.005 2.555-4.005 2.555zm4.026-3.39 4.005-2.556L8.01 4.555 11.995 2 16 4.555 11.995 7.11 16 9.665l-4.005 2.555z"/>
                </svg> ম্যানেজ প্যাকিং
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> প্রিন্ট ইনভয়েস</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> প্রোডাক্ট প্যাকিং</a>
            </div>
        </div>
        <div class="nav-item dropdown mt-2">
            <a href="#" class="new-nav-link dropdown-toggle mt-2" data-bs-toggle="dropdown">
                <i class="bi bi-check-circle me-2"></i> পেমেন্ট কালেকশন
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> পেমেন্ট ভেরিফাই</a>
            </div>
        </div>
        <a href="" class="nav-item new-nav-link">
            <i class="bi bi-people me-2"></i>কাস্টমার ইনফর্মেশন
        </a>

        <!-- প্রোডাক্ট ম্যানেজমেন্ট -->
        <a class="top-title">প্রোডাক্ট ম্যানেজমেন্ট</a>
        <a href="" class="nav-item new-nav-link">
            <i class="bi bi-bag me-2"></i>সকল প্রোডাক্ট
        </a>

        <div class="nav-item dropdown">
            <a href="#" class="new-nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-list-ul me-2"></i> প্রোডাক্ট ক্যাটাগরি
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> মেইন ক্যাটাগরি</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> সাব ক্যাটাগরি</a>
            </div>
        </div>

        <div class="nav-item dropdown mt-2">
            <a href="#" class="new-nav-link dropdown-toggle mt-2" data-bs-toggle="dropdown">
                <i class="bi bi-image me-2"></i> ম্যানেজ প্রডাক্টস
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> আপলোড প্রোডাক্ট</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> প্রডাক্ট ইনফর্মেশন</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> প্রডাক্ট সিঙ্গেল ভিউ</a>
            </div>
        </div>

        <!-- ক্যাম্পেইন ম্যানেজমেন্ট -->
        <a class="top-title">ক্যাম্পেইন ম্যানেজমেন্ট</a>

        <div class="nav-item dropdown mt-2">
            <a href="#" class="new-nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-bag me-2"></i> ল্যান্ডিং পেইজ
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> ক্রেট  ল্যান্ডিং পেজ</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> ল্যান্ডিং পেজ লিস্ট</a>
            </div>
        </div>

        <div class="nav-item dropdown mt-2">
            <a href="#" class="new-nav-link dropdown-toggle mt-2" data-bs-toggle="dropdown">
                <i class="bi bi-bar-chart me-2"></i> অ্যাডস ম্যানেজার
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> পিক্সেল সেটআপ</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> ফেসবুক ডোমেইন ভেরিফাই</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> গুগল সার্চ ডোমেইন ভেরিফাই</a>
            </div>
        </div>

        <!-- ওয়েবসাইট সেটিংস -->
        <a class="top-title">ওয়েবসাইট সেটিংস</a>

        <div class="nav-item dropdown mt-2">
            <a href="#" class="new-nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-globe me-2"></i> বিজনেস ইনফর্মেশন
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> যোগাযোগের তথ্য</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> লোগো এন্ড ব্যানার</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> আমাদের সম্পর্কে</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> টার্মস এন্ড কন্ডিশন</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> ডেলিভারি চার্জ সেটিংস</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> অর্ডার এন্ড রিটার্ন পলিসি</a>
            </div>
        </div>

        <div class="nav-item dropdown mt-2">
            <a href="#" class="new-nav-link dropdown-toggle mt-2" data-bs-toggle="dropdown">
                <i class="bi bi-gear me-2"></i> ডিজাইন & থিম সেটিংস
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> কালার সেটিংস</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> সাইজ সেটিংস</a>
            </div>
        </div>


        <!-- একাউন্ট সেটিং -->
        <a class="top-title">একাউন্ট সেটিং</a>

        <a href="" class="nav-item new-nav-link">
            <i class="bi bi-box-arrow-in-right me-2"></i> কানেক্ট কুরিয়ার
        </a>
        <div class="nav-item dropdown">
            <a href="#" class="new-nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-credit-card-2-back me-2"></i> পেমেন্ট গেটওয়ে
            </a>
            <div class="bg-transparent border-0 dropdown-menu">
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> গেটওয়ে কন্ট্রোল</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> পার্সোনাল একাউন্ট</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> বিকাশ PRA একাউন্ট</a>
                <a href="" class="dropdown-item"> <i class="bi bi-caret-right"></i> মার্চেন্ট একাউন্ট</a>
            </div>
        </div>







        <div style="margin: 20px 0;">

        </div>












            <a href="{{ url('/admin/dashboard') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            @if ($admin->hasRole('superadmin') || $admin->hasRole('manager') || $admin->hasRole('admin'))
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Admins</a>
                <div class="bg-transparent border-0 dropdown-menu">

                    @if ($admin->hasRole('superadmin') || $admin->hasRole('admin'))
                    <a href="{{ route('admin.admins.index') }}" class="dropdown-item">Admins</a>
                    @endif
                    <a href="{{ url('admin/block-user') }}" class="dropdown-item">Block Ip</a>
                </div>
            </div>
            
            @if ($admin->hasRole('manager') || $admin->hasRole('superadmin'))
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Accounts</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{url('admin/account-deposit/Courier')}}" class="dropdown-item">Courier Payment</a>
                    <a href="{{url('admin/account-deposit/Office Sale')}}" class="dropdown-item">Office Sale Payment</a>
                    <a href="{{url('admin/account-deposit/Wholesale')}}" class="dropdown-item">Wholesale Payment</a>
                    <a href="{{url('admin/account-deposit/Total')}}" class="dropdown-item">Total Payment</a>
                    <a href="{{url('admin/expense-cost/Boost Cost')}}" class="dropdown-item">Boost Cost</a>
                    <a href="{{url('admin/expense-cost/Office Cost')}}" class="dropdown-item">Office Cost</a>
                    <a href="{{url('admin/expense-cost/Bank Deposit')}}" class="dropdown-item">Bank Deposit</a>
                    <a href="{{url('admin/expense-cost/Total Cost')}}" class="dropdown-item">Total Cost</a>
                </div>
            </div>
            @endif
            
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Store</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.categorys.index') }}" class="dropdown-item">Category</a>
                    <a href="{{ route('admin.subcategorys.index') }}" class="dropdown-item">Sub Category</a>
                    <a href="{{ route('admin.attrvalues.index') }}" class="dropdown-item">Size & Sigment</a>
                    <a href="{{ route('admin.products.index') }}" class="dropdown-item">Single Products</a>
                    <a href="{{ route('mainproducts.index') }}" class="dropdown-item">Varient Products</a>
                    <a href="{{ url('suppliers') }}" class="dropdown-item">Suppliers</a>
                    <a href="{{ route('purchases.index') }}" class="dropdown-item">Purchase</a>
                    <a href="{{ route('returns.index') }}" class="dropdown-item">Return</a>
                    <a href="{{ url('admin/stock/overview') }}" class="dropdown-item">Inventory</a>
                    <a href="{{ route('orderchange.bybarcode') }}" class="dropdown-item">Auto Shipment</a>
                    <a href="{{ route('orderchange.manualbarcode') }}" class="dropdown-item">Manual Shipment</a>
                    <a href="{{ route('orderchange.autoreturn') }}" class="dropdown-item">Auto Return</a>
                    <a href="{{ route('orderchange.manualreturn') }}" class="dropdown-item">Manual Return</a>
                    <!--<a href="{{ route('stocks.index') }}" class="dropdown-item">Stock</a>-->
                </div>
            </div>
            
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Orders</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ url('admin/create/order') }}" class="dropdown-item">Create Order</a>
                    <a href="{{ url('admin_order/Pending') }}" class="dropdown-item">Orders</a>
                    <a href="{{ url('incomplete_order/Incomplete') }}" class="dropdown-item">Incomplete</a>
                    <a href="{{ url('admin/maps') }}" class="dropdown-item">Maps</a>
                    <a href="{{ url('complain/Pending') }}" class="dropdown-item">Complane Box</a>
                </div>
            </div>


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Wholesale</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('wsales.index') }}" class="dropdown-item">W-sale</a>
                    <a href="{{ route('wcustomers.index') }}" class="dropdown-item">W-customer</a>
                    <a href="{{ route('wsalestocks.index') }}" class="dropdown-item">W-sale Stock</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Pages</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.blogs.index') }}" class="dropdown-item">Blog</a>
                    <a href="{{ route('admin.sliders.index') }}" class="dropdown-item">Sliders</a>
                    <a href="{{ route('admin.addbanners.index') }}" class="dropdown-item">Adds</a>
                    <a href="{{ route('admin.menus.index') }}" class="dropdown-item">Youtube Gallery</a>
                    <a href="{{ url('admin/information/about_us') }}" class="dropdown-item">About Us</a>
                    <a href="{{ url('admin/information/contact_us') }}" class="dropdown-item">Contact Us</a>
                    <a href="{{ url('admin/information/terms_codition') }}" class="dropdown-item">Terms Conditions</a>
                    <a href="{{ url('admin/information/privacy_policy') }}" class="dropdown-item">Privacy Policy</a>
                    <a href="{{ url('admin/information/help_center') }}" class="dropdown-item">Help Center</a>
                    <a href="{{ url('admin/information/faq') }}" class="dropdown-item">FAQ</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-cog fa-spin me-2"></i>Settings</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.basicinfos.index') }}" class="dropdown-item">Settings</a>
                    <a href="{{ route('couriers.index') }}" class="dropdown-item">Courier</a>
                    <a href="{{ route('cities.index') }}" class="dropdown-item">City</a>
                    <a href="{{ route('zones.index') }}" class="dropdown-item">Zone</a>
                    {{-- <a href="{{ route('areas.index') }}" class="dropdown-item">Areas</a> --}}
                    <a href="{{ route('payments.index') }}" class="dropdown-item">Payment</a>
                    <a href="{{ route('paymenttypes.index') }}" class="dropdown-item">Payment Method</a>
                    <a href="{{ route('admin.coupons.index') }}" class="dropdown-item">Coupons</a>
                    <a href="{{ route('admin.reviews.index') }}" class="dropdown-item">Reviews</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Report</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('courieruserreport') }}" class="dropdown-item">Courier User Report</a>
                    <a href="{{ route('courierreport') }}" class="dropdown-item">Courier Report</a>
                    <a href="{{ route('userreport') }}" class="dropdown-item">User Report</a>
                    <a href="{{ route('productreport') }}" class="dropdown-item">Product</a>
                    <a href="{{ url('admin/download/orderinfo') }}" class="dropdown-item">Download Order</a>
                </div>
            </div>
            @endif
            
            @if ($admin->hasRole('user')) 
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Orders</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ url('admin/create/order') }}" class="dropdown-item">Create Order</a>
                    <a href="{{ url('admin_order/Pending') }}" class="dropdown-item">Orders</a>
                    <a href="{{ url('incomplete_order/Incomplete') }}" class="dropdown-item">Incomplete</a>
                    <a href="{{ url('admin/maps') }}" class="dropdown-item">Maps</a>
                    <a href="{{ url('complain/Pending') }}" class="dropdown-item">Complane Box</a>
                </div>
            </div>
            @endif
            
            @if ($admin->hasRole('accounts'))
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Accounts</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{url('admin/account-deposit/Courier')}}" class="dropdown-item">Courier Payment</a>
                    <a href="{{url('admin/account-deposit/Office Sale')}}" class="dropdown-item">Office Sale Payment</a>
                    <a href="{{url('admin/account-deposit/Wholesale')}}" class="dropdown-item">Wholesale Payment</a>
                    <a href="{{url('admin/account-deposit/Total')}}" class="dropdown-item">Total Payment</a>
                    <a href="{{url('admin/expense-cost/Boost Cost')}}" class="dropdown-item">Boost Cost</a>
                    <a href="{{url('admin/expense-cost/Office Cost')}}" class="dropdown-item">Office Cost</a>
                    <a href="{{url('admin/expense-cost/Bank Deposit')}}" class="dropdown-item">Bank Deposit</a>
                    <a href="{{url('admin/expense-cost/Total Cost')}}" class="dropdown-item">Total Cost</a>
                </div>
            </div>
             @endif
            @if ($admin->hasRole('accounts') || $admin->hasRole('store'))
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Store</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.categorys.index') }}" class="dropdown-item">Category</a>
                    <a href="{{ route('admin.subcategorys.index') }}" class="dropdown-item">Sub Category</a>
                    <a href="{{ route('admin.attrvalues.index') }}" class="dropdown-item">Size & Sigment</a>
                    <a href="{{ route('admin.products.index') }}" class="dropdown-item">Single Products</a>
                    <a href="{{ route('mainproducts.index') }}" class="dropdown-item">Varient Products</a>
                    <a href="{{ route('purchases.index') }}" class="dropdown-item">Purchase</a>
                    <a href="{{ route('returns.index') }}" class="dropdown-item">Return</a>
                    <a href="{{ url('admin/stock/overview') }}" class="dropdown-item">Inventory</a>
                    <a href="{{ route('orderchange.bybarcode') }}" class="dropdown-item">Auto Shipment</a>
                    <a href="{{ route('orderchange.manualbarcode') }}" class="dropdown-item">Manual Shipment</a>
                    <a href="{{ route('orderchange.autoreturn') }}" class="dropdown-item">Auto Return</a>
                    <a href="{{ route('orderchange.manualreturn') }}" class="dropdown-item">Manual Return</a>
                    <!--<a href="{{ route('stocks.index') }}" class="dropdown-item">Stock</a>-->
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Orders</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ url('admin/create/order') }}" class="dropdown-item">Create Order</a>
                    <a href="{{ url('admin_order/Pending') }}" class="dropdown-item">Orders</a>
                    <a href="{{ url('incomplete_order/Incomplete') }}" class="dropdown-item">Incomplete</a>
                    <a href="{{ url('admin/maps') }}" class="dropdown-item">Maps</a>
                    <a href="{{ url('complain/Pending') }}" class="dropdown-item">Complane Box</a>
                    <a href="{{ url('admin/block-user') }}" class="dropdown-item">Block Ip</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Wholesale</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('wsales.index') }}" class="dropdown-item">W-sale</a>
                    <a href="{{ route('wcustomers.index') }}" class="dropdown-item">W-customer</a>
                    <a href="{{ route('wsalestocks.index') }}" class="dropdown-item">W-sale Stock</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Report</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('courieruserreport') }}" class="dropdown-item">Courier User Report</a>
                    <a href="{{ route('courierreport') }}" class="dropdown-item">Courier Report</a>
                    <a href="{{ route('userreport') }}" class="dropdown-item">User Report</a>
                    <a href="{{ route('productreport') }}" class="dropdown-item">Product</a>
                    <a href="{{ url('admin/download/orderinfo') }}" class="dropdown-item">Download Order</a>
                </div>
            </div>
            @endif

            @if ($admin->hasRole('support')) 
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Orders</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ url('admin/create/order') }}" class="dropdown-item">Create Order</a>
                    <a href="{{ url('admin_order/Pending') }}" class="dropdown-item">Orders</a>
                    <a href="{{ url('incomplete_order/Incomplete') }}" class="dropdown-item">Incomplete</a>
                    <a href="{{ url('admin/maps') }}" class="dropdown-item">Maps</a>
                    <a href="{{ url('complain/Pending') }}" class="dropdown-item">Complane Box</a>
                    <a href="{{ url('admin/block-user') }}" class="dropdown-item">Block Ip</a>
                </div>
            </div> 
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Report</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('courieruserreport') }}" class="dropdown-item">Courier User Report</a>
                    <a href="{{ route('courierreport') }}" class="dropdown-item">Courier Report</a>
                    <a href="{{ route('userreport') }}" class="dropdown-item">User Report</a>
                    <a href="{{ route('productreport') }}" class="dropdown-item">Product</a>
                    <a href="{{ url('admin/download/orderinfo') }}" class="dropdown-item">Download Order</a>
                </div>
            </div>
            @endif
            @if ($admin->hasRole('storeassistant')) 
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Store</a>
                <div class="bg-transparent border-0 dropdown-menu"> 
                    <a href="{{ route('orderchange.bybarcode') }}" class="dropdown-item">Auto Shipment</a>
                    <a href="{{ route('orderchange.manualbarcode') }}" class="dropdown-item">Manual Shipment</a>
                    <a href="{{ route('orderchange.autoreturn') }}" class="dropdown-item">Auto Return</a>
                    <a href="{{ route('orderchange.manualreturn') }}" class="dropdown-item">Manual Return</a> 
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Orders</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ url('admin/create/order') }}" class="dropdown-item">Create Order</a>
                    <a href="{{ url('admin_order/Pending') }}" class="dropdown-item">Orders</a>
                    <a href="{{ url('incomplete_order/Incomplete') }}" class="dropdown-item">Incomplete</a>
                    <a href="{{ url('admin/maps') }}" class="dropdown-item">Maps</a>
                    <a href="{{ url('complain/Pending') }}" class="dropdown-item">Complane Box</a>
                    <a href="{{ url('admin/block-user') }}" class="dropdown-item">Block Ip</a>
                </div>
            </div> 
            
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Report</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('courieruserreport') }}" class="dropdown-item">Courier User Report</a>
                    <a href="{{ route('courierreport') }}" class="dropdown-item">Courier Report</a>
                    <a href="{{ route('userreport') }}" class="dropdown-item">User Report</a>
                    <a href="{{ route('productreport') }}" class="dropdown-item">Product</a>
                    <a href="{{ url('admin/download/orderinfo') }}" class="dropdown-item">Download Order</a>
                </div>
            </div>
            @endif
        </div>
    </nav>
</div>


