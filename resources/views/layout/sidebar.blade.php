<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    @auth
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding">
                <a class="app-logo flex items-center" href="{{ route('dashboard') }}">
                    {{-- <img class="logo-icon me-2" src="{{ AppData::getAppData()->logo ? asset('storage/' . AppData::getAppData()->logo) : asset('images/logo.PNG') }}" alt="logo" style="border-radius: 50%; width: 40px; height: 40px;"> --}}
                    <img class="logo-icon me-2"
                        src="{{ AppData::getAppData() && AppData::getAppData()->logo ? asset('storage/' . AppData::getAppData()->logo) : asset('images/logo.PNG') }}"
                        alt="logo">
                    <span class="logo-text"
                        translate="no">{{ AppData::getAppData() && AppData::getAppData()->app_name ? AppData::getAppData()->app_name : 'STAFFSAL' }}</span>
                </a>

            </div>

            <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ $title === 'Dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                    <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Dashboard</span>
                        </a><!--//nav-link-->
                    </li>

                    <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle {{ str_contains($title, 'Employer') ? 'active' : '' }}"
                            href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false"
                            aria-controls="submenu-1">
                            <span class="nav-icon">
                                <!--//Hero Icons: https://heroicons.com -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="bi">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>

                            </span>
                            <span class="nav-link-text">Teachers</span>
                            <span class="submenu-arrow">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span><!--//submenu-arrow-->
                        </a><!--//nav-link-->

                        <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'List Employer' ? 'active' : '' }}"
                                        href="{{ route('employer.index') }}">Teachers List
                                        </a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Create Employer' ? 'active' : '' }}"
                                        href="{{ route('employer.create') }}">Add
                                        Teacher </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle {{ str_contains($title, 'Department') ? 'active' : '' }}"
                            href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false"
                            aria-controls="submenu-2">
                            <span class="nav-icon">
                                <!--//Hero Icons: https://heroicons.com -->
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z">
                                    </path>
                                    <path
                                        d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z">
                                    </path>
                                </svg>
                                {{-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z">
                                </path>
                            </svg> --}}
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="bi">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4v4m0 8v4m0-4h4.5A2.5 2.5 0 0 0 19 13.5V12a2 2 0 0 0-2-2h-2m-3 4H5.5A2.5 2.5 0 0 1 3 13.5V12a2 2 0 0 1 2-2h2m5-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm6 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-10 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg> --}}
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                <path d="M6.5 15V1.5a.5.5 0 0 1 1 0V15h1v-2.5a.5.5 0 0 1 1 0V15h1v-3.5a.5.5 0 0 1 1 0V15h1v-5.5a.5.5 0 0 1 1 0V15h.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H2V2.5a.5.5 0 0 1 1 0V15h1v-4.5a.5.5 0 0 1 1 0V15h1v-7.5a.5.5 0 0 1 1 0V15h1z"/>
                            </svg> --}}
                            </span>
                            <span class="nav-link-text">Departments</span>
                            <span class="submenu-arrow">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span><!--//submenu-arrow-->
                        </a><!--//nav-link-->

                        <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Departments' ? 'active' : '' }}"
                                        href="{{ route('department.index') }}">List
                                        Departments</a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Create Department' ? 'active' : '' }}"
                                        href="{{ route('department.create') }}">Add
                                        Department </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle {{ str_contains($title, 'Course') ? 'active' : '' }}"
                            href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false"
                            aria-controls="submenu-3">
                            <span class="nav-icon">
                                <!--//Hero Icons: https://heroicons.com -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Courses</span>
                            <span class="submenu-arrow">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span><!--//submenu-arrow-->
                        </a><!--//nav-link-->

                        <div id="submenu-3" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Courses' ? 'active' : '' }}"
                                        href="{{ route('course.index') }}">List
                                        Courses</a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Create Course' ? 'active' : '' }}"
                                        href="{{ route('course.create') }}">Add
                                        Course </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle {{ str_contains($title, 'Class') ? 'active' : '' }}"
                            href="#" data-bs-toggle="collapse" data-bs-target="#submenu-4" aria-expanded="false"
                            aria-controls="submenu-4">
                            <span class="nav-icon">
                                <!--//Hero Icons: https://heroicons.com -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Classes</span>
                            <span class="submenu-arrow">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span><!--//submenu-arrow-->
                        </a><!--//nav-link-->

                        <div id="submenu-4" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a class="submenu-link {{ $title == 'Class' ? 'active' : '' }}"
                                        href="{{ route('class.index') }}">Classes List
                                    </a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Create Class' ? 'active' : '' }}"
                                        href="{{ route('class.create') }}">Add
                                        Class </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle {{ str_contains($title, 'Room') ? 'active' : '' }}"
                            href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false"
                            aria-controls="submenu-5">
                            <span class="nav-icon">
                                <!--//Hero Icons: https://heroicons.com -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24" class="bi">
                                    <path fill="currentColor"
                                        d="M4.5 20v-1h2V4h8v1h3v14h2v1h-3V6h-2v14zm3-15v14zm4 7.77q.31 0 .54-.23t.23-.54t-.23-.54t-.54-.23t-.54.23t-.23.54t.23.54t.54.23M7.5 19h6V5h-6z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Classrooms</span>
                            <span class="submenu-arrow">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span><!--//submenu-arrow-->
                        </a><!--//nav-link-->

                        <div id="submenu-5" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Rooms List' ? 'active' : '' }}"
                                        href="{{ route('room.index') }}">Classrooms List
                                    </a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Create Room' ? 'active' : '' }}"
                                        href="{{ route('room.create') }}">Add
                                        Classroom </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle {{ str_contains($title, 'Program') || str_contains($title, 'Attribution') ? 'active' : '' }}"
                            href="#" data-bs-toggle="collapse" data-bs-target="#submenu-6" aria-expanded="false"
                            aria-controls="submenu-6">
                            <span class="nav-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Courses Programming</span>
                            <span class="submenu-arrow">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span><!--//submenu-arrow-->
                        </a><!--//nav-link-->

                        <div id="submenu-6" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Attribution' ? 'active' : '' }}"
                                        href="{{ route('attribution.index') }}">Attributions List</a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Program' ? 'active' : '' }}"
                                        href="{{ route('program.index') }}">Programmings List</a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Create Attribution' ? 'active' : '' }}"
                                        href="{{ route('attribution.create') }}">Add Attribution</a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Create Program' ? 'active' : '' }}"
                                        href="{{ route('program.create') }}">Add Programming</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle {{ str_contains($title, 'State') ? 'active' : '' }}"
                            href="#" data-bs-toggle="collapse" data-bs-target="#submenu-7" aria-expanded="false"
                            aria-controls="submenu-7">
                            <span class="nav-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>

                            </span>
                            <span class="nav-link-text">State</span>
                            <span class="submenu-arrow">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span><!--//submenu-arrow-->
                        </a><!--//nav-link-->

                        <div id="submenu-7" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Attendance State' ? 'active' : '' }}"
                                        href="{{ route('state.index') }}">Attendance State</a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Delay State' ? 'active' : '' }}"
                                        href="{{ route('state_delay.index') }}">Delay State</a>
                                </li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ $title == 'Sheet State' ? 'active' : '' }}"
                                        href="{{ route('state_sheet.index') }}">Sheet State</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ $title == 'Notifications' ? 'active' : '' }}"
                            href="{{ route('notifications.index') }}">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                                    <path fill-rule="evenodd"
                                        d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Notifications</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->

                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link" href="orders.html">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path fill-rule="evenodd"
                                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                                    <circle cx="3.5" cy="5.5" r=".5" />
                                    <circle cx="3.5" cy="8" r=".5" />
                                    <circle cx="3.5" cy="10.5" r=".5" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Orders</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->

                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item has-submenu">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link submenu-toggle {{ str_contains($title, 'Admin') ? 'active' : '' }}"
                                href="#" data-bs-toggle="collapse" data-bs-target="#submenu-8"
                                aria-expanded="false" aria-controls="submenu-8">
                                <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>

                                </span>
                                <span class="nav-link-text">Admin</span>
                                <span class="submenu-arrow">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </span><!--//submenu-arrow-->
                            </a><!--//nav-link-->

                            <div id="submenu-8" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                                <ul class="submenu-list list-unstyled">
                                    <li class="submenu-item"><a
                                            class="submenu-link {{ $title == 'List Admin' ? 'active' : '' }}"
                                            href="{{ route('admin.index') }}">List Admins</a>
                                    </li>
                                    <li class="submenu-item"><a
                                            class="submenu-link {{ $title == 'Create Admin' ? 'active' : '' }}"
                                            href="{{ route('admin.create') }}">Add Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif


                </ul><!--//app-menu-->
            </nav><!--//app-nav-->

            <div class="app-sidepanel-footer">
                <nav class="app-nav app-nav-footer">
                    <ul class="app-menu footer-menu list-unstyled">
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link {{ $title == 'Settings' ? 'active' : '' }}"
                                href="{{ route('settings.index') }}">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                                        <path fill-rule="evenodd"
                                            d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Settings</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                    </ul><!--//footer-menu-->
                </nav>
            </div><!--//app-sidepanel-footer-->

        </div><!--//sidepanel-inner-->
    @endauth

</div><!--//app-sidepanel-->
