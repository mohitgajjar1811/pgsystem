"""
URL configuration for webapp project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/5.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from django.conf import settings
from django.conf.urls.static import static
from user import views

urlpatterns = [
                  path('admin/', admin.site.urls),
                  path('', views.loadindex),
                  path('loadabout', views.loadabout),
                  path('loadbooking/<str:title>/<int:price>/', views.loadbooking, name='loadbooking'),
                  path('loadcontact', views.loadcontact),
                  path('loadroom', views.loadroom),
                  path('loadservice', views.loadservice),
                  path('loadteam', views.loadteam),
                  path('loadtestimonial', views.loadtestimonial),
                  path('showcontact', views.showcontact),
                  path('updatecontact/<int:id>', views.updatecontact),
                  path('showbooking', views.showbooking),
                  path('loadlogin', views.loadlogin),
                  path('loadragistration', views.loadragistration),
                  path('loadappointment', views.loadappointment),
                  path('showappointment', views.showappointment),
                  path('checkout/<int:price>', views.checkout),
                  path('payment_process', views.payment_process),
                  path('success', views.success),
                  path('News', views.News),
                  path('shownews', views.shownews),
                  path('logout', views.logout),
                  path('get_signup_data_with_related_orders', views.get_signup_data_with_related_orders),


              ] + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
