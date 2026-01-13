# TeamTaskTrack - Standalone HTML Version

This is a standalone HTML version of the TeamTaskTrack homepage, created with the same design, fonts, and color scheme as the original Laravel Blade template.

## Features

- ✅ Same design and layout as the original
- ✅ Blinker font family (from Google Fonts)
- ✅ Same color scheme (Purple gradient: #4F46E5, #9333EA)
- ✅ Fully responsive design
- ✅ Bootstrap 5 integration
- ✅ Font Awesome icons
- ✅ All sections included:
  - Hero section
  - Features section
  - How it works
  - Deliver faster section
  - Teams section
  - Testimonials
  - CTA section
  - FAQ section
  - Footer

## How to Use

1. **Open the HTML file directly:**
   - Simply double-click `index.html` to open it in your browser
   - Or right-click and select "Open with" → your preferred browser

2. **Using a local server (recommended):**
   - If images don't load, use a local server:
   - Python: `python -m http.server 8000`
   - PHP: `php -S localhost:8000`
   - Node.js: `npx http-server`

## Image Paths

The HTML file references images from `../public/assets/images/`. Make sure the folder structure is:
```
teamtasktrack/
├── html-version/
│   └── index.html
└── public/
    └── assets/
        └── images/
            └── (all image files)
```

## Customization

You can easily customize:
- Colors: Edit the CSS variables in the `<style>` section
- Content: Modify the HTML content directly
- Images: Update image paths or replace images

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Notes

- All styles are embedded in the HTML file for portability
- Uses CDN links for Bootstrap, Google Fonts, and Font Awesome
- No backend dependencies required
