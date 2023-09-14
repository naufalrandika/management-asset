<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="berwujud"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Asset Berwujud"></x-navbars.navs.auth>
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
                            <h6 class="text-white text-capitalize ps-3">Tambah Asset Berwujud</h6>
                        </div>
                        <div class="card-body px-4 pt-3">
                            <form action="{{ route('berwujud.store') }}" method="POST">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Kode Asset</label>
                                    <input type="text" name="kode"
                                        class="form-control @error('kode') invalid @enderror"
                                        value="{{ old('kode') }}" required>
                                    @error('kode')
                                        <span class="helper-text" data-error="{{ $message }}"></span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') invalid @enderror"
                                        value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <span class="helper-text" data-error="{{ $message }}"></span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Jenis</option>
                                        @foreach ($jenisOptions as $id => $nama)
                                            <option value="{{ $id }}" {{ old('jenis') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <select name="lokasi" class="form-select @error('lokasi') is-invalid @enderror">
                                        <option value="" disabled selected>Pilih Lokasi</option>
                                        @foreach ($lokasiOptions as $id => $nama)
                                            <option value="{{ $id }}" {{ old('lokasi') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                

                                <div class="input-group input-group-outline my-3">
                                    <select name="keadaan" class="form-select @error('keadaan') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Keadaan</option>
                                        @foreach ($keadaanOptions as $id => $nama)
                                            <option value="{{ $id }}" {{ old('keadaan') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('keadaan')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Masa Pemakaian</label>
                                    <input type="text" name="masa_pemakaian" class="form-control @error('masa_pemakaian') invalid @enderror"
                                        value="{{ old('masa_pemakaian') }}" >
                                    @error('masa_pemakaian')
                                        <span class="helper-text" data-error="{{ $message }}"></span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static my-3">
                                    <label>Tanggal Terima</label>
                                    <input type="date" name="tanggal_terima"
                                        class="form-control @error('tanggal_terima') invalid @enderror"
                                        value="{{ old('tanggal_terima') }}" >
                                    @error('tanggal_terima')
                                        <span class="helper-text" data-error="{{ $message }}"></span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Nilai</label>
                                    <input type="text" name="Nilai"
                                        class="form-control @error('Nilai') invalid @enderror"
                                        value="{{ old('Nilai') }}" required>
                                    @error('Nilai')
                                        <span class="helper-text" data-error="{{ $message }}"></span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Status</option>
                                        @foreach ($statusOptions as $id => $nama)
                                            <option value="{{ $id }}" {{ old('status') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group input-group-static mb-4">
                                    <label for="keterangan" class="ms-0">Keterangan</label>
                                    <textarea name="keterangan" class="form-control materialize-textarea @error('keterangan') invalid @enderror">{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                        <span class="helper-text" data-error="{{ $message }}"></span>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-sm">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
