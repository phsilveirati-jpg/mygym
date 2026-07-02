<?php

namespace App\Http\Controllers;

use App\Events\ClassCanceled;
use App\Models\ClassType;
use App\Models\ScheduledClass;
use Illuminate\Http\Request;

class ScheduleClassController extends Controller
{
    public function index()
    {
        $scheduledClasses = auth()->user()->scheduledClasses()->upcoming()->oldest('date_time')->get();

        return view('instructor.upcoming')->with('scheduledClasses', $scheduledClasses);
    }

    public function create()
    {
        $classTypes = ClassType::all();

        return view('instructor.schedule')->with('classTypes', $classTypes);
    }

    public function store(Request $request)
    {
        $date_time = $request->input('date').' '.$request->input('time');

        $request->merge([
            'date_time' => $date_time,
            'instructor_id' => auth()->user()->id,
        ]);

        $validate = $request->validate([
            'class_type_id' => 'required',
            'instructor_id' => 'required',
            'date_time' => 'required|unique:scheduled_classes,date_time|after:now',
        ]);

        ScheduledClass::create($validate);

        return redirect()->route('schedule.index');
    }

    public function destroy(ScheduledClass $schedule)
    {

        if (auth()->user()->cannot('delete', $schedule)) {
            abort(403);
        }

        ClassCanceled::dispatch($schedule);
        $schedule->members()->detach();
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
