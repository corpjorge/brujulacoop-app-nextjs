from django.http import JsonResponse
from salida.models import User
from django.core import serializers
from django.http import HttpResponse


def index(request):
    data = serializers.serialize("json", User.objects.all())
    return HttpResponse(data, content_type='application/json')

