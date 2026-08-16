# MMA買い取り — WP-Admin Editor Tutorial

**Theme:** New MMA Kaitori Theme (folder: `new-mmakaitori-theme` / repo copy: `mma-kaitori-theme`)  
**Version:** 1.4.5  
**Audience:** Site owners / staff who edit content **without coding**

Login URL examples:
- Local: `http://mmkaitori.local/wp-admin/`
- Live: `https://mmakaitori.com/wp-admin/`

---

## 1. Quick map — what to edit where

| You want to change… | Go to (wp-admin left menu) |
|----------------------|----------------------------|
| Logo | **Appearance → Customize → Site Identity** |
| Site name next to logo (`MMA買い取り`) | **Appearance → Customize → MMA Contact → Brand name** |
| Phone / TEL·FAX / email / LINE / address / hours | **Appearance → Customize → MMA Contact** |
| Homepage text (FAQ answers, strengths, flow copy, CTA title…) | **MMA Contents** |
| Buy results cards (買取実績) | **買取実績** |
| Customer voices | **お客様の声** |
| News / announcements | **Posts** (or **投稿**) |
| Knowledge columns | **コラム** |
| Prefecture SEO pages | **対応エリア** |
| Navigation links | **Appearance → Menus** |
| Company / privacy / document pages | **Pages** |
| Quote form destination email | **Customize → MMA Contact → Email** (form mails here) |

---

## 2. First-time setup after theme upload

1. **Appearance → Themes** → activate **New MMA Kaitori Theme**
2. **Settings → Permalinks** → click **Save Changes** (important for `/area/`, `/jisseki/`, `/column/`)
3. **Appearance → Customize → MMA Contact** → confirm:
   - Mobile phone
   - TEL/FAX
   - Email
   - LINE URL (`https://line.me/...`)
   - Address
   - Hours / closed days
4. **Appearance → Customize → Site Identity** → upload logo
5. Purge Hostinger (or any) cache if live looks old
6. Delete leftover file if it exists: `wp-content/mu-plugins/bmt-live-fixes.php` (old theme patch)

---

## 3. Contact & branding (Customizer)

**Path:** Appearance → Customize → **MMA Contact / 連絡先**

| Field | Shows on site as |
|-------|------------------|
| Brand name | Header title next to logo, footer brand |
| Company | Footer, schema |
| Representative | Company page (if used) |
| Mobile | Header phone, sticky “電話”, form emails context |
| TEL/FAX | Footer |
| Email | Quote form delivery address |
| LINE URL | Header / footer / sticky LINE buttons |
| Hours / Closed days | Near phone & bottom CTA |
| Address | Footer |
| Antique dealer license | Company info |
| Hero image | Optional override (homepage already uses built-in banner images) |

Click **Publish** (top of Customizer) after edits.

**Site Identity**
- Upload logo (square/wing logo works best)
- Site Title / Tagline are secondary; brand display mainly comes from **MMA Contact → Brand name**

---

## 4. Homepage marketing copy — MMA Contents

**Path:** Left menu → **MMA Contents**

This panel stores option `mma_site_content`. Empty fields fall back to Japanese defaults.

### Tabs (typical)

| Tab | What it controls |
|-----|------------------|
| ヒーロー | Badge, titles, points (homepage text areas still used in admin; homepage visuals are banner images) |
| 信頼 / Trust | Trust strip values |
| 実績 | Results section headings |
| 還付金 | Refund banner copy + max amount display |
| 理由 / 悩み / 強み | Reasons, worries, strengths cards |
| 流れ | 5 buy-flow steps |
| 書類 | Document lists (one item per line) |
| FAQ | Up to 8 Q&A pairs |
| 声・お知らせ | Voices / news / column section titles |
| キャンセル / CTA | Cancel note + footer CTA title |
| フォーム | Form title (yellow bar text) |

### Editing tips
- **Line breaks in titles:** press Enter → shows as a new line on the site
- **Lists** (hero points, documents): **one item per line**
- Click **Save** on the MMA Contents page after changes
- Hard-refresh the homepage (`Ctrl+F5`) if you don’t see updates (cache)

---

## 5. 買取実績 (Buy results)

**Path:** **買取実績 → Add New / All**

1. **Title** = car display name (e.g. `トヨタ プリウス`)
2. Fill meta box **買取詳細**:
   - メーカー / 車種 / 年式 / 走行距離 / 買取価格（円）
3. Optional featured image
4. **Publish**

Homepage shows the latest cards. Archive: `/jisseki/`

**Tip:** Price field = numbers only (`230000`), site formats with commas.

---

## 6. お客様の声 (Testimonials)

**Path:** **お客様の声 → Add New**

1. Title e.g. `福岡県のお客様`
2. Body = the review text
3. Sidebar meta:
   - 都道府県
   - 満足度 (1–5)
4. **Publish**

---

## 7. お知らせ (Posts) & コラム (Columns)

### News
**Posts → Add New**
- Title + content
- Publish
- Homepage “お知らせ” lists latest posts

### Columns
**コラム → Add New**
- Title, excerpt, content, featured image
- Archive: `/column/`
- Used for refund / scrap-car tips SEO

---

## 8. 対応エリア (Prefecture SEO pages)

**Path:** **対応エリア**

- One page per prefecture (seeded for all 47)
- URL example: `/area/fukuoka/`
- Edit:
  - **Title** (e.g. `福岡県の廃車買取`)
  - **Content** (HTML/text in editor)
  - **Excerpt** (short description)
  - Sidebar **エリア設定**: 都道府県名 + 地方区分

Homepage shows Kyushu first + link to full list `/area/`.

**Do not delete all areas** unless you intend to rebuild SEO coverage.

---

## 9. Pages (固定ページ)

Common pages (use page templates where assigned):

| Slug / page | Purpose |
|-------------|---------|
| `flow` | 買取の流れ |
| `faq` | FAQ page |
| `company` | 運営会社 |
| `quote` | Full quote form page |
| `privacy` | Privacy policy |
| `documents` | 必要書類ガイド |
| `strengths` | 強み |
| `hajimete` | はじめての方へ |
| `doc-transfer` | 譲渡証明書 |
| `doc-proxy` | 委任状 |
| `sitemap` | サイトマップ |

**To change a page template:** edit page → **Page Attributes / Template** → choose the matching Japanese template name → Update.

Company address/phone on the company page may come from Customizer values and/or page content—keep them consistent with **MMA Contact**.

---

## 10. Menus

**Appearance → Menus**

1. Select **Primary Menu** (header) or **Footer Menu**
2. Add pages / custom links (e.g. `/area/`, `/jisseki/`)
3. Drag to reorder
4. Save menu
5. Under **Display location**, tick Primary / Footer as needed

If no menu is assigned, the theme shows a built-in fallback link list.

---

## 11. Quote / appraisal form (what staff need to know)

- Forms appear on homepage (under banners) and on `/quote/`
- **2 steps:** vehicle info → customer info
- Submissions email to **Customize → MMA Contact → Email**
- Subject looks like: `[MMA買い取り] 無料査定依頼 — {maker} / {name}`
- Spam protection is built in (honeypot + rate limit). Real users are not affected if they fill normally
- Privacy checkbox is required

**Test after go-live:** submit one real test from yourself and confirm the inbox.

---

## 12. Homepage layout (what is “hard” vs editable)

| Block | Editable without code? |
|-------|-------------------------|
| Top two banner images | Theme files (`assets/images/hero-first.png`, `hero-second.png`) — replace files with same names, or ask developer |
| Appraisal form look | Theme (developer) |
| Trust / results / refund / FAQ / etc. sections | **MMA Contents** + CPTs |
| Footer CTA | **MMA Contents** (title) + Customizer (phone/LINE) |

To replace banners later: overwrite those two PNGs in the theme `assets/images/` folder and clear cache.

---

## 13. Recommended weekly workflow

1. Check quote emails / reply to leads  
2. Add new **買取実績** when deals close  
3. Add **お客様の声** when you get permission  
4. Post short **お知らせ** for campaigns / holidays  
5. Publish 1 **コラム** for SEO when possible  
6. Spot-check `/area/fukuoka/` and homepage on phone  

---

## 14. Deploy reminder (theme updates)

When Dreams Digital sends a new theme zip:

1. Backup current live theme folder  
2. Upload / overwrite `new-mmakaitori-theme`  
3. Permalinks → Save  
4. Purge cache  
5. Quick check: homepage banners, form STEP1→2, LINE button, phone number  

GitHub copy (this repo path): `mma-kaitori-theme/`  
Live/local folder name: `new-mmakaitori-theme`

---

## 15. Troubleshooting

| Problem | Fix |
|---------|-----|
| `/area/` 404 | Permalinks → Save |
| Old design still showing | Purge Hostinger cache + hard refresh |
| LINE opens wrong page | Customize → MMA Contact → LINE URL |
| Form “sent” but no email | Check spam; confirm Email in Customizer; Hostinger mail limits |
| Wrong address/phone | Customize → MMA Contact (and company page if hardcoded text exists) |
| Mobile menu text “メニュー” | Should be hamburger only on v1.4.5+ |

---

## 16. Roles (who should do what)

| Role | Access |
|------|--------|
| Owner / office staff | MMA Contents, CPTs, Posts, Customizer contact fields |
| Developer | Theme PHP/CSS, banner image replacement, Hostinger deploy |

Never share the Administrator password in chat or email without a password manager.

---

*End of tutorial — New MMA Kaitori Theme v1.4.5*
