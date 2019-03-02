<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Hall;
use App\Models\Section;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\File;

class EventController extends Controller
{

    public function event()
    {
        return view('admin.addEvent')->with(['card_title' => 'مشخصات رویداد']);;
    }

    public function addEvent()
    {

        $this->validate(request(),[
            'name' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:10000',

        ],[
            'name.required' => 'وارد کردن اسم الزامی میباشد.',
            'genre.required' => 'وارد کردن ژانر الزامی میباشد.',
            'description.required' => 'وارد کردن توضیحات الزامی میباشد.',
            'start.required' => 'وارد کردن زمان شروع الزامی میباشد.',
            'end.required' => 'وارد کردن زمان پایان الزامی میباشد.',
            'image.required' => 'انتخاب عکس الزامی میباشد.',
            'image.mimes' => 'فرمت عکس باید jpeg،jpg یا png باشد.',
            'image.max' => 'سایز عکس باید کمتر از ۱۰MB باشد.',
        ]);

        $event_data = [
            'name' => request()->input('name'),
            'description' => request()->input('description'),
            'start' => request()->input('start'),
            'end' => request()->input('end'),
        ];

        $image_name = str_random(45).'.'.request()->file('image')->getClientOriginalExtension();
        $imageUpload = request()->file('image')->move(public_path('images'),$image_name);

        if ($imageUpload instanceof File) {
            $event_data['image'] = $image_name;
        }


        if (Event::create($event_data)) {
            return back()->with('success', 'رویداد با موفقیت اضافه شد.');
        } else {
            return back()->with('fail', 'رویداد اضافه نشد !');
        }
    }

    public function hall()
    {
        $events = Event::with('halls')->get();
        $card_title = 'مشخصات سالن';
        return view('admin.addHall', compact('events', 'card_title'));
    }

    public function addHall()
    {
        $this->validate(request(), [
            'name' => 'required',
            'capacity' => 'required',
            'event_id' => 'required',
        ], [
            'name.required' => 'وارد کردن اسم الزامی میباشد.',
            'capacity.required' => 'وارد کردن ظرفیت الزامی میباشد.',
            'event_id.required' => 'وارد کردن سالن الزامی میباشد.'
        ]);

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

    public function showEvent($event_id)
    {
        $event_name = Event::where('id', $event_id)->pluck('name');
        $card_title = $event_name[0];
        $events = Event::where('id', $event_id)->get();
        return view('home.showEvent', compact('events', 'card_title'));
    }

    public function showEventHalls($event_id)
    {
        $card_title = 'نمایش سالن ها';
        $halls = Event::find($event_id)->halls;
        return view('home.showEventHalls', compact('halls', 'event_id', 'card_title'));
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

    public function showEventHallsSections($event_id, $hall_id)
    {
        $card_title = 'نمایش سالن';
        $sections = Hall::find($hall_id)->sections;

        return view('home.showEventHallSections', compact('card_title', 'event_id', 'hall_id', 'sections'));
    }

    public function showSection($event_id, $hall_id, $section_id)
    {
        $card_title = 'نمایش بخش';
        $seats = Section::find($section_id)->seats;
        $row = Section::find($section_id)->seats->groupBy('row_number');
        $rows = count($row);
        $seatsPerRow = count($seats) / $rows;

        return view('home.showEventHallSectionSeat', compact('card_title', 'seats', 'section_id', 'rows', 'seatsPerRow'));
    }




}
