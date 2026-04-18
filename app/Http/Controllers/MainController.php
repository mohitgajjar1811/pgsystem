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
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class MainController extends Controller
{
    public function loadabout() {
        $data1 = Team::all();
        return view('user.about', ['data' => $data1]);
    }

    public function loadbooking(Request $request, $title, $price) {
        if ($request->isMethod('post')) {
            $obj = new Booking();
            $obj->name = $request->input('name');
            $obj->email = $request->input('email');
            $obj->mobileno = $request->input('mobileno');
            $obj->joiningdate = $request->input('joiningdate');
            $obj->adult = $request->input('adult');
            $obj->specialrequest = $request->input('specialrequest');
            $obj->save();
            return redirect('/checkout/' . $price);
        }
        return view('user.booking', ['data' => $title, 'price' => $price]);
    }

    public function loadcontact(Request $request) {
        if ($request->isMethod('post')) {
            $obj = new Student();
            $obj->name = $request->input('name');
            $obj->email = $request->input('email');
            $obj->subject = $request->input('subject');
            $obj->message = $request->input('message');
            $obj->save();
        }
        return view('user.contact');
    }

    public function checkout(Request $request, $price) {
        $data14 = Cout::all();
        if ($request->isMethod('post')) {
            if ($request->has(['roomname', 'bed', 'priceperb', 'deposite', 'total'])) {
                $obj = new Cout();
                $obj->roomname = $request->input('roomname');
                $obj->bed = $request->input('bed');
                $obj->priceperb = $request->input('priceperb');
                $obj->deposite = $request->input('deposite');
                $obj->total = $request->input('total');
                $obj->save();
            }
        }
        return view('user.checkout', ['price' => $price, 'data14' => $data14]);
    }

    public function loadindex() {
        $data = Blog::all();
        $data11 = Team::all();
        $data2 = Test::all();
        return view('user.index', ['data' => $data, 'data11' => $data11, 'data2' => $data2]);
    }

    public function loadroom(Request $request) {
        $data = Blog::all();
        $request->session()->put('blog_data', $data->toArray());
        return view('user.room', ['data' => $data]);
    }

    public function loadservice() {
        return view('user.service');
    }

    public function loadteam() {
        $data11 = Team::all();
        return view('user.team', ['data11' => $data11]);
    }

    public function loadtestimonial() {
        $data2 = Test::all();
        return view('user.testimonial', ['data2' => $data2]);
    }

    public function showcontact() {
        $data1 = Student::all();
        return view('user.showcontact', ['data1' => $data1]);
    }

    public function loadragistration(Request $request) {
        if ($request->isMethod('post')) {
            $obj = new Signup();
            $obj->firstname = $request->input('firstname');
            $obj->lastname = $request->input('lastname');
            $obj->phoneno = $request->input('phoneno');
            $obj->email = $request->input('email');
            $obj->password = \Illuminate\Support\Facades\Hash::make($request->input('password'));
            $obj->save();
            return redirect('/loadlogin');
        }
        return view('user.ragistration');
    }

    public function loadappointment(Request $request) {
        if ($request->isMethod('post')) {
            $obj = new Apt();
            $obj->name = $request->input('name');
            $obj->email = $request->input('email');
            $obj->phn = $request->input('phn');
            $obj->date = $request->input('date');
            $obj->time = $request->input('time');
            $obj->msg = $request->input('msg');
            $obj->save();
        }
        return view('user.appointment');
    }

    public function showappointment() {
        $data = Apt::all();
        return view('user.showappointment', ['data' => $data]);
    }

    public function payment_process(Request $request) {
        if (!session('is_login')) {
            if ($request->isMethod('post')) {
                session(['pending_payment_post' => $request->all()]);
            }
            return redirect('/loadlogin?next=/payment_process');
        }

        $postData = $request->all();
        if (!$postData && session('pending_payment_post')) {
            $postData = session('pending_payment_post');
            session()->forget('pending_payment_post');
        }

        if ($postData) {
            $keyId = env('RAZORPAY_KEY_ID');
            $keySecret = env('RAZORPAY_KEY_SECRET');
            $api = new Api($keyId, $keySecret);

            $totalValue = $postData['total'] ?? 0;
            $amount = intval(floatval($totalValue) * 100);

            $orderData = [
                'receipt'       => 'PG',
                'amount'        => $amount,
                'currency'      => 'INR',
                'notes'         => [
                    'name'          => 'AK',
                    'payment_for'   => 'OIBP Test'
                ]
            ];

            try {
                $paymentOrder = $api->order->create($orderData);
                $userId = session('userid');
                $user = Signup::find($userId);
                
                if (!$user) {
                    return redirect('/loadlogin');
                }

                // Create local order record
                $order = new Order();
                $order->amt = $totalValue;
                $order->uid_id = $userId;
                $order->email = $user->email;
                $order->firstname = $user->firstname;
                $order->save();

                $blogData = session('blog_data', []);

                return view('user.payment_process', [
                    'payment' => $paymentOrder,
                    'result' => $user,
                    'total_amount' => $totalValue,
                    'blog_data' => $blogData
                ]);

            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        return redirect('/');
    }

    public function success() {
        return view('user.success');
    }

    public function News(Request $request) {
        if ($request->isMethod('post')) {
            $obj = new Newsletter();
            $obj->email = $request->input('email');
            $obj->save();
            // Email sending placeholder: 
            // Mail::raw('will get new messages from our site', function($msg) use ($obj) { $msg->to($obj->email)->subject('Thank you for registering'); });
            return redirect('/');
        }
        return redirect('/');
    }
}
