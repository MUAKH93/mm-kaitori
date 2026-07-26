# MM Kaitori — Complete Setup Guide (English)

Your site: **http://mmkaitori.local**  
Admin: **http://mmkaitori.local/wp-admin**

The **website content is in Japanese** (for the car buyback business).  
This guide helps you use the **Japanese wp-admin** in English.

---

## Part 1 — Switch WordPress admin to English (recommended)

Do this first so menus are easier to read.

| Step | Japanese menu | English meaning |
|------|---------------|-----------------|
| 1 | **設定** | Settings |
| 2 | **一般** | General |
| 3 | Find **サイトの言語** | Site Language |
| 4 | Change from **日本語** to **English (United States)** |
| 5 | Click **変更を保存** | Save Changes |

WordPress may ask you to log in again. After this, most admin menus will be in English.

> **Note:** The public website text (headlines, FAQ, etc.) stays in Japanese. Only the admin panel changes language.

---

## Part 2 — Confirm theme is active

| Step | Action |
|------|--------|
| 1 | Go to **Appearance → Themes** (was: 外観 → テーマ) |
| 2 | **MM Kaitori** should show as **Active** |
| 3 | Click **Visit Site** to preview the homepage |

---

## Part 3 — Set homepage and news page

| Step | Japanese (if still JP) | English |
|------|------------------------|---------|
| 1 | **設定 → 表示設定** | Settings → Reading |
| 2 | **ホームページの表示** | Your homepage displays |
| 3 | Select **固定ページ** | A static page |
| 4 | **ホームページ** | Homepage → choose **ホーム** (Home) |
| 5 | **投稿ページ** | Posts page → choose **お知らせ** (News) |
| 6 | **変更を保存** | Save Changes |

---

## Part 4 — Set URL structure (permalinks)

| Step | Action |
|------|--------|
| 1 | **Settings → Permalinks** (設定 → パーマリンク) |
| 2 | Select **Post name** (投稿名) |
| 3 | Click **Save Changes** |

News URLs will look like: `http://mmkaitori.local/news/post-title/`

---

## Part 5 — Add your phone number and LINE link

| Step | Action |
|------|--------|
| 1 | **Appearance → Customize** (外観 → カスタマイズ) |
| 2 | Click **連絡先情報** (Contact Info) |
| 3 | Fill in: |

| Field (Japanese) | English meaning | Example |
|------------------|-----------------|--------|
| 電話番号 | Phone number | 090-1234-5678 |
| 電話ボタンラベル | Phone button text | Phone quote |
| LINE URL | LINE link | https://line.me/... |
| LINEボタンラベル | LINE button text | Quote via LINE |
| 営業時間 | Business hours | 8:30 – 22:00 |
| 定休日 | Closed days | Open every day |

| 4 | Click **Publish** (公開) at the top |

---

## Part 6 — Site title and logo

| Step | Action |
|------|--------|
| 1 | **Appearance → Customize → Site Identity** |
| 2 | **Site Title** — your business name (e.g. MM Kaitori) |
| 3 | **Tagline** — short description (optional) |
| 4 | **Logo** — upload your logo image |
| 5 | Click **Publish** |

Or: **Settings → General → Site Title / Tagline**

---

## Part 7 — Install plugins

Go to **Plugins → Add New** (プラグイン → 新規追加)

Install and **Activate** each:

### 1. Contact Form 7 (required — quote form)
- Search: `Contact Form 7`
- Install → Activate
- The theme **auto-creates** a form called **無料査定フォーム** and puts it on `/contact/`

### 2. Flamingo (recommended — saves form submissions)
- Search: `Flamingo`
- Install → Activate
- View submissions: **Flamingo → Inbound Messages**

### 3. WP Mail SMTP (recommended — email delivery)
- Search: `WP Mail SMTP`
- Install → Activate
- **WP Mail SMTP → Settings** → connect Gmail or SendGrid
- Send a test email

### 4. Optional
| Plugin | Purpose |
|--------|---------|
| Yoast SEO | SEO |
| Wordfence | Security |
| UpdraftPlus | Backups |

---

## Part 8 — Check the quote form

| Step | Action |
|------|--------|
| 1 | Visit **http://mmkaitori.local/contact/** |
| 2 | You should see a form with fields: Name, Email, Phone, Address, Car maker, Model, etc. |
| 3 | Fill it out and click **送信する** (Send) |
| 4 | Check your admin email inbox |
| 5 | Check **Flamingo → Inbound Messages** if Flamingo is installed |

### If form is missing
1. **Contact → Contact Forms** (お問い合わせ → Contact Forms)
2. Open **無料査定フォーム**
3. Copy the shortcode at the top, e.g. `[contact-form-7 id="123" title="無料査定フォーム"]`
4. **Pages → 無料査定** (Pages → Free Quote page)
5. Paste the shortcode in the page content
6. **Update**

---

## Part 9 — Edit company information

The **Outline** and **Legal** sections on the homepage have placeholder text.

**File to edit** (in your project, then re-sync theme):

```
mm-kaitori/wp-content/themes/bmt-kaitori/template-parts/section-outline.php
```

Or on Local site:

```
Local Sites/mmkaitori/app/public/wp-content/themes/bmt-kaitori/template-parts/section-outline.php
```

Replace placeholders like:
- （会社名を設定してください） → Your company name
- （住所を設定してください） → Your address
- （許可番号を設定してください） → License number

After editing, save the file and refresh the website.

---

## Part 10 — Setup checklist in wp-admin

Go to **Appearance → サイトセットアップ** (Site Setup)

This page shows a checklist:
- Theme active
- Contact Form 7 active
- Pages created
- Front page configured

---

## Part 11 — Main pages on your site

| URL | Japanese name | Purpose |
|-----|---------------|---------|
| `/` | ホーム | Homepage |
| `/news/` | お知らせ | News / blog |
| `/contact/` | 無料査定 | Free quote form |

---

## Part 12 — Add a news post

| Step | Action |
|------|--------|
| 1 | **Posts → Add New** (投稿 → 新規追加) |
| 2 | Enter title and content |
| 3 | Click **Publish** |
| 4 | It appears on homepage **お知らせ** section and `/news/` |

---

## Japanese → English quick reference

| Japanese | English |
|----------|---------|
| ダッシュボード | Dashboard |
| 投稿 | Posts |
| メディア | Media |
| 固定ページ | Pages |
| コメント | Comments |
| 外観 | Appearance |
| プラグイン | Plugins |
| ユーザー | Users |
| ツール | Tools |
| 設定 | Settings |
| テーマ | Themes |
| カスタマイズ | Customize |
| 新規追加 | Add New |
| 公開 | Publish |
| 更新 | Update |
| 有効化 | Activate |
| 無効化 | Deactivate |

---

## Troubleshooting

| Problem | Fix |
|---------|-----|
| Homepage looks like a blog | Settings → Reading → set static homepage to **ホーム** |
| Form not sending email | Install WP Mail SMTP and configure |
| Changes not showing | Hard refresh: Ctrl + Shift + R |
| Edited theme file but no change | Edit file in Local site folder, not only in dreams-creations repo |

---

## Re-sync theme after code changes

If you edit theme files in `Rovexa Technologies/mm-kaitori/`:

```powershell
cd "C:\Users\Muhammad Umair Ayub\dreams-creations\Rovexa Technologies\mm-kaitori"
.\sync-theme.ps1
```

Then refresh the website.
