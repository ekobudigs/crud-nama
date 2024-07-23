<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Contacts</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create New Contact</a>
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
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Keterangan</th>
                <th width="280px">Action</th>
            </tr>
            @php $i = 0; @endphp
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $contact->nama }}</td>
                <td>{{ $contact->alamat }}</td>
                <td>{{ $contact->no_hp }}</td>
                <td>{{ $contact->keterangan }}</td>
                <td>
                    <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
