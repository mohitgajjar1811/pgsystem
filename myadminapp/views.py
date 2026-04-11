from django.shortcuts import render,redirect
from user.models import student,apt,Booking,blog,Newsletter,team,signup,Order,cout,test

# Create your views here.

def loadsidebar(request):
    return render(request, "myadminapp/sidebar.html")

def shownews(request):
    data10 = Newsletter.objects.all
    return render(request,'myadminapp/shownews.html',{"data10":data10})

def showappointment(request):
    data3 = apt.objects.all
    return render(request, "myadminapp/showappointment.html", {"data": data3})

def showbooking(request):
    data = Booking.objects.all
    return render(request, "myadminapp/showbooking.html", {"data": data})

def showcontact(request):
    data1 = student.objects.all
    return render(request, "myadminapp/showcontact.html", {"data1": data1})

def addteam(request):
    data11 = team.objects.all
    if request.POST:
        image = request.FILES['image']
        name = request.POST['name']
        dsg = request.POST['dsg']
        object = team(image=image, name=name, dsg=dsg)
        object.save()
        return redirect('/#')
    return render(request,"myadminapp/addteam.html",{"data11":data11})

def showregistration(request):
    data12 = signup.objects.all
    return render(request, "myadminapp/showregistration.html",{"data12":data12})

def showlogin(request):
    data13 = signup.objects.all
    return render(request,"myadminapp/showlogin.html",{"data13":data13})

def delete(request,id):
    signup.objects.get(id=id).delete()
    return redirect('/showregistration')

def showteam(request):
    data11 = team.objects.all
    return render(request,"myadminapp/showteam.html",{"data11":data11})

def delete(request,id):
    team.objects.get(id=id).delete()
    return redirect('/showteam')

def updateteam(request, id):
    data11 = team.objects.get(id=id)
    if request.POST:
        n = request.POST['name']
        d = request.POST['dsg']
        data11.name = n
        data11.dsg = d
        if len(request.FILES)!=0:
            data11.image = request.FILES['image']
        data11.save()
        return redirect('/showteam')
    return render(request, "myadminapp/updateteam.html", {"data11": data11})

def addroom(request):
    data = blog.objects.all
    if request.POST:
        image = request.FILES['image']
        price = request.POST['price']
        bed = request.POST['bed']
        title = request.POST['title']
        detail = request.POST['detail']
        object = blog(image=image, price=price, bed=bed, title=title, detail=detail)
        object.save()
        return redirect('/#')
    return render(request,"myadminapp/addroom.html",{"data":data})

def showroom(request):
    data=blog.objects.all
    return render(request,"myadminapp/showroom.html",{"data":data})


def updateroom(request, id):
        data = blog.objects.get(id=id)
        if request.POST:
            p = request.POST['price']
            b = request.POST['bed']
            t = request.POST['title']
            d = request.POST['detail']
            data.price = p
            data.bed = b
            data.title = t
            data.detail = d
            if len(request.FILES) != 0:
                data.image = request.FILES['image']
            data.save()
            return redirect('/showroom')
        return render(request, "myadminapp/updateroom.html", {"data": data})

def delete(request,id):
    blog.objects.get(id=id).delete()
    return redirect('/showroom')


def showorder(request):
    data13 = Order.objects.all
    return render(request,"myadminapp/showorder.html",{"data13":data13})

# def loadcheckout(request):
#     data14 = loadcheckout.objects.all
#     if request.POST:
#         rname = request.POST['rname']
#         rbed = request.POST['rbed']
#         bprice = request.POST['bprice']
#         btotal = request.POST['btotal']
#         objects = loadcheckout(rname=rname, rbed=rbed, bprice=bprice, btotal=btotal)
#         objects.save()
#     return render(request,"myadminapp/showcheckout.html",{"data14":data14})

def showcheckout(request):
    data14 = cout.objects.all
    return render(request,"myadminapp/showcheckout.html",{"data14":data14})

def addtest(request):
    data = test.objects.all
    if request.POST:
        image = request.FILES['image']
        name = request.POST['name']
        dsg = request.POST['dsg']
        message = request.POST['message']
        objects = test(image=image, name=name, dsg=dsg, message=message)
        objects.save()
        return redirect('/#')
    return render(request,"myadminapp/addtest.html",{"data":data})

def showtest(request):
    data2 = test.objects.all
    return render(request,"myadminapp/showtest.html",{"data2":data2})

def updatetest(request, id):
    data2 = test.objects.get(id=id)
    if request.POST:
        n = request.POST['name']
        d = request.POST['dsg']
        m = request.POST['message']
        data2.name = n
        data2.dsg = d
        data2.message = m
        if len(request.FILES)!=0:
            data2.image = request.FILES['image']
        data2.save()
        return redirect('/showtest')
    return render(request, "myadminapp/updatetest.html", {"data":data2})

def delete(request,id):
    test.objects.get(id=id).delete()
    return redirect('/showtest')




