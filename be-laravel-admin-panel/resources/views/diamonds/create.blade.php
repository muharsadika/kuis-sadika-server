<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" avatar_price="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" avatar_price="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('avatars.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">DIAMOND</label>
                                <input type="file" class="form-control @error('diamond_image') is-invalid @enderror" name="diamond_image">
                            
                                <!-- error message untuk diamond -->
                                @error('diamond')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DIAMOND CATEGORY</label>
                                <input type="text" class="form-control @error('diamond_category') is-invalid @enderror" name="diamond_category" value="{{ old('diamond_category') }}" placeholder="Masukkan Avatar name">
                            
                                <!-- error message untuk diamond_category -->
                                @error('diamond_category')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DIAMOND AMOUNT</label>
                                <input type="text" class="form-control @error('diamond_amount') is-invalid @enderror" name="diamond_amount" value="{{ old('diamond_amount') }}" placeholder="Masukkan Avatar name">
                            
                                <!-- error message untuk diamond_amount -->
                                @error('diamond_amount')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DIAMOND PRICE</label>
                                {{-- <input class="form-control @error('avatar_price') is-invalid @enderror" name="avatar_price" rows="5" placeholder="Masukkan Price">{{ old('avatar_price') }} --}}
                                <input type="text" class="form-control @error('avatar_price') is-invalid @enderror" name="avatar_price" value="{{ old('avatar_price') }}" placeholder="Masukkan avatar_price">
                            
                                <!-- error message untuk avatar_price -->
                                @error('avatar_price')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    // CKEDITOR.replace( 'avatar_price' );
</script>
</body>
</html>