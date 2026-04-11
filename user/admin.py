from django.contrib import admin

from .models import blog
from .models import team
from .models import test
from .models import Booking
from .models import Newsletter
# Register your models here.


admin.site.register(blog)
admin.site.register(team)
admin.site.register(test)
admin.site.register(Booking)
admin.site.register(Newsletter)