<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
        <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('admin.dashboard') || request()->routeIs('admin.dashboard.*')) here show @endif"><span
                        class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-element-11 fs-2"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                    class="path4"></span></i></span><span class="menu-title">Dashboards</span><span
                            class="menu-arrow"></span></span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.dashboard')) active @endif"
                                href="{{ route('admin.dashboard') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Default</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.dashboard.news')) active @endif"
                                href="{{ route('admin.dashboard.news') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Berita</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Post</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('admin.pengumuman.index')) active @endif"
                        href="{{ route('admin.pengumuman.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-information fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                        <span class="menu-title">Pengumuman</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('admin.news.*')) here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-book fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Berita</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.news.category')) active @endif"
                                href="{{ route('admin.news.category') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kategori</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.news.index')) active @endif"
                                href="{{ route('admin.news.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Berita</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.news.comment')) active @endif"
                                href="{{ route('admin.news.comment') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Komentar</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('admin.kajian.*')) here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-award fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                        <span class="menu-title">Kajian</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.kajian.index')) active @endif"
                                href="{{ route('admin.kajian.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Kajian</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.kajian.comment')) active @endif"
                                href="{{ route('admin.kajian.comment') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Komentar</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('admin.gallery.*')) here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-picture fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Galeri</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.gallery.album')) active @endif"
                                href="{{ route('admin.gallery.album') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Album</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.gallery.index')) active @endif"
                                href="{{ route('admin.gallery.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Foto & Video</span>
                            </a>
                        </div>
                    </div>
                </div>

                    <div class= "menu-item">
                        <a class="menu-link @if (request()->routeIs('admin.welcomeSpeech.index')) active @endif"
                            href="{{ route('admin.welcomeSpeech.index') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-star fs-2"></i>
                            </span>
                            <span class="menu-title">Kata Sambutan</span>
                        </a>
                    </div>

                <div class="menu-item pt-5">
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Asset</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('admin.asset.type')) active @endif"
                        href="{{ route('admin.asset.type') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-size fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Tipe Asset</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('admin.asset.create')) active @endif"
                        href="{{ route('admin.asset.create') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-add-item fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                        <span class="menu-title">Tambah Aset</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('admin.asset.index')) here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-copy-success fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Aset</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @php
                            $asset_types = \App\Models\AssetType::all();
                        @endphp
                        @foreach ($asset_types as $asset_type)
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('admin.asset.index', $asset_type->slug) }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title text-capitalize">{{ $asset_type->name }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content"><span
                            class="menu-heading fw-bold text-uppercase fs-7">Administrasi</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('admin.letter.*')) here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-directbox-default fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Persuratan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.letter.in')) active @endif"
                                href="{{ route('admin.letter.in') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Surat Masuk</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.letter.out')) active @endif"
                                href="{{ route('admin.letter.out') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Surat keluar</span>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="menu-item pt-5">
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Menu</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('admin.profile.index')) active @endif"
                        href="{{ route('admin.profile.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-setting-3 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </span>
                        <span class="menu-title">Profile Menu</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('admin.ortom.index')) active @endif"
                        href="{{ route('admin.ortom.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-setting-3 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </span>
                        <span class="menu-title">Ortom Menu</span>
                    </a>
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content"><span
                            class="menu-heading fw-bold text-uppercase fs-7">Administrator</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('admin.user.*')) here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-profile-user fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Anggota</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.user.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title @if (request()->routeIs('admin.user.index')) active @endif">Anggota
                                    Aktif</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.user.register')) active @endif"
                                href="{{ route('admin.user.register') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pendaftaran</span>
                                <span class="menu-badge">
                                    <span class="badge badge-secondary">
                                        @php
                                            $users = \App\Models\User::where('status', 0)->get();
                                            echo $users->count();
                                        @endphp
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('admin.inbox.index')) active @endif"
                        href="{{ route('admin.inbox.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-sms fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Inbox</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->routeIs('admin.setting.*')) here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-setting-2 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Pengaturan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.setting.website')) active @endif"
                                href="{{ route('admin.setting.website') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Website</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->routeIs('admin.setting.banner')) active @endif"
                                href="{{ route('admin.setting.banner') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Banner</span>
                            </a>
                        </div>
                    </div>
                </div>


                {{-- <div class="menu-item">
                    <a class="menu-link" href="{{ route('admin.inbox.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-calendar-8 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                            </i>
                        </span>
                        <span class="menu-title">Subscriber</span>
                    </a>
                </div> --}}

            </div>
        </div>
    </div>
</div>
