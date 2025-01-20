# YU-QUIZ 🎓

Yu-Quiz adalah aplikasi kuis online berbasis web yang dirancang untuk mendukung kegiatan pembelajaran interaktif. Proyek ini terinspirasi oleh platform seperti Quizizz, dengan beberapa penyesuaian fitur yang disesuaikan untuk kebutuhan siswa, guru, dan admin.

---

## 🎯 Fitur Utama

### 📘 Untuk Role Siswa
- **Pendaftaran dan Login**: Akses mudah melalui proses registrasi.
- **Kelas Publik dan Privat**: 
  - Kelas publik dapat diikuti semua siswa.
  - Kelas privat memerlukan undangan dari guru melalui email.
- **Mengerjakan Kuis**: Siswa dapat mengerjakan kuis yang tersedia di kelas.
- **Hasil Kuis**: Melihat hasil kuis.

### 📗 Untuk Role Guru
- **Halaman Guru**: Dashboard khusus untuk manajemen Quiz.
- **Manajemen Quiz**:
  - Membuat Judul, Icon, dan Deskripsi pada Quiz.
  - Membuat Quiz publik dan privat.
  - Mengelola siswa di kelas privat berdasarkan email.
- **Pembuatan Pertanyaan dan Jawaban**:
  - Membuat Pertanyaan tanpa ada batas maksimal.
  - Membuat 4 jawaban pilihan ganda degan radio button.
- **Melihat Hasil Siswa**: Melihat hasil pengerjaan siswa.
- **Memberikan Remedial**: Memberikan kesempatan siswa untuk memperbaiki nilai.

### 📙 Untuk Admin
- **Statistik Pengguna**: Melihat data seperti jumlah kuis, partisipasi siswa, dll.

---

## 🛠️ Teknologi yang Digunakan
- **Backend**: Laravel
  - Laravel Breeze untuk Siswa dan Guru.
  - Laravel Filament untuk Admin.
- **Frontend**: Tailwind untuk tampilan yang responsif.
- **Database**: MySQL
- **Otentikasi**: Sistem multi-role (siswa, guru, admin).

---
