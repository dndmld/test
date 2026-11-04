data = [2, 8, 16, 12, 4, 24, 42, 20]

print("Data sebelum diurutkan :", data)

data.sort()

print("Data setelah diurutkan :", data)


# Program untuk mengurutkan angka

angka = [2, 8, 16, 12, 4, 24, 42, 20]

print("Angka sebelum diurutkan : ")
print(angka)

angka.sort()
print("Angka setelah diurutkan : ")
print(angka)    

# Program Linked List untuk Mengurutkan Angka

class Node:
    def __init__(self, data):
        self.data = data
        self.next = None


class LinkedList:
    def __init__(self):
        self.head = None

    # Menambahkan data ke Linked List
    def tambah(self, data):
        node_baru = Node(data)

        if self.head is None:
            self.head = node_baru
        else:
            current = self.head

            while current.next is not None:
                current = current.next

            current.next = node_baru

    # Menampilkan data
    def tampilkan(self):
        current = self.head

        while current is not None:
            print(current.data, end=" -> ")
            current = current.next

        print("None")

    # Mengurutkan data dari kecil ke besar
    def urutkan(self):
        current = self.head

        while current is not None:
            temp = current.next

            while temp is not None:
                if current.data > temp.data:
                    current.data, temp.data = temp.data, current.data

                temp = temp.next

            current = current.next


# Membuat Linked List
angka = LinkedList()

# Memasukkan angka
angka.tambah(2)
angka.tambah(8)
angka.tambah(16)
angka.tambah(12)
angka.tambah(4)
angka.tambah(24)
angka.tambah(42)
angka.tambah(20)
angka.tambah(17)

# Menampilkan data sebelum diurutkan
print("Angka sebelum diurutkan:")
angka.tampilkan()

# Mengurutkan angka
angka.urutkan()

# Menampilkan data setelah diurutkan
print("Angka setelah diurutkan:")
angka.tampilkan()

# Membandingkan kecepatan Array dan Linked List

import time

# Data yang sama untuk perbandingan
data_uji = [2, 8, 16, 12, 4, 24, 42, 20, 10]


# =========================
# KECEPATAN ARRAY
# =========================

array_uji = data_uji.copy()

mulai_array = time.perf_counter()

array_uji.sort()

selesai_array = time.perf_counter()

waktu_array = selesai_array - mulai_array


# =========================
# KECEPATAN LINKED LIST
# =========================

linked_uji = LinkedList()

for angka_uji in data_uji:
    linked_uji.tambah(angka_uji)

mulai_linked = time.perf_counter()

linked_uji.urutkan()

selesai_linked = time.perf_counter()

waktu_linked = selesai_linked - mulai_linked


# =========================
# HASIL PERBANDINGAN
# =========================

print("\n=== PERBANDINGAN KECEPATAN ===")

print("Waktu Array       :", waktu_array, "detik")
print("Waktu Linked List :", waktu_linked, "detik")

if waktu_array < waktu_linked:
    print("Array lebih cepat dalam mengurutkan data.")
elif waktu_linked < waktu_array:
    print("Linked List lebih cepat dalam mengurutkan data.")
else:
    print("Kecepatan Array dan Linked List sama.")