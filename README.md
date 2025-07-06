Here's the complete, enhanced `README.md` in one optimized snippet with all visual elements:

```markdown
<!-- Dynamic Banner with Dark/Light Mode Support -->
<p align="center">
  <picture>
    <source media="(prefers-color-scheme: dark)" srcset="https://placehold.co/1280x400/2d3748/e2e8f0?text=✨+Y+Loader&font=raleway">
    <source media="(prefers-color-scheme: light)" srcset="https://placehold.co/1280x400/e2e8f0/2d3748?text=✨+Y+Loader&font=raleway">
    <img alt="Y Loader Banner" src="https://placehold.co/1280x400/e2e8f0/2d3748?text=✨+Y+Loader&font=raleway" width="100%">
  </picture>
</p>

<h1 align="center">⚡ Y Loader - A Stunning Preloader for WordPress</h1>

<p align="center">
  <strong>Add elegant loading animations to WordPress sites with full customization. Lightweight & easy to use!</strong>
</p>

<p align="center">
  <!-- Badges -->
  <a href="https://github.com/yaratul/y-loader/stargazers"><img src="https://img.shields.io/github/stars/yaratul/y-loader?style=for-the-badge&color=ffd700" alt="Stars"></a>
  <a href="https://github.com/yaratul/y-loader/network/members"><img src="https://img.shields.io/github/forks/yaratul/y-loader?style=for-the-badge&color=4ecca3" alt="Forks"></a>
  <a href="https://wordpress.org/plugins/y-loader/"><img src="https://img.shields.io/wordpress/plugin/v/y-loader?style=for-the-badge&logo=wordpress&color=21759b" alt="Version"></a>
  <a href="https://wordpress.org/plugins/y-loader/"><img src="https://img.shields.io/wordpress/plugin/dt/y-loader?style=for-the-badge&color=22a7f0" alt="Downloads"></a>
  <a href="https://wordpress.org/plugins/y-loader/"><img src="https://img.shields.io/wordpress/plugin/rating/y-loader?style=for-the-badge&color=ff69b4" alt="Rating"></a>
</p>

<p align="center">
  <a href="#-features">Features</a> •
  <a href="#-demo">Demo</a> •
  <a href="#-installation">Installation</a> •
  <a href="#-usage">Usage</a> •
  <a href="#-faq">FAQ</a> •
  <a href="#-contributing">Contributing</a>
</p>

---

## ✨ Features

<div align="center">

| Feature                | Description                                                                 |
|------------------------|-----------------------------------------------------------------------------|
| 🎨 **3 Loader Types**  | CSS animations (Spinner/Dots/Pulse), custom GIFs, or text-based             |
| 🎛️ **Live Customizer** | Real-time preview in WordPress admin                                        |
| 🏎️ **0.2s Load Time**  | Optimized vanilla JS (No jQuery bloat)                                      |
| 🖌️ **Color Picker**    | HEX/RGB controls for background & loader                                    |
| 📱 **Mobile Optimized** | Perfectly scales on all devices                                            |

</div>

---

## 🎥 Demo

<p align="center">
  <img src="https://placehold.co/600x400/2d3748/fff?text=Spinner+Demo" width="45%">
  <img src="https://placehold.co/600x400/e2e8f0/2d3748?text=Settings+Panel" width="45%">
</p>

*Replace with actual screen recordings/GIFs*

---

## 📥 Installation

### Method 1: WordPress Admin
```bash
1. Navigate to Plugins → Add New
2. Search "Y Loader"
3. Install & Activate
```

### Method 2: Manual Upload
```bash
1. Download latest .zip from GitHub Releases
2. Go to Plugins → Add New → Upload Plugin
3. Select file and activate
```

---

## 🛠️ Usage

### Basic Configuration
1. Go to **Settings → Y Loader**
2. Choose loader type:
   - 🌀 CSS Animation (select style/color)
   - 🖼️ Custom Image (upload GIF/SVG)
   - 🔤 Text Only (enter message)
3. Set background color
4. Save changes

### Advanced Customization
```css
/* Add to theme's additional CSS */
.y-loader {
  --animation-speed: 1.5s; /* Change speed */
  --bg-opacity: 0.9; /* Overlay transparency */
}
```

---

## ❓ FAQ

### Will this work with caching plugins?
✅ Yes! Compatible with WP Rocket, W3 Total Cache, etc.

### Can I exclude specific pages?
```php
// Add to functions.php
add_filter('y_loader_display', function($show) {
  return !is_page('contact'); // Hide on contact page
});
```

### How to uninstall?
1. Deactivate plugin
2. Delete via WordPress plugins list
3. (Optional) Remove `y-loader` entry from `wp_options` table

---

## 🤝 Contributing

```bash
# Development setup
git clone https://github.com/yaratul/y-loader.git
cd y-loader
npm install
npm run build
```

**Workflow:**
1. Fork the repository
2. Create a feature branch (`git checkout -b feat/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feat/amazing-feature`)
5. Open a PR

---

## 📜 License  
GPL-2.0 © [YA Ratul](https://yaratul.com)

<p align="center">
  <a href="https://yaratul.com">
    <img src="https://img.shields.io/badge/Website-yaratul.com-21759B?style=for-the-badge&logo=wordpress">
  </a>
  <a href="https://github.com/yaratul">
    <img src="https://img.shields.io/badge/GitHub-@yaratul-181717?style=for-the-badge&logo=github">
  </a>
</p>
```

