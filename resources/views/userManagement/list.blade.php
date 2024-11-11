@extends('layout')

@section('content')
    {{-- Halaman User List --}}
    <div class="pb-96">
        <div class="grid grid-cols-2">
            <a href="/adduser" class="btn btn-primary w-fit col-span-1">
                <span class="font-bold mr-2">+</span>
                Tambah
            </a>
            <div class="col-span-1 right">
                <input type="text" name="query" id="query" class="form-control" placeholder="Cari pengguna dengan nama atau email...">
            </div>
        </div>
        <table class="table table-bordered mt-3">
            <thead class="h-10 font-bold">
                <td class="min-w-10">No</td>
                <td class="min-w-72">Nama Pengguna</td>
                <td class="min-w-60">Email</td>
                <td class="w-60">Aksi</td>
            </thead>
            <tbody id="listUser">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name ?? $user->user_fullname }}</td>
                    <td>{{ $user->email ?? $user->user_email }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-warning mb-2" href="/edituser/{{ $user->id ?? $user->user_id }}">Edit</a>
                            <form id="delete-form-{{ $user->id }}" action="{{ route('delete.user', $user->id ?? $user->user_id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-danger" onclick="confirmDelete({{ $user->id ?? $user->user_id }})">Delete</a>
                                @include('sweetalert.success')
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function() {
        $('#query').on('keyup', function() {
            var query = $(this).val();

            if(query.length >= 0) {
                $.ajax({
                    url: "{{ route('search.user') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'GET',
                    data: { query: query },
                    success: function(response) {
                        $('#listUser').html('');
                        $.each(response, function(index, result) {
                            var deleteUrl = "{{ route('delete.user', '')}}/" + result.id;
                            $('#listUser').append(`
                                <tr>
                                    <td>${index+1}</td>
                                    <td>${result.name}</td>
                                    <td>${result.email}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a class="btn btn-warning mb-2" href="/edituser/${result.id}">Edit</a>
                                            <form id="delete-form-${result.id}" action="${deleteUrl}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-danger" onclick="confirmDelete(${ result.id })">Delete</a>
                                                @include('sweetalert.success')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            `);
                        });
                    }
                })
            }
        })
    })
    </script>
@endsection