<div class="sticky top-0 z-50 flex items-center justify-between py-5 px-4 lg:px-14 bg-white shadow-sm">

    <div id="menu">
        <div class="hidden lg:flex flex-col lg:flex-row lg:items-center lg:gap-10 w-full lg:w-auto mt-5 lg:mt-0">
            <ul class="flex flex-col lg:flex-row items-start lg:items-center gap-4 font-medium text-base w-full lg:w-auto">
                <li>
                    <a href="{{ route('landing') }}"
                        class="{{ request()->is('/') ? 'text-primary' : '' }} hover:text-gray-600">
                        Beranda
                    </a>
                </li>
                @foreach (\App\Models\NewsCategory::all() as $category)
                    <li><a href="{{ route('news.category', $category->slug) }}"
                            class="hover:text-primary">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="hidden lg:flex items-center gap-2 mt-4 lg:mt-0 w-full lg:w-auto relative">
        <div class="relative w-full lg:w-auto">
            <input type="text" placeholder="Cari berita..."
                class="border border-slate-300 rounded-full px-4 py-2 pl-8 w-full text-sm font-normal lg:w-auto focus:outli"
                id="searchInput" />
            <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                <img src="{{ asset('assets/img/search.png') }}" alt="search" class="w-4">
            </span>
        </div>
        <a href="login.html"
            class="bg-primary px-8 py-2 rounded-full text-white font-semibold h-fit text-sm lg:text-base">
            Masuk
        </a>
    </div>

    </div>