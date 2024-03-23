@extends('include.sidebar_admin')

@section('title', 'Dentist - Setting')

@section('content')

    <div class="container-setting">
        <div class="content-before-modal">
            <h2><b>Settings</b></h2>
            <h4>Selamat dan terima kasih banyak atas apresiasi Anda!</h4>
            <p>kami sangat senang mendengar bahwa pengalaman pengguna dengan website Dents dalam memonitoring kebersihan gigi
                dan siswa telah memuaskan. Kami berkomitmen untuk terus mengembangkan aplikasi ini agar dapat memberikan
                layanan yang lebih baik lagi.
                Kami sangat berterima kasih atas kepercayaan Anda dalam menggunakan layanan kami. Semoga aplikasi ini dapat
                terus membantu memantau dan meningkatkan kebersihan gigi serta memberikan manfaat positif bagi pengguna.
                Kami berharap dapat bertemu kembali di masa depan. Jika Anda memiliki saran atau masukan lebih lanjut,
                jangan ragu untuk berbagi. Terima kasih sekali lagi atas dukungan dan kepercaya</p>
        </div>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#resetModal">Reset All Data</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetModalLabel">Konfirmasi Reset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin mereset data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="{{ route('admin.delete_data') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
