# Add PHP to PATH for this session
$env:Path += ";C:\xampp\php"

# Verify PHP is available
Write-Host "Checking PHP..." -ForegroundColor Yellow
php -v

# Navigate to project directory
cd $PSScriptRoot

# Start Laravel server
Write-Host "`nStarting Laravel development server..." -ForegroundColor Green
Write-Host "Server will be available at:" -ForegroundColor Cyan
Write-Host "  http://127.0.0.1:8000" -ForegroundColor White
Write-Host "  http://localhost:8000" -ForegroundColor White
Write-Host "`nPress Ctrl+C to stop the server`n" -ForegroundColor Yellow

php artisan serve
