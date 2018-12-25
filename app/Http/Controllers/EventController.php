<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Section;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function hall()
    {
        return view('admin.addHall')->with(['card_title' => 'مشخصات سالن']);
    }

    public function addHall()
    {

        if (Hall::create(request()->all())) {
            return back()->with('success', 'سالن با موفقیت اضافه شد.');
        } else {
            return back()->with('fail', 'سالن اضافه نشد !');
        }
    }

    public function section()

    {
        $halls = Hall::with('sections')->get();
        $card_title = 'مشخصات بخش';
        return view('admin.addSection', compact('halls', 'card_title'));
    }

    public function addSection()
    {

        $this->validate(request(), [
            'name' => 'required',
            'hall_id' => 'required|integer',
        ], [
            'name.required' => 'وارد کردن اسم الزامی میباشد.',
            'hall_id.required' => 'وارد کردن شماره سالن الزامی میباشد.'
        ]);

        if (Section::create(request()->all())) {
            return back()->with('success', 'بخش با موفقیت اضافه شد.');
        } else {
            return back()->with('fail', 'بخش اضافه نشد !');
        }
    }

    public function seat()
    {
        $halls = Hall::all();
        $sections = Section::all();
        $card_title = 'مشخصات صندلی ها';
        return view('admin.addSeat', compact('sections', 'halls', 'card_title'));

    }

    public function getSections(Request $request)
    {
        if ($request->ajax()) {
            $sections = Section::where('hall_id', $request->hall_id)->get();
            return $sections->toJson();
        }

    }

    public function addSeat()
    {
        $this->validate(request(), [
            'seats' => 'required',
            'rows' => 'required',
            'hall_id' => 'required|integer',
            'section_id' => 'required|integer',
        ], [
            'seats.required' => 'وارد کردن تعداد صندلی الزامی میباشد.',
            'rows.required' => 'وارد کردن ردیف الزامی میباشد.',
            'hall_id.required' => 'انتخاب کردن یک سالن الزامی میباشد.',
            'section_id.required' => 'انتخاب کردن یک بخش الزامی میباشد.'
        ]);

        $seats = request()->input('seats');
        $rows = request()->input('rows');
        $seatsPerRow = $seats / $rows;
        $seatsPerRow = intval($seatsPerRow);


        if ($seatsPerRow > 20 || $seatsPerRow < 10) {
            return back()->with('fail', 'تعداد صندلی در هر ردیف باید بین ۱۰ و ۲۰ باشد !');
        } else {
            $seats_ids = DB::table('seats')->select('id')->whereBetween('row_number', [1, $rows])->whereBetween('seat_number', [1, $seatsPerRow])->get();
            $section_id = request()->input('section_id');
            $section = Section::find($section_id);
            foreach ($seats_ids as $seats_id) {
                $section->seats()->attach($seats_id->id);
            }
            return back()->with('success', 'صندلی ها با موفقیت اضافه شدند.');
        }

    }

    public function showHall($hall_id)
    {
        $card_title = 'نمایش سالن';

        $sections = Section::with('halls')->where('hall_id', $hall_id)->get();
        return view('admin.ShowHall', compact('card_title', 'sections'));
    }

    public function showSection($section_id)
    {
        $card_title = 'نمایش بخش';
        $seats = Section::find($section_id)->seats;
        $row = Section::find($section_id)->seats->groupBy('row_number');
        $rows = count($row);
        $seatsPerRow = count($seats) / $rows;

        return view('admin.ShowSection', compact('card_title', 'seats', 'section_id', 'rows', 'seatsPerRow'));
    }



}
