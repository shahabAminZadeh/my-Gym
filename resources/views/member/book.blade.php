<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table  class="table table-success table-striped mt-5">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">number</th>
                    <th scope="col">Class Name & instructor</th>
                    <th scope="col">Class Name & instructor</th>
                    <th scope="col">Time</th>
                    <th scope="col">Class Time</th>
                    <th scope="col">Class Date</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($scheduledClass as $schedule)
                    <tr>
                        <th scope="row"></th>
                        <td>{{$schedule->id}}</td>
                        <td>{{$schedule->classType->name}}
                            <p style="color: #9c1919 ;font-size: 15px">instructor: {{$schedule->instrudoctor->name}} </p>
                        </td>
                        <td>{{$schedule->classType->description}}</td>
                        <td>{{$schedule->classType->minutes}}</td>
                        <td>{{\Illuminate\Support\Carbon::parse($schedule->date_time)->format('g:i a')}}</td>
                        <td>{{\Illuminate\Support\Carbon::parse($schedule->date_time)->format('jS M')}}</td>
                        <td>

                            <form method="post" action="{{ route('booking.store') }}">
                                @csrf
                                <input type="hidden" name="scheduled_class_id" value="{{$schedule->id}}">
                                <x-primary-button class="btn btn-outline-primary">Book</x-primary-button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

