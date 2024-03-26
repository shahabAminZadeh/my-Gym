<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table  class="table table-success table-striped mt-5">
                <thead>
                <tr>
                    <th scope="col">#</th>
<th scope="col">number</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Time</th>
                    <th scope="col">Class Time</th>
                    <th scope="col">Class Date</th>
                    <th scope="col">Destroy</th>
                </tr>
                </thead>
                <tbody>
@foreach($bookings as $book)
    <tr>
        <th scope="row"></th>
        <td>{{$book->id}}</td>
        <td>{{$book->classType->name}}</td>
        <td>{{$book->classType->minutes}}</td>
        <td>{{\Illuminate\Support\Carbon::parse($book->date_time)->format('g:i a')}}</td>
        <td>{{\Illuminate\Support\Carbon::parse($book->date_time)->format('jS M')}}</td>
        <td>
            <form method="post" action="{{ route('booking.destroy',$book->id) }}">
                @csrf
                @method('delete')
                <x-danger-button class="btn btn-outline-danger">Cancel</x-danger-button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
