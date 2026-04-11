from django.db import models


class student(models.Model):
    name = models.CharField(max_length=30)
    email = models.EmailField()
    subject = models.CharField(max_length=30)
    message = models.CharField(max_length=100)


class Booking(models.Model):
    name = models.CharField(max_length=50)
    email = models.EmailField()
    mobileno = models.CharField(max_length=10)
    joiningdate = models.CharField(max_length=100)
    adult = models.CharField(max_length=10)
    specialrequest = models.CharField(max_length=200)


# class booking(models.Model):
#     name = models.CharField(max_length=50)
#     email = models.EmailField()
#     mobileno = models.CharField(max_length=10)
#     date = models.DateField()
#     sr = models.CharField(max_length=10)
#     # Define choices for the dropdown
#     SRB_CHOICES = [
#         ('1', 'Option 1'),
#         ('2', 'Option 2'),
#         ('3', 'Option 3'),
#         ('4', 'Option 4'),
#         ('5', 'Option 5'),
#         ('6', 'Option 6'),
#     ]
#     # Define the field using choices
#     srb = models.CharField(max_length=1, choices=SRB_CHOICES)


class blog(models.Model):
    image = models.ImageField(upload_to='image/')
    price = models.CharField(max_length=10)
    bed = models.CharField(max_length=10)
    title = models.CharField(max_length=100)
    detail = models.CharField(max_length=500)


class team(models.Model):
    image = models.ImageField(upload_to='image1/')
    name = models.CharField(max_length=100)
    dsg = models.CharField(max_length=100)


class test(models.Model):
    message = models.CharField(max_length=500)
    image = models.ImageField(upload_to='image2/')
    name = models.CharField(max_length=20)
    dsg = models.CharField(max_length=20)


class apt(models.Model):
    name = models.CharField(max_length=100)
    email = models.EmailField(max_length=100)
    phn = models.CharField(max_length=10)
    date = models.DateField()
    time = models.TimeField()
    msg = models.CharField(max_length=500)


class Newsletter(models.Model):
    email = models.EmailField()


class signup(models.Model):
    firstname = models.CharField(max_length=50)
    lastname = models.CharField(max_length=50)
    phoneno = models.CharField(max_length=20)
    email = models.EmailField()
    password = models.CharField(max_length=10)


class cout(models.Model):
    roomname = models.CharField(max_length=50)
    bed = models.CharField(max_length=10)
    priceperb = models.CharField(max_length=10)
    deposite = models.CharField(max_length=10)
    total = models.CharField(max_length=10)


class Order(models.Model):
    uid = models.ForeignKey(signup, models.CASCADE)
    amt = models.CharField(max_length=10)
    email = models.EmailField()
    firstname = models.CharField(max_length=10)


class BlogOrder(models.Model):
    order = models.ForeignKey(Order, on_delete=models.CASCADE)
    blog_item = models.ForeignKey(blog, on_delete=models.CASCADE)
    quantity = models.PositiveIntegerField(default=1)



# class loadcheckout(models.Model):
#     rname = models.CharField(max_length=10)
#     rbed = models.CharField(max_length=10)
#     bprice = models.CharField(max_length=10)
#     btotal = models.CharField(max_length=10)
