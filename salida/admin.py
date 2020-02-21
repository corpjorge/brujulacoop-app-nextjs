from django.contrib import admin

from .models import User


class UserAdmin(admin.ModelAdmin):
    fields = ['estado_id',
'name',
'email',
'email_verified_at',
'password',
'documento',
'celular',
'fecha_nacimiento',
'remember_token']

admin.site.register(User, UserAdmin)