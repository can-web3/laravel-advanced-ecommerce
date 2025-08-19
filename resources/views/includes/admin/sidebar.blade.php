<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
        </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('panel.getDashboard') }}">
                <div class="parent-icon">
                    <i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Kontrol Paneli</div>
            </a>
        </li>

        <li>
            <a href="{{ route('panel.getDashboard') }}">
                <div class="parent-icon">
                    <i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Ürünler</div>
            </a>
        </li>

        <li>
            <a href="{{ route('panel.getDashboard') }}">
                <div class="parent-icon">
                    <i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Kategoriler</div>
            </a>
        </li>

        <li>
            <a href="{{ route('panel.getDashboard') }}">
                <div class="parent-icon">
                    <i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Siparişler</div>
            </a>
        </li>

        <li>
            <a href="{{ route('panel.getDashboard') }}">
                <div class="parent-icon">
                    <i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Raporlar</div>
            </a>
        </li>

        {{-- <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon">
                    <i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Content</div>
            </a>
            <ul>
                <li>
                    <a href="content-grid-system.html"><i class='bx bx-radio-circle'></i>Grid System</a>
                </li>
            </ul>
        </li> --}}
    </ul>
    <!--end navigation-->
</div>
