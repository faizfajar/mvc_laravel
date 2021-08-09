<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta  http-equiv="X-UA-Compatible" content="ie-edge">

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
            crossorigin="anonymous">

        <title>Tugas MVC</title>
    </head>
    <body style="background: lightgray">
        <div class="container mt-5">
            <div class="row">
                <div class="col md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <a href="{{route('blogs.create')}}" class="btn btn-md btn-success mb-3">Tambah Data</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($blogs as $blog )
                                <tr>
                                    <td class="text-center">
                                        <img src="{{Storage::url('public/blogs/').$blog->image}}" alt="" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $blog->title}}</td>
                                    <td>{!! $blog->content !!}</td>

                                <td class="text-center">
                                    <form onsubmit="return confirm('apakah anda yakin?')" action="{{route('blogs.destroy',$blog->id)}} " method="POST">
                                        <a href="{{route('blogs.edit',$blog->id)}}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-primary">DELETE</button>
                                    </form>
                                </td>
                                </tr>
                               @empty
                                   <div class="alert alert-danger">
                                       NO POST
                                   </div>
                               @endforelse
                            </tbody>
                        </table>
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
            crossorigin="anonymous">


        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!-- <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp"
        crossorigin="anonymous"></script> <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
        crossorigin="anonymous"></script> -->
    </body>
</html>
