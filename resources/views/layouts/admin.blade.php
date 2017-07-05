<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Amministrazione ADR</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(mix('/css/app.css')) }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="64.239px" height="46.839px" viewBox="0 0 64.239 46.839" enable-background="new 0 0 64.239 46.839" xml:space="preserve">
                            <g>
                                <g>
                                    <g>
                                        <g>
                                            <path fill="#E2001A" d="M22.202,31.83c-0.1,0-0.2-0.035-0.281-0.105c-0.178-0.155-0.196-0.425-0.041-0.603l10.89-12.481
                                                c0.155-0.177,0.425-0.196,0.603-0.041c0.178,0.155,0.196,0.425,0.041,0.603l-10.89,12.48
                                                C22.439,31.78,22.321,31.83,22.202,31.83z"/>
                                        </g>
                                        <g>
                                            <path fill="#E2001A" d="M29.317,24.348c-0.104,0-0.209-0.038-0.291-0.114c-0.172-0.161-0.182-0.432-0.021-0.604
                                                c0.17-0.183,0.657-0.405,2.666-1.278c1.699-0.738,4.025-1.75,5.892-2.717c2.884-1.496,3.094-2.094,3.108-2.179
                                                c-0.018-0.02-0.083-0.079-0.27-0.144c-6.315-2.199-11.145,2.213-11.192,2.257c-0.172,0.161-0.442,0.152-0.604-0.021
                                                c-0.161-0.172-0.152-0.441,0.02-0.603c0.053-0.05,1.325-1.229,3.445-2.125c1.962-0.829,5.049-1.557,8.611-0.316
                                                c0.679,0.236,0.834,0.625,0.844,0.909c0.049,1.32-3.166,2.962-9.514,5.721c-1.086,0.472-2.209,0.96-2.401,1.097
                                                C29.528,24.309,29.423,24.348,29.317,24.348z"/>
                                        </g>
                                        <g>
                                            <path fill="#E2001A" d="M36.299,26.462c-0.011,0-0.021,0-0.032-0.001c-4.431-0.328-6.978-0.938-7.572-1.813
                                                c-0.192-0.283-0.14-0.521-0.119-0.586c0.07-0.225,0.311-0.35,0.535-0.28c0.18,0.057,0.296,0.221,0.299,0.4
                                                c0.11,0.148,0.99,0.989,6.92,1.427c0.235,0.018,0.412,0.222,0.395,0.457C36.708,26.291,36.52,26.462,36.299,26.462z"/>
                                        </g>
                                    </g>
                                    <g>
                                        <path fill="#E2001A" d="M24.185,35.103c-3.717,0-6.271-0.92-7.796-1.728c-1.948-1.031-3.161-2.71-3.605-4.99
                                            c-0.861-4.417,1.402-9.56,3.284-11.801C21.391,10.246,29.054,6.559,37.09,6.47c5.299-0.064,10.053,1.574,12.413,4.26
                                            c1.766,2.01,2.545,4.204,2.316,6.522c-0.182,1.844-0.996,3.732-2.419,5.611c-1.346,1.778-2.865,3.051-3.651,3.652
                                            c-1.903,1.414-3.771,2.635-5.596,3.662c0.061,0.195-0.025,0.411-0.213,0.507c-5.334,2.741-10.327,4.221-14.838,4.4
                                            C24.789,35.097,24.483,35.103,24.185,35.103z M37.369,7.323c-0.09,0-0.18,0-0.27,0.001c-7.787,0.086-15.214,3.662-20.378,9.809
                                            c-2.054,2.445-3.823,7.38-3.1,11.088c0.393,2.015,1.458,3.495,3.167,4.399c1.512,0.801,4.662,1.98,9.552,1.525
                                            c-2.757-0.133-4.703-0.961-5.971-1.771c-2.888-1.846-4.291-4.873-3.66-7.9c0.755-3.627,3-6.913,6.491-9.501
                                            c2.546-1.887,4.852-2.754,5.077-2.836c7.565-3.32,12.392-2.146,15.109-0.577c2.788,1.611,4.26,4.184,4.448,5.893
                                            c0.481,4.386-2.443,7.424-8.457,8.784c-1.219,0.275-2.937,0.247-3.009,0.245c-0.236-0.004-0.423-0.199-0.419-0.435
                                            c0.005-0.233,0.195-0.419,0.427-0.419c0.002,0,0.005,0,0.008,0c0.016,0,1.687,0.029,2.804-0.224
                                            c2.389-0.541,4.267-1.355,5.584-2.423c1.711-1.387,2.456-3.216,2.212-5.436c-0.235-2.142-2.252-4.221-4.026-5.246
                                            c-2.548-1.472-7.106-2.558-14.353,0.625c-0.009,0.004-0.018,0.008-0.027,0.011c-0.093,0.033-9.312,3.437-11.035,11.712
                                            c-0.556,2.671,0.702,5.356,3.284,7.006c2.09,1.335,10.025,4.862,24.405-5.82c0.747-0.571,2.199-1.788,3.484-3.485
                                            c1.327-1.752,2.084-3.494,2.25-5.179c0.205-2.073-0.504-4.05-2.108-5.875C46.7,8.834,42.314,7.323,37.369,7.323z"/>
                                    </g>
                                    <g>
                                        <path fill="none" stroke="#E2001A" stroke-width="9" stroke-linecap="round" stroke-linejoin="round" d="M29.113,11"/>
                                    </g>
                                    <g>
                                        <path fill="none" stroke="#E2001A" stroke-width="12" stroke-linecap="round" stroke-linejoin="round" d="M37.31,9.593"/>
                                    </g>
                                    <g>
                                        <path fill="none" stroke="#E2001A" stroke-width="12" stroke-linecap="round" stroke-linejoin="round" d="M15.379,29.661"/>
                                    </g>
                                    <g>
                                        <path fill="none" stroke="#E2001A" stroke-width="12" stroke-linecap="round" stroke-linejoin="round" d="M20.606,33.625"/>
                                    </g>
                                    <g>
                                        <path fill="none" stroke="#E2001A" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" d="M28.036,34.192"/>
                                    </g>
                                    <g>
                                        <path fill="none" stroke="#E2001A" stroke-width="12" stroke-linecap="round" stroke-linejoin="round" d="M34.537,32.423"/>
                                    </g>
                                    <g>
                                        <path fill="none" stroke="#E2001A" stroke-width="9" stroke-linecap="round" stroke-linejoin="round" d="M42.198,28.932"/>
                                    </g>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M20.316,11.572c-0.185,0-0.368-0.08-0.495-0.233l-1.931-2.347c-0.225-0.273-0.186-0.677,0.087-0.902
                                        c0.273-0.225,0.677-0.186,0.902,0.087l1.931,2.347c0.225,0.273,0.186,0.677-0.087,0.902
                                        C20.603,11.524,20.459,11.572,20.316,11.572z"/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M28.076,7.758c-0.264,0-0.511-0.165-0.604-0.427l-2.286-6.47c-0.118-0.333,0.057-0.7,0.39-0.817
                                        c0.333-0.118,0.7,0.057,0.817,0.391l2.286,6.469c0.118,0.333-0.057,0.7-0.391,0.817C28.219,7.746,28.147,7.758,28.076,7.758z"/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M38.868,6.173c-0.032,0-0.064-0.002-0.096-0.005c-0.469-0.053-0.806-0.476-0.754-0.944l0.339-3.017
                                        c0.053-0.468,0.477-0.806,0.944-0.753c0.469,0.053,0.806,0.476,0.753,0.944l-0.339,3.017C39.667,5.85,39.297,6.173,38.868,6.173z"
                                    />
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M13.174,17.053c-0.175,0-0.352-0.054-0.503-0.165l-8.518-6.235C3.773,10.374,3.69,9.84,3.969,9.459
                                        c0.279-0.381,0.813-0.463,1.194-0.185l8.517,6.235c0.381,0.278,0.463,0.813,0.185,1.193
                                        C13.697,16.932,13.437,17.053,13.174,17.053z"/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M9.097,24.03c-0.036,0-0.073-0.003-0.109-0.009l-3.637-0.625c-0.349-0.06-0.583-0.391-0.522-0.739
                                        c0.06-0.349,0.391-0.583,0.739-0.523l3.637,0.624c0.349,0.06,0.583,0.391,0.523,0.74C9.674,23.811,9.403,24.03,9.097,24.03z"/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M0.972,36.544c-0.308,0-0.604-0.167-0.757-0.458c-0.219-0.417-0.058-0.934,0.359-1.153l9.027-4.736
                                        c0.417-0.219,0.934-0.059,1.153,0.359c0.219,0.417,0.058,0.934-0.359,1.153l-9.028,4.736C1.242,36.513,1.106,36.544,0.972,36.544z
                                        "/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M14.015,41.197c-0.162,0-0.326-0.046-0.471-0.142c-0.393-0.261-0.501-0.791-0.241-1.184l2.862-4.325
                                        c0.26-0.393,0.791-0.501,1.184-0.241c0.393,0.261,0.501,0.791,0.241,1.184l-2.863,4.325
                                        C14.564,41.063,14.293,41.197,14.015,41.197z"/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M26.625,42.316c-0.001,0-0.002,0-0.003,0c-0.236-0.001-0.426-0.194-0.424-0.43l0.035-5.147
                                        c0.001-0.234,0.192-0.424,0.427-0.424c0.001,0,0.002,0,0.003,0c0.236,0.002,0.426,0.194,0.424,0.43l-0.035,5.147
                                        C27.05,42.126,26.859,42.316,26.625,42.316z"/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M40.105,46.776c-0.332,0-0.647-0.194-0.786-0.519l-4.888-11.44c-0.185-0.434,0.016-0.936,0.45-1.121
                                        c0.434-0.185,0.936,0.016,1.121,0.45l4.888,11.439c0.185,0.434-0.016,0.936-0.45,1.121C40.33,46.754,40.217,46.776,40.105,46.776z
                                        "/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M48.027,34.157c-0.19,0-0.379-0.085-0.505-0.247l-2.727-3.494c-0.217-0.279-0.168-0.682,0.111-0.899
                                        c0.279-0.218,0.681-0.168,0.899,0.111l2.726,3.494c0.218,0.279,0.168,0.682-0.111,0.899
                                        C48.303,34.113,48.164,34.157,48.027,34.157z"/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M49.494,9.58c-0.282,0-0.559-0.14-0.721-0.396c-0.253-0.397-0.137-0.925,0.261-1.179l10.028-6.394
                                        c0.398-0.253,0.926-0.137,1.179,0.261c0.254,0.397,0.137,0.925-0.261,1.179L49.952,9.446C49.81,9.537,49.651,9.58,49.494,9.58z"/>
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M63.701,26.398c-0.048,0-0.097-0.008-0.145-0.025l-11.473-4.129c-0.222-0.08-0.337-0.325-0.257-0.547
                                        c0.08-0.222,0.325-0.336,0.546-0.257l11.473,4.129c0.222,0.08,0.338,0.324,0.258,0.546C64.04,26.29,63.876,26.398,63.701,26.398z"
                                    />
                                </g>
                                <g>
                                    <path fill="#E2001A" d="M54.052,16.132c-0.276,0-0.53-0.18-0.614-0.457c-0.101-0.339,0.091-0.696,0.43-0.797l3.535-1.058
                                        c0.339-0.101,0.696,0.091,0.797,0.43c0.102,0.339-0.091,0.696-0.43,0.797l-3.536,1.058C54.175,16.123,54.113,16.132,54.052,16.132
                                        z"/>
                                </g>
                            </g>
                        </svg>
                        <span>Amministrazione ADR</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="@yield('classlogin')"><a href="{{ route('login') }}">Login</a></li>
                            <li class="@yield('classregister')"><a href="{{ route('register') }}">Registrazione</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('admin.profilo') }}">
                                            Profilo
                                        </a>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
</body>
</html>
