# MM Kaitori — WordPress Client Site

Japanese vehicle buyback / scrap car lead-generation site, modeled after [bmtkaitori.com](https://www.bmtkaitori.com/).

**Repository:** [github.com/MUAKH93/mm-kaitori](https://github.com/MUAKH93/mm-kaitori)

## What's included

- Custom theme **`bmt-kaitori`** (Japanese UI, navy + orange layout)
- Auto-setup on theme activation: pages, menu, sample news post
- Contact Form 7 template at `wp-content/themes/bmt-kaitori/config/contact-form-7-quote.txt`
- Docker Compose for local development

---

## Option A — Docker (recommended)

### 1. Install Docker Desktop

Download: https://www.docker.com/products/docker-desktop/

After install, **restart your PC** and open Docker Desktop once.

### 2. Start WordPress

```powershell
cd "C:\Users\Muhammad Umair Ayub\dreams-creations\Rovexa Technologies\mm-kaitori"
Copy-Item .env.example .env
docker compose up -d
```

Open **http://localhost:8080**

### 3. WordPress install wizard

| Field | Value |
|-------|-------|
| Site Title | あなたの屋号（例：○○買取） |
| Username | admin |
| Password | (strong password) |
| Email | your-email@example.com |

**Settings → General → Site Language:** 日本語

---

## Option B — LocalWP / XAMPP (no Docker)

1. Install [Local WP](https://localwp.com/) or XAMPP
2. Create a new WordPress site
3. Copy the theme folder into `wp-content/themes/`:

```
wp-content/themes/bmt-kaitori/
```

4. Activate the theme in wp-admin

---

## wp-admin setup (step by step)

After activating **BMT Kaitori**, the theme automatically creates:

| Item | Details |
|------|---------|
| ホーム | Front page |
| お知らせ | Blog / news page |
| 無料査定 | Quote form page |
| メインメニュー | Home, News, Quote, FAQ |
| Sample news post | ホームページを公開しました |

### Step 1 — Activate theme

**外観 → テーマ → BMT Kaitori → 有効化**

If pages already existed, go to **外観 → テーマ** and switch away and back to re-run setup, or create pages manually.

### Step 2 — Install plugins

**プラグイン → 新規追加**

| Plugin | Why |
|--------|-----|
| **Contact Form 7** | Quote form (auto-created on activation) |
| **Flamingo** | Save form submissions in admin |
| **WP Mail SMTP** | Reliable email delivery |
| **Yoast SEO** | SEO |
| **Wordfence** | Security |
| **UpdraftPlus** | Backups |

After **Contact Form 7** is activated, the theme creates **無料査定フォーム** and attaches it to the `/contact/` page.

**Manual import (if needed):** copy form markup from  
`wp-content/themes/bmt-kaitori/config/contact-form-7-quote.txt`  
into **Contact → 無料査定フォーム → フォーム** tab.

### Step 3 — Contact info

**外観 → カスタマイズ → Contact Info**

- Phone number
- LINE Official Account URL
- Business hours: `8:30～22:00`
- Closed days: `無休`

### Step 4 — Site identity

**外観 → カスタマイズ → サイト基本情報**

- Upload logo
- Set tagline

### Step 5 — Permalinks

**設定 → パーマリンク → 投稿名** → Save

### Step 6 — Email test

1. Install **WP Mail SMTP**
2. Connect Gmail or SendGrid
3. Submit a test quote at `/contact/`
4. Check inbox + **Flamingo → 受信メッセージ**

### Step 7 — Edit company info

Update placeholders in **概要** and **古物営業法** sections:

Edit file: `template-parts/section-outline.php`  
(or replace with ACF fields later)

---

## Project structure

```
mm-kaitori/
├── docker-compose.yml
├── README.md
└── wp-content/themes/bmt-kaitori/
    ├── config/contact-form-7-quote.txt   ← CF7 form template
    ├── inc/setup-content.php             ← auto pages + menu + CF7
    ├── template-parts/                   ← homepage sections
    └── assets/css/main.css
```

---

## Production deploy

1. Export with **All-in-One WP Migration** or deploy theme to hosting
2. Recommended hosts: Cloudways, SiteGround, Hostinger
3. Enable SSL, backups, and WP Mail SMTP on production

---

## Legal

Use your own business name, logo, photos, and copy. Do not copy B.M.T branding directly.
