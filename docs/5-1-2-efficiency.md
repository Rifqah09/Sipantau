# 5.1.2 Efficiency (Efisiensi)

## 5.1.2.1 Performance (Performa)

Spesifikasi performa aplikasi SIPANTAU dirancang untuk memberikan pengalaman pengguna yang responsif dan efisien. Berikut adalah target performa yang harus dicapai:

### **A. Loading Time (Waktu Muat Halaman)**

#### **Application Initialization**
- **Initial Page Load (Cold Start)**: < 3 detik
  - Waktu dari user membuka URL aplikasi hingga halaman utama fully loaded
  - Target: 0-3 detik
  - Threshold: Jika > 5 detik, tampilkan loading skeleton

- **Subsequent Page Navigation**: < 1.5 detik
  - Waktu perpindahan antar halaman setelah aplikasi sudah loaded
  - Target: 0-1.5 detik
  - Cache resources yang sering diakses

- **Dynamic Content Loading**: < 2 detik
  - Waktu loading data dari server (laporan list, tanggapan, etc)
  - Target: 0-2 detik
  - Gunakan pagination untuk data > 100 items

#### **Specific Page Loading Targets**
| Halaman | Target Load Time | Keterangan |
|---------|------------------|-----------|
| Welcome/Login | < 2 detik | First page, optimization penting |
| Dashboard Masyarakat | < 2 detik | Halaman utama setelah login |
| Dashboard Petugas | < 2 detik | Statistik + recent laporans |
| Dashboard Admin | < 2.5 detik | Data aggregation lebih kompleks |
| Daftar Laporan | < 1.5 detik | List dengan pagination |
| Detail Laporan | < 1.5 detik | Load single record |
| Form Buat/Edit Laporan | < 1 detik | Form rendering |
| Peta Interaktif | < 3 detik | Map library + markers loading |
| Halaman Edukasi | < 1.5 detik | Static content |

### **B. API Response Time**

- **GET Requests (Query Data)**
  - Simple queries (count, list): < 500ms
  - Complex queries (dengan relations): < 1000ms
  - Large datasets (1000+ records): < 1500ms
  - Dengan pagination: < 800ms

- **POST/PUT Requests (Create/Update)**
  - Simple create: < 800ms
  - Create dengan file upload: < 2000ms (tergantung file size)
  - Bulk update: < 1500ms

- **DELETE Requests**
  - Simple delete: < 600ms
  - Soft delete dengan cascade: < 800ms

### **C. Resource Optimization**

#### **JavaScript Bundle Size**
- Main bundle: < 150KB (gzipped)
- Framework + dependencies: < 100KB
- Alpine.js runtime: < 15KB
- Custom app code: < 50KB
- Lazy-loaded modules: < 50KB per module

#### **CSS Bundle Size**
- Main stylesheet: < 50KB (gzipped)
- Tailwind compiled: < 40KB
- Custom styles: < 10KB

#### **Image Optimization**
- Format: WebP (primary), PNG/JPG (fallback)
- Avatar images: < 30KB
- Thumbnail images: < 20KB
- Banner/hero images: < 100KB
- Maksimal file upload: 5MB per file
- Generate thumbnail otomatis untuk lampiran

#### **Caching Strategy**
- Browser cache: 1 tahun untuk asset statis
- HTTP cache headers: ETag + Last-Modified
- Server-side cache: 5 menit untuk user dashboard data
- Database query cache: 2 menit untuk read-heavy queries
- Session cache: Expire dalam 24 jam

### **D. Database Performance**

- **Query Execution Time**: < 500ms untuk average queries
- **Indexing**: Semua frequently queried fields harus terindex
  - user_id, status, tanggal pada tabel laporan
  - petugas_id, laporan_id pada tabel tanggapan
- **Connection Pool**: Minimum 5, Maximum 20 concurrent connections
- **Query Optimization**: 
  - Gunakan select() untuk specific fields
  - Eager loading dengan with() untuk menghindari N+1 queries
  - Denormalisasi data jika perlu untuk read performance

### **E. Concurrent Users & Scalability**

- **Expected Concurrent Users**: 100+ users simultaneously
- **Request Rate**: Handle 500+ requests per second
- **Database Connections**: Scale dari 5 ke 20 connections based on load
- **Queue Processing**: Background jobs processed within 30 seconds
- **Session Handling**: Support distributed sessions dengan cache driver

### **F. Authentication & Security Performance**

#### **Login/Authentication**
- **Login Process**: < 1 detik
  - Password validation: < 100ms
  - Session creation: < 200ms
  - Redirect to dashboard: < 500ms

- **Failed Login Attempt Handling**:
  - **Limit**: Maximum 5 failed attempts per 15 menit
  - **Lockout Duration**: 15 menit setelah exceed limit
  - **Penanganan**:
    1. Attempt 1-4: Tampilkan error message "Username/password salah"
    2. Attempt 5: Tampilkan pesan "Akun Anda terkunci. Coba lagi dalam 15 menit" + tombol "Hubungi Admin"
    3. Automatic unlock: Setelah 15 menit
    4. Admin dapat unlock manual via admin panel
    5. Log setiap failed attempt untuk security audit

- **Password Expiration**: 
  - None (optional) atau 90 hari tergantung kebijakan
  - Notifikasi: Ingatkan user 7 hari sebelum password expired

- **Session Management**:
  - Session timeout: 24 jam (dapat dikonfigurasi)
  - Activity timeout: 30 menit inactivity → auto logout
  - Warn user sebelum logout automatic (countdown 5 menit)

### **G. File Upload Performance**

- **Upload Processing Time**
  - File < 1MB: < 500ms
  - File 1-5MB: < 2 detik
  - File > 5MB: Reject dengan pesan "File terlalu besar"

- **Concurrent Uploads**: Support 3+ simultaneous uploads
- **Upload Progress**: Show real-time progress bar
- **Failed Upload Recovery**: Allow retry hingga 3x

### **H. Real-time Features Performance**

- **Map Loading**: < 3 detik untuk load map dengan 100+ markers
- **Real-time Notifications**: < 1 detik delivery (jika menggunakan websocket/polling)
- **Dynamic Form Validation**: < 200ms untuk validation response

### **I. Server Uptime & Reliability**

- **Target Uptime**: 99.5% (max 3.6 jam downtime per bulan)
- **Response Availability**: 99% successful responses (max 1% error rate)
- **Database Availability**: 99.9% uptime
- **Backup & Recovery**: 
  - Automated daily backups
  - Recovery time objective (RTO): < 1 jam
  - Recovery point objective (RPO): < 24 jam

---

## 5.1.2.2 Space (Kapasitas Penyimpanan)

Spesifikasi ruang dan resource yang diperlukan untuk mengoperasikan aplikasi SIPANTAU.

### **A. Server Requirements (Backend)**

#### **Hardware Specifications**

| Aspek | Minimum | Recommended | Enterprise |
|-------|---------|-------------|-----------|
| **CPU** | 2 cores @ 2 GHz | 4 cores @ 2.4 GHz | 8+ cores @ 3 GHz |
| **RAM** | 2 GB | 4 GB | 8 GB+ |
| **Storage** | 20 GB | 50 GB | 100 GB+ |
| **Bandwidth** | 5 Mbps | 10 Mbps | 50+ Mbps |

#### **Disk Space Requirements**

| Komponen | Storage | Catatan |
|----------|---------|--------|
| **OS (Linux)** | 5 GB | Ubuntu 22.04 LTS recommended |
| **PHP Runtime** | 500 MB | PHP 8.3 |
| **Laravel Framework** | 300 MB | dengan vendor dependencies |
| **Database** | 2 GB (initial) | Tergantung jumlah data |
| **Uploaded Files** | 50 GB (scalable) | Lampiran laporan, foto, dokumen |
| **Logs** | 2 GB (rotated) | Application + error logs |
| **Cache** | 1 GB (managed) | Redis/Memcached temp data |
| **Backups** | 10 GB (external) | Daily backups, stored separately |
| **Total** | **~20-71 GB** | Tergantung volume data |

#### **Growth Projections** (per tahun)
- Database growth: +500 MB/tahun
- Uploaded files: +2 GB/tahun
- Logs: +500 MB/tahun
- **Total growth**: ~3 GB/tahun

### **B. Database Storage**

#### **Database Size Estimation**

| Tabel | Avg Records | Ukuran per Record | Total Size (1 tahun) |
|-------|------------|-----------------|-------------------|
| **users** | 5,000 | 2 KB | 10 MB |
| **laporans** | 50,000 | 5 KB | 250 MB |
| **tanggapans** | 100,000 | 3 KB | 300 MB |
| **lampiran_laporans** | 150,000 | 1 KB (metadata) | 150 MB |
| **verifikasi_laporans** | 50,000 | 2 KB | 100 MB |
| **activity_logs** | 500,000 | 500 B | 250 MB |
| **audit_trails** | 100,000 | 1 KB | 100 MB |
| **Total** | **~850,000** | | **~1.16 GB** |

#### **Database Optimization**
- Indexing: ~200 MB additional storage
- Backup space: 2x database size recommended
- **Total DB storage needed**: ~3-5 GB per tahun

### **C. File Storage (Lampiran & Media)**

#### **File Upload Limits**
- **Per file**: Maximum 5 MB
- **Per user session**: Maximum 50 MB
- **Concurrent uploads**: 3 files simultaneously
- **Supported formats**: PDF, JPG, PNG, DOC, DOCX, XLS, XLSX

#### **Storage Calculation**
- Average file size: 2 MB
- Estimated 20,000 file uploads/tahun
- **Annual storage needed**: 40 GB
- **Retention**: 3 tahun (120 GB) + 1 year backup (40 GB) = 160 GB

#### **Storage Management**
- Automatic cleanup untuk incomplete uploads setelah 24 jam
- Archive files older than 2 years (compressed)
- Soft delete: File logical delete, restore dalam 30 hari
- Hard delete: Setelah 30 hari, file permanently deleted

### **D. Network Bandwidth Requirements**

#### **Bandwidth Calculation**
- **Average page size**: 500 KB
- **Average daily users**: 500
- **Pages per user per day**: 20
- **Daily data transfer**: 500 × 20 × 500 KB = 5 GB/day

#### **Bandwidth Tiers**
| Metric | Value |
|--------|-------|
| **Peak bandwidth** | 50 Mbps (during peak hours) |
| **Average bandwidth** | 10-15 Mbps |
| **Monthly data**: 150 GB | |
| **Recommended plan** | 200 GB/month unmetered or dedicated 50 Mbps |

#### **Optimization**
- Compression (gzip): 60-70% reduction
- CDN for static assets: Reduce bandwidth 40%
- Image optimization: Reduce file size 50%

### **E. Development Environment Storage**

| Item | Size | Catatan |
|------|------|--------|
| **Source code** | 100 MB | Dengan .git history |
| **Node modules** | 500 MB | npm dependencies |
| **Vendor (composer)** | 400 MB | PHP dependencies |
| **Database (dev)** | 1 GB | Local SQLite/MySQL |
| **Logs & Cache** | 200 MB | Development artifacts |
| **Total** | **~2.2 GB** | Per developer |

### **F. Mobile Application (Jika ada)**

**Note**: Aplikasi SIPANTAU saat ini adalah web-based responsive. Jika dikembangkan sebagai mobile app native:

#### **Android APK**
- Minimum app size: 15-20 MB
- After installation: 40-60 MB (dengan data cache)
- Storage needed: 100 MB minimum on device
- Cache storage: 50 MB

#### **iOS App**
- App size: 20-30 MB
- After installation: 50-80 MB
- Storage needed: 100 MB minimum on device
- Cache storage: 50 MB

#### **Web Progressive App (PWA)**
- Installable size: < 10 MB
- Cache storage: 50 MB
- Offline data sync: 1-5 MB

### **G. Backup & Disaster Recovery Storage**

- **Daily backups**: 1.5 GB each (compressed)
- **Weekly backups**: Full backup 2 GB
- **Monthly backups**: Full backup 2 GB (kept 12 months)
- **Total storage**: 50 GB minimum (external/cloud)
- **Storage location**: Different region/provider from main server

---

## 5.1.2.3 Security (Keamanan)

Spesifikasi keamanan aplikasi SIPANTAU untuk melindungi data pengguna dan sistem dari berbagai ancaman.

### **A. Authentication & Authorization**

#### **Password Security**
- **Hashing Algorithm**: Bcrypt dengan work factor minimum 12
- **Password Requirements**:
  - Minimum 8 karakter
  - Kombinasi: uppercase, lowercase, numeric, special character (!@#$%^&*)
  - Tidak boleh sama dengan 5 password terakhir
  - Password tidak boleh mengandung username atau email
- **Password Reset**:
  - Valid untuk 1 jam (time-limited token)
  - Token dikirim via email dengan secure link
  - Logout semua session setelah reset password
  - Log password reset attempts

#### **Authentication Methods**
- **Primary**: Username/Email + Password
- **Session Management**: 
  - Secure session tokens dengan HttpOnly, Secure, SameSite cookies
  - Session ID regeneration setelah login
  - Prevent fixation attacks
- **Account Lockout**:
  - 5 failed login attempts → lock 15 menit
  - Admin dapat unlock manual
  - Rate limiting: Max 50 requests per IP per menit
- **2FA (Optional - Enhanced Security)**:
  - Via email: Kode 6-digit valid 5 menit
  - Via SMS: Kode 6-digit valid 5 menit
  - Via authenticator app (Google Authenticator, Authy)

#### **Authorization & Role-Based Access Control (RBAC)**
- **Roles**: Admin, Petugas, Masyarakat
- **Admin**:
  - Full akses ke semua fitur
  - User management, sistem configuration
  - Report generation, audit logs
- **Petugas**:
  - View assigned laporan
  - Create tanggapan
  - Verify laporan
  - Cannot delete data
- **Masyarakat**:
  - Create laporan
  - View own laporan + tanggapan
  - Upload lampiran
  - Cannot view/edit other user data
- **Permission Validation**: Setiap API endpoint validate user permission

### **B. Data Encryption**

#### **In Transit (TLS/SSL)**
- **Protocol**: HTTPS/TLS 1.3 (minimum TLS 1.2)
- **Certificate**: SSL/TLS certificate dari trusted CA
- **HSTS**: Enable HTTP Strict Transport Security
- **All endpoints**: Wajib menggunakan HTTPS, HTTP redirected to HTTPS
- **Cipher Suites**: AES-256-GCM, ChaCha20-Poly1305

#### **At Rest (Database)**
- **Sensitive fields encryption**:
  - User phone numbers: AES-256 encryption
  - User addresses: AES-256 encryption
  - File paths: Encrypted untuk prevent direct access
- **Database backups**: Encrypted dengan AES-256
- **Encryption keys**: Stored separately from database
- **Key rotation**: Quarterly key rotation implemented

#### **File Encryption**
- **Uploaded files**: Optional encryption (configurable)
- **Temp files**: Encrypted jika handling sensitive data
- **Logs**: Sensitive data masked (email, phone partial)

### **C. Password Reset Flow**

```
1. User klik "Forgot Password"
2. Input email → Send reset link via email
3. Token generated: Random 64-char string, hashed, stored in DB
4. Email contains: Reset link valid 1 hour
5. User click link → Set new password
6. Verify token valid & not expired
7. Update password with new hash
8. Delete all refresh tokens (logout from all devices)
9. Send confirmation email
10. Redirect to login
```

### **D. Session & Cookie Security**

- **Session timeout**: 24 jam (configurable)
- **Inactivity timeout**: 30 menit (auto logout, dengan warning)
- **Cookie settings**:
  - HttpOnly: true (prevent JS access)
  - Secure: true (HTTPS only)
  - SameSite: Strict (prevent CSRF)
- **Session storage**: Server-side (Redis/database)
- **Remember me**: Optional, valid 30 hari
- **Session fingerprinting**: Detect IP change, browser change (warn user)

### **E. CSRF Protection**

- **CSRF Token**: Generated per form, unique per session
- **Token validation**: Verify token on POST/PUT/DELETE requests
- **Token rotation**: Regenerate after sensitive actions (password change, permission update)
- **Double-submit cookie**: Implementation pada API requests
- **SameSite cookie**: Tambahan protection

### **F. Input Validation & Sanitization**

#### **Server-side Validation (Primary)**
- Whitelist validation untuk setiap input field
- Type checking (string, integer, email, URL, etc)
- Length validation
- Format validation (regex patterns)
- SQL injection prevention: Use parameterized queries
- XSS prevention: HTML escape output

#### **Client-side Validation (Secondary)**
- Real-time validation feedback
- Prevent form submission jika validation gagal
- Never rely on client-side validation alone

#### **File Upload Security**
- Whitelist allowed extensions: PDF, JPG, PNG, DOC, DOCX
- Validate MIME type (check file signature, not just extension)
- Store outside web root atau disable execution
- Rename uploaded files ke random name
- Max file size: 5 MB
- Scan untuk malware (if budget allows)
- Quarantine suspicious files

### **G. API Security**

- **API Keys**: For third-party integrations
  - Rotate every 90 days
  - Rate limiting per API key
  - Log all API usage
- **CORS**: Whitelist allowed origins
- **Rate Limiting**:
  - 100 requests per user per minute
  - 1000 requests per IP per minute
  - Exponential backoff for repeated violations
- **API Versioning**: Version all endpoints (v1, v2)
- **JSON Web Tokens (JWT)**: If using token-based auth
  - Sign dengan RS256 (asymmetric)
  - Expiry: 1 jam untuk access token
  - Refresh token: 7 hari

### **H. Audit Logging & Monitoring**

#### **Events Logged**
- Login attempts (success/failure)
- Password changes
- Permission changes
- Data modifications (create/update/delete)
- File uploads/downloads
- Failed validation attempts
- API access (jika ada)
- Admin actions
- Error exceptions

#### **Log Details**
- Timestamp: UTC timezone
- User ID/IP address
- Action performed
- Data changed (old → new)
- Result (success/failure)
- Error message (jika ada)

#### **Log Storage**
- Minimum retention: 90 hari
- Archive older logs: 1 tahun
- Encrypt sensitive log data
- Tamper-proof (append-only)
- Separate log storage for compliance

#### **Monitoring & Alerts**
- Alert jika multiple failed logins
- Alert jika permission change
- Alert jika unusual database queries
- Alert jika file system changes
- Daily security report to admin

### **I. XSS (Cross-Site Scripting) Prevention**

- **Output Encoding**: 
  - Escape HTML entities: `{{ $variable }}` (Laravel Blade)
  - Use Content Security Policy (CSP) headers
- **Input Sanitization**:
  - Remove HTML tags dari user input
  - Whitelist allowed HTML jika necessary
- **CSP Header**: 
  - `Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self' https:;`

### **J. SQL Injection Prevention**

- **Parameterized Queries**: ALWAYS use prepared statements
  ```sql
  // ✅ Safe
  DB::select('SELECT * FROM users WHERE email = ?', [$email]);
  
  // ❌ Unsafe - NEVER do this
  DB::select("SELECT * FROM users WHERE email = '$email'");
  ```
- **ORM Usage**: Use Eloquent (Laravel ORM) yang sudah protected
- **Query validation**: Validate input format sebelum query

### **K. Malware & Virus Protection**

- **File scanning** (optional, untuk enhanced security):
  - Scan uploaded files dengan ClamAV atau VirusTotal API
  - Quarantine suspicious files
  - Block known malware signatures
- **Code review**: Regular security code review
- **Dependency scanning**: Monitor untuk vulnerable packages
  - `composer audit` untuk PHP dependencies
  - `npm audit` untuk JavaScript dependencies

### **L. Backup & Disaster Recovery Security**

- **Backup encryption**: AES-256 encryption
- **Backup locations**: Geographic redundancy
- **Access control**: Limited admin access to backups
- **Integrity verification**: SHA-256 checksum
- **Recovery testing**: Monthly backup restore test
- **Offsite backups**: Minimal 1 copy di lokasi berbeda

### **M. Compliance & Standards**

- **GDPR Compliance** (jika ada EU users):
  - Data retention policy
  - Right to be forgotten implementation
  - Data export functionality
- **Data Protection**:
  - Privacy policy (available & clear)
  - Terms of service
  - Consent management
- **Vulnerability Disclosure**: Public security contact
- **Security Updates**: Patch management policy

### **N. Penetration Testing & Security Audits**

- **Frequency**: Annually (or bi-annually untuk enterprise)
- **Scope**: Full application + infrastructure
- **Areas**: OWASP Top 10 vulnerabilities
- **Post-audit**: Remediation plan + tracking
- **Ongoing**: Regular security updates untuk dependencies

### **O. Incident Response Plan**

- **Breach Detection**: Automated alerts untuk anomalies
- **Response Team**: Designated security team
- **Containment**: Isolate affected systems
- **Investigation**: Determine scope & impact
- **Communication**: Notify affected users within 24 hours
- **Remediation**: Fix vulnerabilities
- **Post-incident**: Review & improve processes

### **P. User Data Privacy**

- **Data Minimization**: Collect only necessary data
- **Purpose Limitation**: Use data only for stated purpose
- **Retention Policy**: 
  - Active users: Keep indefinitely (while account active)
  - Inactive users: Delete after 2 years
  - Deleted users: Anonymize after 30 days
- **User Rights**:
  - View personal data
  - Export personal data (JSON format)
  - Request deletion (soft delete immediately, hard delete after 30 days)
  - Correct personal data

---

## Kesimpulan

Aplikasi SIPANTAU dirancang dengan mempertimbangkan efisiensi dalam tiga aspek utama:

1. **Performance**: Target loading time < 3 detik dengan optimasi API, caching, dan resource bundling
2. **Space**: Kapasitas storage 20-71 GB tergantung volume, dengan growth ~3 GB/tahun
3. **Security**: Multi-layer security dengan encryption, RBAC, audit logging, dan compliance standards

Implementasi spesifikasi ini memastikan aplikasi dapat menangani ribuan pengguna concurrent dengan kecepatan dan keamanan yang optimal.
