# Quick fix: Add PHP to PATH
$env:Path += ";C:\xampp\php"
Write-Host "PHP added to PATH for this session!" -ForegroundColor Green
Write-Host "Now you can use: php artisan serve" -ForegroundColor Yellow
