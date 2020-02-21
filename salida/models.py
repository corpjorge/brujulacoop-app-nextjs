from django.db import models


class User(models.Model):
	estado_id = models.CharField(max_length=200)
	name = models.CharField(max_length=200)
	email = models.CharField(max_length=200)
	email_verified_at = models.CharField(max_length=200)
	password = models.CharField(max_length=200)
	documento = models.CharField(max_length=200)
	celular = models.CharField(max_length=200)
	fecha_nacimiento = models.CharField(max_length=200)
	remember_token = models.CharField(max_length=200)