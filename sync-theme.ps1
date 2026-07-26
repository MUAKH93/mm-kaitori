# Sync theme to Local WP (mmkaitori)

Run this in PowerShell after any theme changes:

```powershell
$source = "C:\Users\Muhammad Umair Ayub\dreams-creations\wordpress-site\wp-content\themes\bmt-kaitori"
$dest   = "$env:USERPROFILE\Local Sites\mmkaitori\app\public\wp-content\themes\bmt-kaitori"

if (-not (Test-Path (Split-Path $dest))) {
    Write-Error "Local site not found. Check path: $dest"
    exit 1
}

Copy-Item -Path "$source\*" -Destination $dest -Recurse -Force
Write-Host "Theme synced to Local WP."
Write-Host "Open: http://mmkaitori.local/wp-admin/themes.php"
```

Then in wp-admin: **外観 → テーマ** and look for **MM Kaitori**.
