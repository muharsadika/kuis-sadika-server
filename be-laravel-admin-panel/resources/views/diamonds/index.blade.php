<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: white">

    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-md-3 mt-0"> --}}
            @include('welcome')
            {{-- </div> --}}
            <div class="col-md-9 mt-2" style="width: 1400px; margin-left: 190px; position: relative">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="card border-0 shadow-sm rounded">
                            <div class="card-body">
                                <a href="{{ route('diamonds.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                    DIAMOND</a>
                                <table class="table table-bordered w-100"
                                    style="background-color: rgba(211, 211, 211, 0.100)">
                                    <thead>
                                        <tr>
                                            <th scope="col">DIAMOND IMAGE</th>
                                            <th scope="col">DIAMOND CATEGORY</th>
                                            <th scope="col">DIAMOND AMOUNT</th>
                                            <th scope="col">DIAMOND PRICE</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($diamonds as $diamond)
                                            <tr>
                                                <td class="text-center">
                                                    <img src="{{ $diamond->diamond_image }}" class="rounded"
                                                        style="width: 150px">
                                                </td>
                                                <td>{{ $diamond->diamond_category }}</td>
                                                <td>{!! $diamond->diamond_amount !!} Pcs</td>
                                                <td>Rp {!! number_format($diamond->diamond_price, 0, ',', '.') !!}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('diamonds.destroy', $diamond->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('diamonds.show', $diamond->id) }}"
                                                            class="btn btn-sm btn-dark">SHOW</a>
                                                        <a href="{{ route('diamonds.edit', $diamond->id) }}"
                                                            class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">HAPUS</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Post belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</body>

</html>
