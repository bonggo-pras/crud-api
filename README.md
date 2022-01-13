# Tugas Rekayasa Web Rest API

Nama : Bonggo Prasetyanto <br />
NIM : G.231.18.0126

## Setup
Membuat Database dulu <br />
database contoh {barang}

Migrasi database dulu  <br />
Php spark migrate

## Route list
Penambahan User login <br />

User Login
[POST]  {domain}/login

User Register
[POST]  {domain}/register

Show <br />
[GET] {domain}/makanan

Create <br />
[POST] {domain}/makanan/create

update <br />
[PUT] {domain}/makanan/update/{id}

delete <br />
[DELETE] {domain}/makanan/delete/{id}