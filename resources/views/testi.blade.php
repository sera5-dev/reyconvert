@extends('main')

@section('title', 'Testimoni')

@section('testimoni', 'active')

@section('content')

<div class="row">

  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Testimoni</h6>
      </div>
      <div class="card-body">
        <div class="table-resposive">
          <table class="table" id="dataTable">
            <thead>
              <th>#</th>
              <th>nama</th>
              <th>kontak</th>
              <th>komentar</th>
              <th>video</th>
              <th>star</th>
              <th>action</th>
            </thead>
            <tbody>
              @foreach($testimonis as $testi)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$testi->nama}}</td>
                <td>{{$testi->kontak}}</td>
                <td>{{$testi->komentar}}</td>
                <td>{{$testi->video}}</td>
                <td>{{$testi->star}}</td>
                <td>
                  <form action="{{route('testi-delete')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$testi->id}}">
                    <button class="btn btn-danger btn-circle" type="submit" value="delete">
                      <i class="fas fa-trash"></i>
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

  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Create Testimoni</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('testi-create') }}" method="post">
          @csrf
          <div class="form-group">
            <input class="form-control " type="text" name="nama" placeholder="nama" required>
          </div>
          <div class="form-group">
            <input class="form-control " type="text" name="kontak" placeholder="kontak" required>
          </div>
          <div class="form-group">
            <textarea class="form-control " type="text" name="komentar" placeholder="komentar" required></textarea>
          </div>
          <div class="form-group">
            <textarea class="form-control " type="text" name="video" placeholder="link video (optional)"></textarea>
          </div>
          <div class="form-group">
            <select name="star" class="form-control">
              <option disabled>Nilai Testimoni</option>
              <option>5</option>
              <option>4</option>
              <option>3</option>
              <option>2</option>
              <option>1</option>
            </select>
          </div>
          <div class="form-group">
            <input type="date" name="tanggal" class="form-control" id="">
          </div>
          <div class="form-group">
            <input type="submit" class="form-control  btn btn-primary" value="create">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
