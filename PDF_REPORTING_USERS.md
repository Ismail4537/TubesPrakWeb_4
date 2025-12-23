# PDF Reporting Users - Documentation

## 📋 Overview
Fitur untuk generate laporan PDF yang berisi data semua users yang terdaftar di sistem Acarra Event Management.

## 🎯 Task
**TUB-43: PDF Reporting Users**

## 🚀 Features Implemented

### 1. **UserReportController**
Controller yang menangani generate PDF untuk data users.

**Location:** `app/Http/Controllers/UserReportController.php`

**Methods:**
- `downloadPDF()` - Download PDF file ke komputer
- `viewPDF()` - Preview PDF di browser (stream)

### 2. **PDF Template**
Template Blade yang diformat untuk PDF dengan styling yang professional.

**Location:** `resources/views/reports/users-pdf.blade.php`

**Features:**
- Header dengan judul report
- Meta information (tanggal, total users)
- Tabel data users dengan kolom:
  - No
  - Name
  - Email
  - Phone
  - Birthdate
  - Role (dengan badge warna)
  - Registered At
- Footer dengan timestamp dan informasi sistem

### 3. **Routes**
Routes untuk akses fitur PDF reporting.

**URLs:**
- **Download PDF:** `/reports/users/pdf/download`
  - Route Name: `reports.users.pdf.download`
  - Method: GET
  - Middleware: `isAdmin`
  
- **View PDF:** `/reports/users/pdf/view`
  - Route Name: `reports.users.pdf.view`
  - Method: GET
  - Middleware: `isAdmin`

## 📦 Dependencies
- **barryvdh/laravel-dompdf** (v3.1.1)
  - dompdf/dompdf (v3.1.4)
  - dompdf/php-font-lib (1.0.1)
  - dompdf/php-svg-lib (1.0.0)
  - masterminds/html5 (2.10.0)
  - sabberworm/php-css-parser (v8.9.0)

## 🔧 Installation
```bash
composer require barryvdh/laravel-dompdf
```

## 💻 Usage

### From Dashboard (Recommended)
1. Login sebagai Admin
2. Navigate ke Dashboard > Users
3. Klik tombol "Download PDF Report" atau "View PDF Report"

### Via URL (Direct Access)
```
# Download PDF
http://acarra.test/reports/users/pdf/download

# View/Preview PDF
http://acarra.test/reports/users/pdf/view
```

### Programmatically
```php
// Download PDF
return redirect()->route('reports.users.pdf.download');

// View PDF
return redirect()->route('reports.users.pdf.view');
```

## 📝 File Structure
```
app/
  Http/
    Controllers/
      UserReportController.php          # PDF Controller

resources/
  views/
    reports/
      users-pdf.blade.php                # PDF Template

routes/
  web.php                                 # Routes definition
```

## 🎨 PDF Design Features
- Professional header dengan branding color (#4F46E5)
- Meta information box dengan background abu-abu
- Tabel dengan alternating row colors
- Role badges dengan warna berbeda:
  - Admin: Blue badge
  - User: Green badge
- Footer dengan timestamp dan disclaimer
- Responsive design untuk paper A4 portrait

## 🔒 Security
- ✅ Protected dengan middleware `isAdmin`
- ✅ Hanya admin yang bisa akses PDF reports
- ✅ Data di-query dengan Eloquent ORM (secure)

## 📊 Sample Output
PDF akan berisi:
- Judul: "User Report"
- Tanggal generate
- Total jumlah users
- Tabel lengkap semua user data
- Timestamp generation

## 🧪 Testing

### Manual Test
1. Pastikan ada data users di database
2. Login sebagai admin
3. Akses URL: `/reports/users/pdf/view`
4. Verify PDF tampil dengan benar
5. Akses URL: `/reports/users/pdf/download`
6. Verify PDF ter-download dengan nama: `users-report-YYYY-MM-DD.pdf`

### Expected Behavior
- ✅ PDF generate tanpa error
- ✅ Semua data users muncul di tabel
- ✅ Format tanggal sesuai (d M Y)
- ✅ Role badge warna sesuai
- ✅ File name dinamis dengan tanggal hari ini

## 🐛 Troubleshooting

### Issue: PDF tidak ter-generate
**Solution:** Pastikan library DomPDF sudah ter-install
```bash
composer require barryvdh/laravel-dompdf
```

### Issue: 403 Forbidden
**Solution:** Pastikan user sudah login sebagai Admin

### Issue: Data tidak muncul
**Solution:** Check apakah ada data di tabel `users`

## 📈 Future Enhancements
- [ ] Filter by role (admin/user)
- [ ] Filter by date range
- [ ] Add charts/statistics
- [ ] Export to Excel format
- [ ] Add logo/branding image
- [ ] Pagination for large datasets
- [ ] Custom date range selection

## 👨‍💻 Author
- Branch: `Feat/auth-PDF-Reporting-users`
- Task: TUB-43
- Date: 2025-12-22

## 📚 Related Tasks
- TUB-44: PDF Reporting Events
- TUB-45: PDF Reporting Categories
