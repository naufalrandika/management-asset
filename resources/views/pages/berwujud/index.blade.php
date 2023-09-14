<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="berwujud"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Asset Berwujud"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Data Asset Berwujud</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <a href="{{ route('berwujud.create') }}"
                                        class="btn btn-info btn-sm position-relative mx-3 z-index-2">
                                        Tambah
                                    </a>
                                    <a href="{{ route('berwujud.downloadPDF') }}"
                                        class="btn btn-success btn-sm position-relative mx-3 z-index-2">Download
                                        PDF</a>
                                    <blockquote class="blockquote p-0 position-relative mx-3 z-index-2">
                                        <p class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                            Aset berwujud merujuk pada aset fisik atau material yang memiliki bentuk
                                            fisik yang jelas dan dapat dipegang.
                                            Ini adalah jenis aset yang mudah terlihat, diraba, dan diidentifikasi.
                                            Contoh dari aset berwujud meliputi Tanah dan bangunan, Kendaraan, Peralatan
                                            dan mesin
                                            ,Inventaris (barang dagangan atau bahan baku)
                                            ,Perabotan dan perlengkapan</p>
                                    </blockquote>
                                    <div class="dropdown position-relative mx-3 z-index-2">
                                        <form action="{{ route('berwujud.index') }}" method="GET">
                                            <select name="jenis" id="jenis"
                                                class="btn bg-gradient-dark dropdown-toggle">
                                                <option value="">Semua Jenis</option>
                                                @foreach ($jenisOptions as $id => $jenis)
                                                    <option value="{{ $id }}">{{ $jenis }}</option>
                                                @endforeach
                                            </select>
                                            <select name="lokasi" id="lokasi"
                                                class="btn bg-gradient-dark dropdown-toggle">
                                                <option value="">Semua Lokasi</option>
                                                @foreach ($lokasiOptions as $id => $lokasi)
                                                    <option value="{{ $id }}">{{ $lokasi }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-info">Filter</button>
                                        </form>
                                    </div>

                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Kode Asset</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jenis Asset</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Lokasi</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Kaadaan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Masa Pemakaian</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal Terima</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nilai</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $datas)
                                            <tr>
                                                <td class="text-center text-xs font-weight-bold mb-0 ">
                                                    {{ $data->firstItem() + $index }}</td>
                                                <td class="text-center mb-0 text-sm">{{ $datas->kode }}</td>
                                                <td class="text-center mb-0 text-sm">{{ $datas->nama }}</td>
                                                <td class="text-center mb-0 text-sm">{{ $datas->jenis }}</td>
                                                <td class="text-center mb-0 text-sm">{{ $datas->lokasi }}</td>
                                                <td class="text-center mb-0 text-sm">{{ $datas->keadaan }}</td>
                                                <td class="text-center mb-0 text-sm">{{ $datas->masa_pemakaian }}</td>
                                                <td class="text-center mb-0 text-sm">{{ $datas->tanggal_terima }}</td>
                                                <td class="text-center mb-0 text-sm">Rp
                                                    {{ number_format($datas->Nilai, 0, ',', '.') }}</td>
                                                <td class="text-center mb-0 text-sm">{{ $datas->status }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('berwujud.edit', $datas->id) }}"
                                                        class="btn btn-warning btn-sm position-relative"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>
                                                </td>
                                                <td class="align-middle">
                                                    <form action="{{ route('berwujud.destroy', $datas->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm position-relative"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                            data-toggle="tooltip" data-original-title="Hapus data">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ $data->links() }}
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
