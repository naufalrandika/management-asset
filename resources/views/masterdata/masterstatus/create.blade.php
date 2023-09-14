<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="masterstatus"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Master Status"></x-navbars.navs.auth>
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
                            <h6 class="text-white text-capitalize ps-3">Tambah Master Status</h6>
                        </div>
                        <div class="card-body px-4 pt-3">
                            <form action="{{ route('masterstatus.store') }}" method="POST">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Status</label>
                                    <input type="text" name="status"
                                        class="form-control @error('status') invalid @enderror"
                                        value="{{ old('status') }}" required>
                                    @error('status')
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
