@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Notifications | StaffPay</title>
@endsection


<body>

    @section('content')
        <div class="container-xl">
            <div class="position-relative mb-3">
                <div class="row g-3 justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Notifications</h1>
                    </div>
                </div>
            </div>

            @if (PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['SendSheetNotification'])
                <div class="app-card app-card-notification shadow-sm mb-4">
                    <div class="app-card-header px-4 py-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <img class="profile-image" src="{{asset('images/systeme.png')}}" style="border-radius: 50%"
                                                    alt="System Notification">
                            </div><!--//col-->
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <div class="notification-type mb-2"><span class="badge bg-info">{{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['SendSheetNotification']['type']}}</span></div>
                                <h4 class="notification-title mb-1">{{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['SendSheetNotification']['header']}}</h4>

                                <ul class="notification-meta list-inline mb-0">
                                    <li class="list-inline-item">always</li>
                                    <li class="list-inline-item">|</li>
                                    <li class="list-inline-item">{{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['SendSheetNotification']['author']}}</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="app-card-body p-4">
                        <h4 class="notification-title mb-1">
                            {{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['SendSheetNotification']['title']}}
                        </h4>
                        <div class="notification-content">{{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['SendSheetNotification']['message']}}</div>
                    </div>
                </div>
            @endif

            @if (PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['paymentNotification'])
                <div class="app-card app-card-notification shadow-sm mb-4">
                    <div class="app-card-header px-4 py-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <img class="profile-image" src="{{asset('images/systeme.png')}}" style="border-radius: 50%"
                                                    alt="System Notification">
                            </div><!--//col-->
                            <div class="col-12 col-lg-auto text-center text-lg-start">
                                <div class="notification-type mb-2"><span class="badge bg-info">{{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['paymentNotification']['type']}}</span></div>
                                <h4 class="notification-title mb-1">{{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['paymentNotification']['header']}}</h4>

                                <ul class="notification-meta list-inline mb-0">
                                    <li class="list-inline-item">always</li>
                                    <li class="list-inline-item">|</li>
                                    <li class="list-inline-item">{{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['paymentNotification']['author']}}</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="app-card-body p-4">
                        <h4 class="notification-title mb-1">
                            {{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['paymentNotification']['title']}}
                        </h4>
                        <div class="notification-content">{{PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['paymentNotification']['message']}}</div>
                    </div>
                </div>
            @endif


            <div class="app-card app-card-notification shadow-sm mb-4">
                <div class="app-card-header px-4 py-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <div class="app-icon-holder">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg>
                            </div><!--//app-icon-holder-->
                        </div><!--//col-->
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <div class="notification-type mb-2"><span class="badge bg-warning">Billing</span></div>
                            <h4 class="notification-title mb-1">Notification Heading Lorem Ipsum</h4>

                            <ul class="notification-meta list-inline mb-0">
                                <li class="list-inline-item">1 day ago</li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">System</li>
                            </ul>

                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body p-4">
                    <div class="notification-content">Praesent nibh massa, posuere non mollis vel, molestie non mauris.
                        Aenean consequat facilisis orci, sed sagittis mauris interdum at.</div>
                </div><!--//app-card-body-->
                <div class="app-card-footer px-4 py-3">
                    <a class="action-link" href="#">View invoice<svg width="1em" height="1em" viewBox="0 0 16 16"
                            class="bi bi-arrow-right ms-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                            </path>
                        </svg></a>
                </div><!--//app-card-footer-->
            </div><!--//app-card-->

            <div class="app-card app-card-notification shadow-sm mb-4">
                <div class="app-card-header px-4 py-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <img class="profile-image" src="assets/images/profiles/profile-2.png" alt="">
                        </div><!--//col-->
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <div class="notification-type mb-2"><span class="badge bg-secondary">Product</span></div>
                            <h4 class="notification-title mb-1">Notification Heading Lorem Ipsum</h4>

                            <ul class="notification-meta list-inline mb-0">
                                <li class="list-inline-item">7 days ago</li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">James Smith</li>
                            </ul>

                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body p-4">
                    <div class="notification-content">Sed tempor faucibus arcu, nec tristique erat congue sed. Pellentesque
                        auctor ut elit vel feugiat. Sed a mauris tempor, tempor lacus vel, tristique metus. Nulla interdum
                        felis id metus fermentum laoreet.</div>
                </div><!--//app-card-body-->
                <div class="app-card-footer px-4 py-3">
                    <a class="action-link" href="#">View all<svg width="1em" height="1em"
                            viewBox="0 0 16 16" class="bi bi-arrow-right ms-2" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                            </path>
                        </svg></a>
                </div><!--//app-card-footer-->
            </div><!--//app-card-->


            <div class="app-card app-card-notification shadow-sm mb-4">
                <div class="app-card-header px-4 py-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <img class="profile-image" src="assets/images/profiles/profile-3.png" alt="">
                        </div><!--//col-->
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <div class="notification-type mb-2"><span class="badge bg-success">News</span></div>
                            <h4 class="notification-title mb-1">Notification Heading Lorem Ipsum</h4>

                            <ul class="notification-meta list-inline mb-0">
                                <li class="list-inline-item">7 days ago</li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">Kate Sanders</li>
                            </ul>

                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body p-4">
                    <div class="notification-content">Sed tempor faucibus arcu, nec tristique erat congue sed. Pellentesque
                        auctor ut elit vel feugiat. Sed a mauris tempor, tempor lacus vel, tristique metus. Nulla interdum
                        felis id metus fermentum laoreet.</div>
                </div><!--//app-card-body-->
                <div class="app-card-footer px-4 py-3">
                    <a class="action-link" href="#">Read more<svg width="1em" height="1em"
                            viewBox="0 0 16 16" class="bi bi-arrow-right ms-2" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                            </path>
                        </svg></a>
                </div><!--//app-card-footer-->
            </div><!--//app-card-->


        </div>
    @endsection

</body>
