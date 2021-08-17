@extends('layouts.default')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Data Karyawan</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employee.store') }}" method="POST">
                        @csrf
        
                        <div class="form-group">
                            <label for="name">Nama Karyawan</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik') }}">
                            <p class="text-danger">{{ $errors->first('nik') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Nomor Telepon</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                            <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                        </div>
                        
                        <div class="form-group">
                            <td> 
                                <a href="{{ route('employee.index') }}" class="btn btn-danger">Kembali
                                    </a>
                                <button class="btn btn-primary">Simpan</button>
                             </td>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

