<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Booking;
use App\Models\Student;
use App\Models\Cout;
use App\Models\Blog;
use App\Models\Test;
use App\Models\Signup;
use App\Models\Apt;
use App\Models\Newsletter;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard() {
        $stats = [
            'teams' => Team::count(),
            'rooms' => Blog::count(),
            'testimonials' => Test::count(),
            'contacts' => Student::count(),
            'appointments' => Apt::count(),
            'bookings' => Booking::count(),
            'registrations' => Signup::count(),
            'newsletter' => Newsletter::count(),
            'orders' => Order::count(),
            'checkouts' => Cout::count(),
        ];
        return view('admin.sidebar', compact('stats'));
    }

    public function shownews() {
        $data10 = Newsletter::all();
        return view('admin.shownews', ['data10' => $data10]);
    }

    public function showappointment() {
        $data = Apt::all();
        return view('admin.showappointment', ['data' => $data]);
    }

    public function showbooking() {
        $data = Booking::all();
        return view('admin.showbooking', ['data' => $data]);
    }

    public function showcontact() {
        $data1 = Student::all();
        return view('admin.showcontact', ['data1' => $data1]);
    }

    public function addteam(Request $request) {
        $data11 = Team::all();
        if ($request->isMethod('post')) {
            $obj = new Team();
            $obj->name = $request->input('name');
            $obj->dsg = $request->input('dsg');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img_uploads/image'), $filename);
                $obj->image = 'image/' . $filename;
            } else {
                $obj->image = "";
            }
            $obj->save();
            return redirect('/admin');
        }
        return view('admin.addteam', ['data11' => $data11]);
    }

    public function showregistration() {
        $data12 = Signup::all();
        return view('admin.showregistration', ['data12' => $data12]);
    }

    public function showlogin() {
        $data13 = Signup::all();
        return view('admin.showlogin', ['data13' => $data13]);
    }

    public function deleteregistration($id) {
        Signup::where('id', $id)->delete();
        return redirect('/admin/showregistration');
    }

    public function showteam() {
        $data11 = Team::all();
        return view('admin.showteam', ['data11' => $data11]);
    }

    public function deleteteam($id) {
        Team::where('id', $id)->delete();
        return redirect('/admin/showteam');
    }

    public function updateteam(Request $request, $id) {
        $data11 = Team::find($id);
        if ($request->isMethod('post')) {
            $data11->name = $request->input('name');
            $data11->dsg = $request->input('dsg');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img_uploads/image'), $filename);
                $data11->image = 'image/' . $filename;
            }
            $data11->save();
            return redirect('/admin/showteam');
        }
        return view('admin.updateteam', ['data11' => $data11]);
    }

    public function addroom(Request $request) {
        $data = Blog::all();
        if ($request->isMethod('post')) {
            $obj = new Blog();
            $obj->price = $request->input('price');
            $obj->bed = $request->input('bed');
            $obj->title = $request->input('title');
            $obj->detail = $request->input('detail');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img_uploads/image'), $filename);
                $obj->image = 'image/' . $filename;
            } else {
                $obj->image = "";
            }
            $obj->save();
            return redirect('/admin');
        }
        return view('admin.addroom', ['data' => $data]);
    }

    public function showroom() {
        $data = Blog::all();
        return view('admin.showroom', ['data' => $data]);
    }

    public function updateroom(Request $request, $id) {
        $data = Blog::find($id);
        if ($request->isMethod('post')) {
            $data->price = $request->input('price');
            $data->bed = $request->input('bed');
            $data->title = $request->input('title');
            $data->detail = $request->input('detail');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img_uploads/image'), $filename);
                $data->image = 'image/' . $filename;
            }
            $data->save();
            return redirect('/admin/showroom');
        }
        return view('admin.updateroom', ['data' => $data]);
    }

    public function deleteroom($id) {
        Blog::where('id', $id)->delete();
        return redirect('/admin/showroom');
    }

    public function showorder() {
        $data13 = Order::all();
        return view('admin.showorder', ['data13' => $data13]);
    }

    public function showcheckout() {
        $data14 = Cout::all();
        return view('admin.showcheckout', ['data14' => $data14]);
    }

    public function addtest(Request $request) {
        $data = Test::all();
        if ($request->isMethod('post')) {
            $obj = new Test();
            $obj->name = $request->input('name');
            $obj->dsg = $request->input('dsg');
            $obj->message = $request->input('message');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img_uploads/image'), $filename);
                $obj->image = 'image/' . $filename;
            } else {
                $obj->image = "";
            }
            $obj->save();
            return redirect('/admin');
        }
        return view('admin.addtest', ['data' => $data]);
    }

    public function showtest() {
        $data2 = Test::all();
        return view('admin.showtest', ['data2' => $data2]);
    }

    public function updatetest(Request $request, $id) {
        $data2 = Test::find($id);
        if ($request->isMethod('post')) {
            $data2->name = $request->input('name');
            $data2->dsg = $request->input('dsg');
            $data2->message = $request->input('message');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img_uploads/image'), $filename);
                $data2->image = 'image/' . $filename;
            }
            $data2->save();
            return redirect('/admin/showtest');
        }
        return view('admin.updatetest', ['data' => $data2]);
    }

    public function deletetest($id) {
        Test::where('id', $id)->delete();
        return redirect('/admin/showtest');
    }

    public function deletenews($id) {
        Newsletter::where('id', $id)->delete();
        return redirect('/admin/shownews');
    }

    public function deleteappointment($id) {
        Apt::where('id', $id)->delete();
        return redirect('/admin/showappointment');
    }

    public function deletebooking($id) {
        Booking::where('id', $id)->delete();
        return redirect('/admin/showbooking');
    }

    public function deletecontact($id) {
        Student::where('id', $id)->delete();
        return redirect('/admin/showcontact');
    }

    public function deleteorder($id) {
        Order::where('id', $id)->delete();
        return redirect('/admin/showorder');
    }

    public function deletecheckout($id) {
        Cout::where('id', $id)->delete();
        return redirect('/admin/showcheckout');
    }
}
