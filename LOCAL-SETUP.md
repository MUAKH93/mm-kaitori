# WordPress without Docker (Windows)

Docker Desktop failed on your machine. Use **Local WP** instead — it is the fastest way to run WordPress on Windows without Docker.

---

## Recommended: Local WP (15 minutes)

### Step 1 — Download Local WP

https://localwp.com/

Install and open the app.

### Step 2 — Create a new site

1. Click **+ Create a new site**
2. Site name: `mmkaitori` (or any name)
3. Choose **Preferred** environment
4. WordPress username: `admin`
5. Password: (choose a strong password)
6. Email: your email
7. Click **Add Site** and wait until it finishes

Local will give you a URL like:

```
http://mmkaitori.local
```

### Step 3 — Copy the theme

Copy this entire folder:

```
Rovexa Technologies/mm-kaitori/wp-content/themes/bmt-kaitori
```

Into Local’s site themes folder. Local shows the path when you right-click the site:

**Right-click site → Open site shell →** or **Go to site folder**

Typical path:

```
C:\Users\<YOU>\Local Sites\mmkaitori\app\public\wp-content\themes\
```

Paste the `bmt-kaitori` folder there.

**PowerShell copy example** (adjust Local site name if different):

```powershell
$source = "C:\Users\Muhammad Umair Ayub\dreams-creations\Rovexa Technologies\mm-kaitori\wp-content\themes\bmt-kaitori"
$dest   = "$env:USERPROFILE\Local Sites\mmkaitori\app\public\wp-content\themes\bmt-kaitori"
New-Item -ItemType Directory -Force -Path (Split-Path $dest)
Copy-Item -Path $source -Destination $dest -Recurse -Force
```

### Step 4 — Open wp-admin

In Local, click **WP Admin** (or open `http://mmkaitori.local/wp-admin`).

### Step 5 — Activate theme

**外観 → テーマ → BMT Kaitori → 有効化**

The theme auto-creates:

- ホーム (front page)
- お知らせ (news)
- 無料査定 (quote form page)
- メインメニュー
- Sample news post

### Step 6 — Install plugins

**プラグイン → 新規追加**

| Plugin | Purpose |
|--------|---------|
| Contact Form 7 | Quote form (auto-created after activation) |
| Flamingo | Save form submissions |
| WP Mail SMTP | Email delivery |

### Step 7 — Configure

1. **設定 → 一般 → サイトの言語 → 日本語**
2. **外観 → カスタマイズ → 連絡先情報** → phone + LINE URL
3. **設定 → パーマリンク → 投稿名** → Save
4. **外観 → サイトセットアップ** → verify checklist

### Step 8 — Test

- Homepage: `http://mmkaitori.local`
- Quote form: `http://mmkaitori.local/contact/`

---

## Alternative: XAMPP

If you prefer XAMPP:

1. Install https://www.apachefriends.org/
2. Start **Apache** and **MySQL** in XAMPP Control Panel
3. Download WordPress from https://wordpress.org/download/
4. Extract to `C:\xampp\htdocs\bmt-kaitori\`
5. Create database `bmt_kaitori` at http://localhost/phpmyadmin
6. Run install at http://localhost/bmt-kaitori/
7. Copy theme to `C:\xampp\htdocs\bmt-kaitori\wp-content\themes\bmt-kaitori\`

---

## Fix Docker Desktop (optional, later)

The error `Docker Desktop is unable to start` is usually one of these on Windows:

### 1. Virtualization disabled (most common)

- Restart PC → enter BIOS/UEFI (often F2, F10, or Del)
- Enable **Intel VT-x** or **AMD-V** / **SVM Mode**
- Enable **Virtualization** in Windows:  
  **Settings → System → Optional features → More Windows features →** ensure **Virtual Machine Platform** and **Windows Subsystem for Linux** are on

### 2. WSL 2 not installed

Run **PowerShell as Administrator**:

```powershell
wsl --install
```

Restart PC, then open Docker Desktop again.

### 3. Hyper-V / WSL conflict

Docker Desktop → **Settings → General** → use **WSL 2 based engine**

Docker Desktop → **Settings → Resources → WSL Integration** → enable your Linux distro

### 4. Corrupted Docker install

1. Uninstall Docker Desktop
2. Restart PC
3. Reinstall latest Docker Desktop
4. Do not run `docker compose` until Docker Desktop shows **Engine running** (green)

### 5. Corporate PC restrictions

Some work laptops block virtualization. Local WP does **not** need Docker or WSL — use Local WP on those machines.

---

## What to use when

| Tool | Needs Docker? | Best for |
|------|---------------|----------|
| **Local WP** | No | Your situation — start here |
| **XAMPP** | No | Manual control |
| **Docker Compose** | Yes | After Docker is fixed |

---

## Quick checklist

- [ ] Install Local WP
- [ ] Create site `mmkaitori`
- [ ] Copy `bmt-kaitori` theme folder
- [ ] Activate theme in wp-admin
- [ ] Install Contact Form 7
- [ ] Set language to 日本語
- [ ] Configure phone + LINE in Customizer
- [ ] Test `/contact/` form

When Local WP is installed, say your site name and I can give you the exact copy command for your paths.
