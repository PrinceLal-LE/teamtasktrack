# Laravel Development Server Startup Script
cd D:\xampp\htdocs\teamtasktrack

# Find PHP 8.2 installation
$php82Dir = (Get-ChildItem "C:\Users\sandip\AppData\Local\Microsoft\WinGet\Packages" -Directory -Filter "PHP.PHP.8.2*" | Select-Object -First 1 -ExpandProperty FullName)

if ($php82Dir) {
    $env:Path = "$php82Dir;$env:Path"
    Write-Host "PHP found at: $php82Dir" -ForegroundColor Green
} else {
    Write-Host "PHP 8.2 not found. Please check your installation." -ForegroundColor Red
    exit 1
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Starting Laravel Development Server" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Server will be available at:" -ForegroundColor Yellow
Write-Host "  http://127.0.0.1:8000" -ForegroundColor Green
Write-Host "  http://localhost:8000" -ForegroundColor Green
Write-Host ""
Write-Host "Press Ctrl+C to stop the server" -ForegroundColor Yellow
Write-Host ""

php artisan serve
