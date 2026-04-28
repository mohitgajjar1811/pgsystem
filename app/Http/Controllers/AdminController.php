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
use App\Models\SmtpSetting;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
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

    public function shownews(Request $request)
    {
        $query = Newsletter::query();
        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }
        $data10 = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['email' => 'Email'];
        return view('admin.shownews', compact('data10', 'sortOptions'));
    }

    public function showappointment(Request $request)
    {
        $query = Apt::query();
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phn', 'like', '%' . $request->search . '%');
            });
        }
        $data = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['name' => 'Name', 'date' => 'Date', 'time' => 'Time'];
        return view('admin.showappointment', compact('data', 'sortOptions'));
    }

    public function showbooking(Request $request)
    {
        $query = Booking::query();
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('mobileno', 'like', '%' . $request->search . '%');
            });
        }
        $data = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['name' => 'Name', 'joiningdate' => 'Joining Date'];
        return view('admin.showbooking', compact('data', 'sortOptions'));
    }

    public function showcontact(Request $request)
    {
        $query = Student::query();
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }
        $data1 = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['name' => 'Name', 'email' => 'Email'];
        return view('admin.showcontact', compact('data1', 'sortOptions'));
    }

    public function addteam(Request $request)
    {
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

    public function showregistration(Request $request)
    {
        $query = Signup::query();
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phoneno', 'like', '%' . $request->search . '%');
            });
        }
        $data12 = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['firstname' => 'First Name', 'lastname' => 'Last Name', 'email' => 'Email'];
        return view('admin.showregistration', compact('data12', 'sortOptions'));
    }

    public function showlogin(Request $request)
    {
        $query = Signup::query();
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }
        $data13 = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['firstname' => 'First Name', 'lastname' => 'Last Name', 'email' => 'Email'];
        return view('admin.showlogin', compact('data13', 'sortOptions'));
    }

    public function deleteregistration($id)
    {
        Signup::where('id', $id)->delete();
        return redirect('/admin/showregistration');
    }

    public function showteam(Request $request)
    {
        $query = Team::query();
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('dsg', 'like', '%' . $request->search . '%');
            });
        }
        $data11 = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['name' => 'Name', 'dsg' => 'Designation'];
        return view('admin.showteam', compact('data11', 'sortOptions'));
    }

    public function deleteteam($id)
    {
        Team::where('id', $id)->delete();
        return redirect('/admin/showteam');
    }

    public function updateteam(Request $request, $id)
    {
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

    public function addroom(Request $request)
    {
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

    public function showroom(Request $request)
    {
        $query = Blog::query();
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('detail', 'like', '%' . $request->search . '%')
                    ->orWhere('bed', 'like', '%' . $request->search . '%');
            });
        }
        $data = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['title' => 'Title', 'price' => 'Price', 'bed' => 'Bed Type'];
        return view('admin.showroom', compact('data', 'sortOptions'));
    }

    public function updateroom(Request $request, $id)
    {
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

    public function deleteroom($id)
    {
        Blog::where('id', $id)->delete();
        return redirect('/admin/showroom');
    }

    public function showorder(Request $request)
    {
        $query = Order::query();
        if ($request->filled('search')) {
            $query->where('order_id', 'like', '%' . $request->search . '%');
            // Assuming order has some identifiable field, update if different
        }
        $data13 = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['order_id' => 'Order ID', 'amount' => 'Amount'];
        return view('admin.showorder', compact('data13', 'sortOptions'));
    }

    public function showcheckout(Request $request)
    {
        $query = Cout::query();
        if ($request->filled('search')) {
            $query->where('roomname', 'like', '%' . $request->search . '%');
        }
        $data14 = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['roomname' => 'Room Name', 'total' => 'Total'];
        return view('admin.showcheckout', compact('data14', 'sortOptions'));
    }

    public function addtest(Request $request)
    {
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

    public function showtest(Request $request)
    {
        $query = Test::query();
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('dsg', 'like', '%' . $request->search . '%');
            });
        }
        $data2 = $query->orderBy($request->get('sort', 'id'), $request->get('direction', 'desc'))->paginate(10)->withQueryString();
        $sortOptions = ['name' => 'Name', 'dsg' => 'Designation'];
        return view('admin.showtest', compact('data2', 'sortOptions'));
    }

    public function updatetest(Request $request, $id)
    {
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

    public function deletetest($id)
    {
        Test::where('id', $id)->delete();
        return redirect('/admin/showtest');
    }

    public function deletenews($id)
    {
        Newsletter::where('id', $id)->delete();
        return redirect('/admin/shownews');
    }

    public function deleteappointment($id)
    {
        Apt::where('id', $id)->delete();
        return redirect('/admin/showappointment');
    }

    public function deletebooking($id)
    {
        Booking::where('id', $id)->delete();
        return redirect('/admin/showbooking');
    }

    public function deleteMultipleBookings(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids && is_array($ids)) {
            Booking::whereIn('id', $ids)->delete();
        }
        return redirect('/admin/showbooking')->with('success', 'Selected bookings deleted successfully.');
    }

    public function deletecontact($id)
    {
        Student::where('id', $id)->delete();
        return redirect('/admin/showcontact');
    }

    public function deleteorder($id)
    {
        Order::where('id', $id)->delete();
        return redirect('/admin/showorder');
    }

    public function deleteMultipleOrders(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids && is_array($ids)) {
            Order::whereIn('id', $ids)->delete();
        }
        return redirect('/admin/showorder')->with('success', 'Selected orders deleted successfully.');
    }

    public function deletecheckout($id)
    {
        Cout::where('id', $id)->delete();
        return redirect('/admin/showcheckout');
    }

    public function deleteMultipleCheckouts(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids && is_array($ids)) {
            Cout::whereIn('id', $ids)->delete();
        }
        return redirect('/admin/showcheckout')->with('success', 'Selected checkouts deleted successfully.');
    }

    public function smtpSettings(Request $request)
    {
        $smtp = SmtpSetting::first();
        if ($request->isMethod('post')) {
            $data = $request->only(['host', 'port', 'encryption', 'username', 'password', 'from_name', 'from_email', 'admin_email']);
            if ($smtp) {
                $smtp->update($data);
            } else {
                SmtpSetting::create($data);
            }
            return redirect('/admin/smtp-settings')->with('success', 'SMTP settings saved successfully! Emails will now be sent using your configured server.');
        }
        return view('admin.smtp_settings', compact('smtp'));
    }
}
