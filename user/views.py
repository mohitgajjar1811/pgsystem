from django.shortcuts import render, redirect
from .models import student
from .models import Booking
from .models import blog
from .models import team
from .models import test
from .models import apt, cout
from .models import Newsletter
from .models import signup, Order

from django.core.mail import send_mail
import smtplib
from django.conf import settings
import razorpay
from django.views.decorators.csrf import csrf_exempt


# Create your views here.
def loadabout(request):
    data1 = team.objects.all
    return render(request, "user/about.html", {"data": data1})


def loadbooking(request, title, price):
    if request.POST:
        u = request.POST['name']
        e = request.POST['email']
        m = request.POST['mobileno']
        j = request.POST['joiningdate']
        a = request.POST['adult']
        s = request.POST['specialrequest']
        obj = Booking(name=u, email=e, mobileno=m, joiningdate=j, adult=a, specialrequest=s)
        obj.save()
        return redirect(f'/checkout/{price}')
    return render(request, "user/booking.html", {"data": title, "price": price})


#
# def loadbooking(request, title, price):
#     if request.method == 'POST':
#         u = request.POST.get('name')
#         e = request.POST.get('email')
#         m = request.POST.get('mobileno')
#         j = request.POST.get('joiningdate')
#         a = request.POST.get('adult')
#         s = request.POST.get('specialrequest')
#         obj = booking(name=u, email=e, mobileno=m, joiningdate=j, adult=a, specialrequest=s)
#         obj.save()
#         return redirect('/checkout')
#     return render(request, "user/booking.html", {"data": title, "price": price})
#
# views.py
#
# def loadbooking(request, title, price):
#     if request.POST:
#         # Extract data from the POST request
#         u = request.POST['name']
#         e = request.POST['email']
#         m = request.POST['mobileno']
#         j = request.POST['joiningdate']
#         a = request.POST['adult']
#         s = request.POST['specialrequest']
#
#         # Create a booking object and save it to the database
#         obj = booking(name=u, email=e, mobileno=m, joiningdate=j, adult=a, specialrequest=s)
#         obj.save()
#
#         # Redirect to the checkout page after successful booking
#         return redirect('/checkout')
#
#     # If the request method is GET, render the booking.html template with the data
#     return render(request, "user/booking.html", {"data": title, "price": price})

# def loadbooking(request, title, price):
#     if request.method == 'POST':
#         # Extract data from the POST request
#         u = request.POST.get('name', '')
#         e = request.POST.get('email', '')
#         m = request.POST.get('mobileno', '')
#         j = request.POST.get('joiningdate', '')
#         a = request.POST.get('adult', '')
#         s = request.POST.get('specialrequest', '')
#
#         try:
#             # Create a booking object and save it to the database
#             obj = booking(name=u, email=e, mobileno=m, joiningdate=j, adult=a, specialrequest=s)
#             obj.save()
#             # Redirect to the checkout page after successful booking
#             return redirect('/checkout')
#         except Exception as e:
#             # Log the error or handle it appropriately
#             print(e)
#
#     # If the request method is GET, render the booking.html template with the data
#     return render(request, "user/booking.html", {"data": title, "price": price})
def loadcontact(request):
    if request.POST:
        n = request.POST['name']
        e = request.POST['email']
        s = request.POST['subject']
        m = request.POST['message']
        object = student(name=n, email=e, subject=s, message=m)
        object.save()

    return render(request, "user/contact.html")


def checkout(request, price):
    data14 = cout.objects.all()
    if request.method == 'POST':
        # Use get() method to safely retrieve values from request.POST
        rn = request.POST.get('roomname', '')
        b = request.POST.get('bed', '')
        pb = request.POST.get('priceperb', '')
        d = request.POST.get('deposite', '')
        t = request.POST.get('total', '')
        # Create and save object only if all required fields are present
        if rn and b and pb and d and t:
            object = cout(roomname=rn, bed=b, priceperb=pb, deposite=d, total=t)
            object.save()
            # Optionally, add a success message or redirect to a different page
        else:
            # Optionally, add an error message to display to the user if required fields are missing
            pass

    return render(request, "user/checkout.html", {"price": price, "data14": data14})


# def showcheckout(request):
#     data14=checkout.objects.all
#     return render(request,"myadminapp/showcheckout.html",{"data14":data14})

def loadindex(request):
    data = blog.objects.all
    data11 = team.objects.all
    data2 = test.objects.all
    return render(request, "user/index.html", {"data": data, "data11": data11, "data2": data2})


# def loadroom(request):
#     data = blog.objects.all
#     return render(request, "user/room.html", {"data": data})

def loadroom(request):
    data = blog.objects.all()
    request.session['blog_data'] = list(data.values())  # Storing blog data in session
    return render(request, "user/room.html", {"data": data})


def loadservice(request):
    return render(request, "user/service.html")


def loadteam(request):
    data11 = team.objects.all
    return render(request, "user/team.html", {"data11": data11})


def loadtestimonial(request):
    data2 = test.objects.all
    return render(request, "user/testimonial.html", {"data2": data2})


def showcontact(request):
    data1 = student.objects.all
    return render(request, "user/showcontact.html", {"data1": data1})


def updatecontact(request, id):
    if request.POST:
        n = request.POST['name']
        e = request.POST['email']
        s = request.POST['subject']
        m = request.POST['message']
        object = student(name=n, email=e, subject=s, message=m, id=id)
        object.save()
        return redirect('/showcontact')
    return render(request, "user/updatecontact.html")


def showbooking(request):
    data = Booking.objects.all
    return render(request, "myadminapp/showbooking.html", {"data": data})


# def loadlogin(request):
#     if request.POST:
#         e = request.POST['email']
#         p = request.POST['password']
#         count = signup.objects.filter(email=e, password=p).count()
#
#         if count > 0:
#             request.session['is login'] = True
#             request.session['userid'] = abc.objects.values('id').filter(email=e, password=p)[0]['id']
#             return redirect('/#')
#     return render(request, "user/login.html")


def loadlogin(request):
    if request.method == 'POST':
        e = request.POST.get('email')
        p = request.POST.get('password')
        count = signup.objects.filter(email=e, password=p).count()

        if count > 0:
            user = signup.objects.get(email=e, password=p)
            request.session['is_login'] = True
            request.session['userid'] = user.id
            
            next_url = request.GET.get('next') or request.POST.get('next') or '/'
            return redirect(next_url)
            
    return render(request, "user/login.html")


def loadragistration(request):
    if request.POST:
        f = request.POST['firstname']
        l = request.POST['lastname']
        n = request.POST['phoneno']
        e = request.POST['email']
        p = request.POST['password']
        obj = signup(firstname=f, lastname=l, phoneno=n, email=e, password=p)
        obj.save()
        return redirect('/loadlogin')
    return render(request, "user/ragistration.html")


def loadappointment(request):
    if request.POST:
        u = request.POST['name']
        e = request.POST['email']
        s = request.POST['phn']
        m = request.POST['date']
        k = request.POST['time']
        a = request.POST['msg']
        obj = apt(name=u, email=e, phn=s, date=m, time=k, msg=a)
        obj.save()

    return render(request, "user/appointment.html")


def showappointment(request):
    data3 = apt.objects.all
    return render(request, "user/showappointment.html", {"data": data3})


# def checkout(request, price):
#     # request.session['price'] = price
#     # print(price)
#     return render(request, "user/checkout.html", {"price": price})


def News(request):
    if request.POST:
        e = request.POST['email']
        obj = Newsletter(email=e)
        obj.save()
        subject = 'Thank you for registering to our site'
        message = 'will get new messages from our site'
        email_from = settings.EMAIL_HOST_USER
        recipient_list = [e]
        send_mail(subject, message, email_from, recipient_list)
        return redirect('/#')
    return redirect('/#')


def shownews(request):
    data10 = Newsletter.objects.all
    return render(request, 'user/shownews.html', {"data10": data10})


import json
from django.http import JsonResponse


def payment_process(request):
    if not request.session.get('is_login'):
        if request.method == 'POST':
            # Store POST data in session to preserve it after login
            request.session['pending_payment_post'] = request.POST.dict()
        return redirect('/loadlogin?next=/payment_process')

    context = {}  # Define context outside the if block

    # Use POST data if available, otherwise check session for preserved data
    post_data = request.POST
    if not post_data and 'pending_payment_post' in request.session:
        post_data = request.session.pop('pending_payment_post')

    if post_data:
        # Razorpay KeyId and key Secret
        key_id = 'rzp_test_PvM4GxK9MYlCUc'
        key_secret = 'WzsOTRAU4l3oAA1CS7jlVS5E'

        total_value = post_data.get('total')
        blog_data = request.session.get('blog_data', [])
        request.session['totalamount1'] = total_value
        print("TOTAL VALUE", total_value)

        amount = int(float(total_value)) * 100  # Your Amount

        client = razorpay.Client(auth=(key_id, key_secret))

        data = {
            'amount': amount,
            'currency': 'INR',
            "receipt": "PG",
            "notes": {
                'name': 'AK',
                'payment_for': 'OIBP Test'
            }
        }
        user_id = request.session.get('userid')
        print("USERID", user_id)
        
        try:
            result = signup.objects.get(pk=user_id)
            payment = client.order.create(data=data)

            total_amount = post_data.get('total')
            e = result.email  # Fetching email from signup object
            fn = result.firstname
            # order1.uid_id = user.id
            order1 = Order(amt=total_amount, uid_id=user_id, email=e, firstname=fn)
            order1.save()

            context = {'payment': payment, 'result': result, "total_amount": total_value, "blog_data": blog_data}
        except signup.DoesNotExist:
            return redirect('/loadlogin')
            
    return render(request, 'user/payment_process.html', context)

from django.http import HttpResponseServerError

# def payment_process(request):
#     if request.method == 'POST':
#         key_id = 'rzp_test_PvM4GxK9MYlCUc'
#         key_secret = 'WzsOTRAU4l3oAA1CS7jlVS5E'
#
#         total_value = request.POST.get('total')
#         room_ids = request.session.get('room_ids', [])  # Retrieve room IDs from session
#         request.session['totalamount1'] = total_value
#
#         amount = int(float(total_value)) * 100  # Amount in paisa
#
#         client = razorpay.Client(auth=(key_id, key_secret))
#
#         data = {
#             'amount': amount,
#             'currency': 'INR',
#             "receipt": "PG",
#             "notes": {
#                 'name': 'AK',
#                 'payment_for': 'OIBP Test'
#             }
#         }
#
#         # Print room IDs to check if they are correctly retrieved
#         print("Room IDs:", room_ids)
#
#         try:
#             payment = client.order.create(data=data)
#
#             user_id = request.session.get('userid')
#             user = signup.objects.get(pk=user_id)
#             email = user.email
#             firstname = user.firstname
#
#             # Fetch and serialize only the booked rooms data
#             booked_rooms = blog.objects.filter(pk__in=room_ids)
#
#             serialized_booked_rooms = []
#             for room in booked_rooms:
#                 room_data = {
#                     'id': room.id,
#                     'title': room.title,
#                     'price': room.price,
#                     'bed': room.bed,
#                     'detail': room.detail,
#                     # Add other fields you want to include
#                 }
#                 serialized_booked_rooms.append(room_data)
#
#             order = Order.objects.create(
#                 amt=total_value,
#                 uid_id=user_id,
#                 email=email,
#                 firstname=firstname,
#                 blog_data=json.dumps(serialized_booked_rooms)  # Serialize booked rooms data before saving
#             )
#
#             context = {
#                 'payment': payment,
#                 'total_amount': total_value,
#                 'blog_data': serialized_booked_rooms
#             }
#
#             return render(request, 'user/payment_process.html', context)
#
#         except Exception as e:
#             return HttpResponseServerError()
#
#     else:
#         return HttpResponseServerError()
#


from django.http import JsonResponse


@csrf_exempt
def success(request):
    return render(request, "user/success.html")


def logout(request):
    if request.session.get('is_login'):
        del request.session['is_login']  # Remove is_login session variable
    return redirect('/loadlogin')


def get_signup_data_with_related_orders():
    # Query to fetch signup data with related Order data using inner join
    signup_data_with_orders = signup.objects.select_related('order').all()

    return signup_data_with_orders
