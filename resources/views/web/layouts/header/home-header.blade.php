<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('{{ asset('storage/' . $desa->banner) }}')">
        <div class="container">
            <div class="row mt-n6">
                <div class="col-lg-7 text-center mx-auto">
                    @if ($desa->logo)
                        <img src="{{ asset('storage/' . $desa->logo) }}" class="header-image">
                    @else
                        <img src="/assets/img/default_logo.png" class="header-image">
                    @endif
                    <h1 class="text-white font-outfit pt-3">{{ $desa->nama_desa }}</h1>
                    <p class="text-white font-outfit mt-3">
                        {{ $desa->alamat }}<br>
                        {{ $config->sebutan_kecamatan . ' ' . $desa->nama_kecamatan . ' ' . $config->sebutan_kabupaten . ' ' . $desa->nama_kabupaten }}.
                        {{ $desa->kodepos }}<br>
                        Telepon: {{ $desa->telepon }}
                    </p>
                </div>
            </div>
        </div>
        <div class="position-absolute w-100 z-index-1 bottom-0">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="moving-waves">
                    <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                    <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                    <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                    <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
                </g>
            </svg>
        </div>
    </div>
</header>
