# New MMA Kaitori Theme

**Version:** 1.4.5  
**WordPress theme name:** New MMA Kaitori Theme  
**Install folder on the server:** `wp-content/themes/new-mmakaitori-theme/`

This package is the Haishall-inspired custom theme for **MMA買い取り** (`mmakaitori.com`).  
It is separate from the old `bmt-kaitori` theme.

## Documentation

- **[EDITOR-GUIDE.md](./EDITOR-GUIDE.md)** — detailed wp-admin tutorial (how to edit the site without coding)
- This README — install / deploy notes for developers

## Local development path

```
Local Sites/mmkaitori/app/public/wp-content/themes/new-mmakaitori-theme/
```

## Install / activate

1. Copy this folder into `wp-content/themes/` and name it `new-mmakaitori-theme`
2. wp-admin → **Appearance → Themes → Activate**
3. **Settings → Permalinks → Save**
4. **Customize → MMA Contact** (phone, LINE, email, address)
5. Upload logo under **Site Identity**

## Deploy to Hostinger

1. Zip the theme folder
2. Overwrite `public_html/wp-content/themes/new-mmakaitori-theme/`
3. Permalinks → Save
4. Purge Hostinger cache
5. Remove `mu-plugins/bmt-live-fixes.php` if it reappears

## What’s included (phases 1–4)

- Sticky header, mobile sticky CTAs, 2-step appraisal form
- Homepage banner images + conversion sections
- CPTs: 買取実績, お客様の声, コラム, 対応エリア
- Admin panel: **MMA Contents**
- Refund calculator, schema, sitemap/document pages
- Spam protection + accessibility polish

## License / notes

Original theme code for MMA Trading. Do not reuse Haishall assets or branding.
