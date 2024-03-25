@extends('layout');

@section('title','Puppy')


@section('Main')
<form action="/form<?php if (isset($data_per_id)) {
    echo '/' . $data_per_id->id;
} ?>" method="post">
    <?php if (isset($data_per_id)) { ?>
    @method('PUT')
    <?php } ?>
    @csrf
    <div class="col-md-6 mb-3">
      <label for="inputName" class="form-label">Name</label>
      <input type="text" name="Name" class="form-control" id="inputName" value="<?php if (isset($data_per_id)) {
        echo $data_per_id->name;
    } ?>">
    </div>

    <div class="col-md-5 mb-3">
        <label for="formFile" class="form-label">Picture</label>
        <input class="form-control" name="Picture" type="file" id="formFile"value="<?php if (isset($data_per_id)) {
            echo $data_per_id->picture;
        } ?>">
    </div>

    <div class="col-md-4 mb-3">
      <label for="inputType" class="form-label">Type</label>
      <select id="inputType" name="Type" class="form-select" value="<?php if (isset($data_per_id)) {
        echo $data_per_id->type;
    } ?>">
        <option selected>Choose...</option>
        <option>Bird</option>
        <option>Cat</option>
        <option>Dog</option>
        <option>Rabbit</option>
        <option>Turtle</option>
      </select>
    </div>

    <button type="reset" class="btn btn-secondary">Cancel</button>
    <button type="submit" class="btn btn-primary">Submit</button>

  </form>
    <table border="1px">
        <th>No.</th>
        <th>Name</th>
        <th>Picture</th>
        <th>Type</th>
        <th>Tools</th>
        @foreach($datas as $data)
        <tr>
            <td>{{ $loop->index + 1 }}.</td>
            {{-- @dd($data); --}}
            <td>{{ $data->name }}</td>
            <td>{{ $data->picture }}</td>
            <td>{{ $data->type }}</td>
            <td style="display: flex; justify-content:space-around">
                <a href="{{ url('/form/' . $data->id) }}"
                    class="btn btn-warning">Edit</a>
                <form method="post" action="/form/{{ $data->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
