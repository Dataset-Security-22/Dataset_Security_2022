

<div class="container">
    <form method="post" action="{{ route('images.store') }}"
          enctype="multipart/form-data">
      @csrf
      <div class="image">
        <label><h4>Add image</h4></label>
        <input type="file" class="form-control" required name="image">
      </div>

      <div class="post_button">
        <button type="submit" class="btn btn-success">Add</button>
      </div>
    </form>
  </div>

  <div class="container">
    <h3>View all image</h3><hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Image id</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody>
        @foreach($imageData as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>
	     <img src="{{ url('public/Image/'.$data->image) }}"
 style="height: 100px; width: 150px;">
	  </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
