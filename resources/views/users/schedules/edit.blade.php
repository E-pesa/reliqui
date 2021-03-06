@extends('layouts.master')

@section('title', Auth::user()->name)

@section('content')
    <main class="col-md-8 offset-md-2 my-3 p-3">
        <h4>Edit schedule</h4>
        <hr>

        <form action="{{ route('schedules.destroy', $schedule->token) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="day">Day*</label>
                    <select name="day" class="form-control" required>
                        <option value="{{ $schedule->day }}">{{ $schedule->day }}</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="start_time">Start Time*</label>
                    <input type="time" class="form-control" name="start_time" id="start_time" value="{{ old('start_time', $schedule->start_time) }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="end_time">End Time*</label>
                    <input type="time" class="form-control" name="end_time" id="end_time" value="{{ old('end_time', $schedule->end_time) }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="estimated_service_time">Estimated Service Time*</label>
                    <input type="number" class="form-control" name="estimated_service_time" id="estimated_service_time" value="{{ old('estimated_service_time', $schedule->estimated_service_time) }}" required>
                    <small class="form-text text-muted">In minutes</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="estimated_price_service">Estimated Price Service*</label>
                    <input type="number" class="form-control" name="estimated_price_service" id="estimated_price_service" value="{{ old('estimated_price_service', $schedule->estimated_price_service) }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="is_available">Visibility*</label>
                    <select name="is_available" class="form-control" required>
                        <option value="{{ $schedule->is_available }}">
                            @if($schedule->is_available)
                                Available
                            @else
                                Unavailable
                            @endif    
                        </option>
                        <option value="0">Unavailable</option>
                        <option value="1">Available</option>
                    </select>
                </div>
            </div>

            <hr>

            <button class="btn btn-sm btn-danger" type="submit">UPDATE</button>
            <a href="{{ route('schedules.index') }}" class="btn btn-sm btn-secondary">CANCEL</a>
        </form>
    </main>
@endsection