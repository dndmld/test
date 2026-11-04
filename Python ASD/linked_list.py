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