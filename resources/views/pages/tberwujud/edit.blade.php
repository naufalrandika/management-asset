<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="tberwujud"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Asset Tidak Berwujud"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <button class="btn btn-icon btn-3 btn-secondary" type="button" onclick="history.back()">
                        <span class="btn-inner--icon"><i class="material-icons">arrow_back_ios_new</i></span>
                        <span class="btn-inner--text">Kembali</span>
                    </button>
                    <div class="card my-4">
                        <div class="card-header bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Edit Asset</h6>
                        </div>
                        <div class="card-body px-4 pt-3">
                            <form action="{{ route('tberwujud.update', $tberwujud->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-group input-group-static mb-4">
                                    <label for="kode" class="ms-0">Kode Asset</label>
                                    <input type="text" name="kode" id="kode"
                                        class="form-control @error('kode') is-invalid @enderror"
                                        value="{{ old('kode', $tberwujud->kode) }}" required>
                                    @error('kode')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="nama" class="ms-0">Nama Asset</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $tberwujud->nama) }}" required>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static mb-4">
                                    <label for="jenis" class="ms-0">Jenis</label>
                                    <select name="jenis" id="jenis"
                                        class="form-control @error('jenis') is-invalid @enderror" required>
                                        <option value="" disabled selected>Select Jenis</option>
                                        @foreach ($jenisOptions as $jenisId => $jenisNama)
                                            <option value="{{ $jenisId }}"
                                                {{ old('jenis', $tberwujud->jenis) == $jenisId ? 'selected' : '' }}>
                                                {{ $jenisNama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenis')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static mb-4">
                                    <label for="lokasi" class="ms-0">Lokasi</label>
                                    <select name="lokasi" id="lokasi"
                                        class="form-control @error('lokasi') is-invalid @enderror">
                                        <option value="" disabled selected>Select Lokasi</option>
                                        @foreach ($lokasiOptions as $lokasiId => $lokasiNama)
                                            <option value="{{ $lokasiId }}"
                                                {{ old('lokasi', $tberwujud->lokasi) == $lokasiId ? 'selected' : '' }}>
                                                {{ $lokasiNama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static mb-4">
                                    <label for="keadaan" class="ms-0">Keadaan</label>
                                    <select name="keadaan" id="keadaan"
                                        class="form-control @error('keadaan') is-invalid @enderror" required>
                                        <option value="" disabled selected>Select Keadaan</option>
                                        @foreach ($keadaanOptions as $keadaanId => $keadaanNama)
                                            <option value="{{ $keadaanId }}"
                                                {{ old('keadaan', $tberwujud->keadaan) == $keadaanId ? 'selected' : '' }}>
                                                {{ $keadaanNama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('keadaan')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static mb-4">
                                    <label for="keadaan" class="ms-0">Masa Pemakaian</label>
                                    <input type="text" name="masa_pemakaian"
                                        class="form-control @error('masa_pemakaian') is-invalid @enderror"
                                        value="{{ old('masa_pemakaian', $tberwujud->masa_pemakaian) }}">
                                    @error('masa_pemakaian')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static my-3">
                                    <label>Tanggal Terima</label>
                                    <input type="date" name="tanggal_terima"
                                        class="form-control @error('tanggal_terima') is-invalid @enderror"
                                        value="{{ old('tanggal_terima', $tberwujud->tanggal_terima) }}">
                                    @error('tanggal_terima')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static mb-4">
                                    <label for="Nilai" class="ms-0">Nilai</label>
                                    <input type="text" name="Nilai"
                                        class="form-control @error('Nilai') is-invalid @enderror"
                                        value="{{ old('Nilai', $tberwujud->Nilai) }}" required>
                                    @error('Nilai')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static mb-4">
                                    <label for="status" class="ms-0">Status</label>
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="" disabled selected>Select Status</option>
                                        @foreach ($statusOptions as $statusId => $statusNama)
                                            <option value="{{ $statusId }}"
                                                {{ old('status', $tberwujud->status) == $statusId ? 'selected' : '' }}>
                                                {{ $statusNama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static mb-4">
                                    <label for="keterangan" class="ms-0">Jenis</label>
                                    <textarea name="keterangan" class="form-control materialize-textarea @error('keterangan') is-invalid @enderror">{{ old('keterangan', $tberwujud->keterangan) }}</textarea>
                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
