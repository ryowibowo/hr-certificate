@extends('layouts.default')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Data Trainer</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('trainer.store') }}" method="POST">
                        @csrf
        
                        <div class="form-group">
                            <label for="name">Tambah Trainer</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone_number">Nomor Telepon</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                            <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Training</label>
                            <input type="text" name="training_name" class="form-control" value="{{ old('training_name') }}">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <td> 
                                <a href="{{ route('trainer') }}" class="btn btn-danger">Kembali
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

