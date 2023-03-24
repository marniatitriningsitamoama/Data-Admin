@extends('listdata.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>List Data Admin</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('listdata.create') }}"> Tambah List Admin</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Admin</th>
            <th>Email</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @php($nomor = 1)
        @foreach ($listdata as $listdata)
            <tr>
                <td>{{ $nomor++ }}</td>
                {{-- <td>{{ $matakuliah->nama_matkul }}</td> --}}
                <td>{{ $listdata->nama }}</td>
                <td>{{ $listdata->email }}</td>
                <td>{{ $listdata->status }}</td>
                <td>
                    <form action="{{ route('listdata.destroy', $listdata->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('listdata.show', $listdata->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('listdata.edit', $listdata->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    {{-- <div class="row text-center">
        {!! $matakuliah->links() !!}
    </div> --}}
@endsection
