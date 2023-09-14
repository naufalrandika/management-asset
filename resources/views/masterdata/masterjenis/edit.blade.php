<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="masterjenis"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Master Jenis"></x-navbars.navs.auth>
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
                            <h6 class="text-white text-capitalize ps-3">Edit Master Jenis</h6>
                        </div>
                        <div class="card-body px-4 pt-3">
                            <form action="{{ route('masterjenis.update',$masterjenis->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-group input-group-static mb-4">
                                    <label for="jenis" class="ms-0">Jenis</label>
                                    <input type="text" name="jenis"
                                        class="form-control @error('jenis') is-invalid @enderror"
                                        value="{{ old('jenis', $masterjenis->jenis) }}" required>
                                    @error('jenis')
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
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
