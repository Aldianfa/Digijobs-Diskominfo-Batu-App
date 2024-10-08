@extends('layout.base')
@section('title')
    Admin | Dashboard
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Tambah Bagian Kerja</h5>
            <div class="card-body">
                <form action="">

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="urusan">Urusan</label>
                            <select name="urusan" id="urusan" class="form-control"
                                aria-placeholder="Pilih Urusan">
        
                                @foreach ($urusan as $item)
                                    <option value="{{ $item->id_urusan }}">{{ $item->nama_urusan }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="mb-3">
                            <label for="program">Program</label>
                            <select name="program.dropdown" id="program" class="form-control" 
                                aria-placeholder="Pilih Program">
                            </select>
                        </div>
        
                        <div class="mb-3">
                            <label for="indikator">Indikator</label>
                            <select name="indikator" id="indikator" class="form-control"
                                aria-placeholder="Pilih Indikator">
                            </select>
                        </div>
        
                    </div>
        
                </form>
            </div>
            
        </div>
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        //on document ready jquery
        $(document).ready(function() {
            // send ajax request to get the program of the selected urusan and append to the select tag       
            function onChangeProgramSelect(url, id_urusan, nama_urusan) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_urusan: id_urusan
                    },
                    success: function(data) {
                        // $('#program').empty();
                        // $('#program').append('<option>Pilih Program</option>');
                        // $.each(data, function (key, value) {
                        //     $('#program').append('<option value="' + key + '">' + value + '</option>');
                        // });

                        let select = $('#program');
                        select.empty();
                        select.attr('placeholder', 'Pilih Program');
                        select.append('<option value="">Pilih Program</option>');
                        $.each(data, function(key, value) {
                            select.append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }

            function onChangeIndikatorSelect(url, id_program, nama_program) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_program: id_program
                    },
                    success: function(data) {
                        $('#indikator').empty();
                        $('#indikator').append('<option>Pilih Indikator Kegiatan</option>');

                        $.each(data, function(key, value) {
                            $('#indikator').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            }

            $('#program').attr('disabled', true);
            $('#indikator').attr('disabled', true);

            $(function() {
                $('#urusan').change(function() {
                    var id_urusan = $(this).val();
                    var url = "{{ URL::to('program-dropdown') }}";
                    var nama_urusan = "nama_program";
                    $('#program').attr('disabled', false).empty();
                    $('#indikator').attr('disabled', true).empty();
                    onChangeProgramSelect(url, id_urusan, nama_urusan);

                });
            });

            $(function() {
                $('#program').change(function() {
                    var id_program = $(this).val();
                    var url = "{{ URL::to('indikator-dropdown') }}";
                    var nama_program = "nama_indikator";

                    $('#indikator').attr('disabled', false);
                    onChangeIndikatorSelect(url, id_program, nama_program);

                });
            });



        });
    </script>

    {{-- <script>
        $('.single-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script> --}}
@endsection
