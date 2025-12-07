# Dev Experiments - WordPress Gutenberg Block Plugin

A modern WordPress Gutenberg block plugin built with AI assistance, showcasing GitHub automation features and best practices for block development.

[![WordPress](https://img.shields.io/badge/WordPress-6.0+-blue.svg)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-7.4+-purple.svg)](https://php.net/)
[![License](https://img.shields.io/badge/License-GPL--2.0+-green.svg)](LICENSE)

## 🌟 Features

- **Custom Gutenberg Block**: Beautiful, customizable block with gradient backgrounds
- **Rich Text Editing**: Editable title and content with WordPress RichText components
- **Inspector Controls**: Toggle icon visibility from the block settings sidebar
- **Responsive Design**: Mobile-friendly with breakpoint optimizations
- **Color Support**: Built-in background and text color controls
- **Spacing Controls**: Customizable padding and margin options
- **Animated Icon**: Eye-catching pulse animation on the lightbulb icon
- **Modern Development**: Built with @wordpress/scripts and ES6+

## 📋 Requirements

- WordPress 6.0 or higher
- PHP 7.4 or higher
- Node.js 16.x or higher
- npm 7.x or higher

## 🚀 Installation

### From Source

1. **Clone the repository:**
```bash
git clone https://github.com/iqbal-web/dev-experiments.git
cd dev-experiments
```

2. **Install dependencies:**
```bash
npm install
```

3. **Build the plugin:**
```bash
npm run build
```

4. **Copy to WordPress plugins directory:**
```bash
cp -r . /path/to/wordpress/wp-content/plugins/dev-experiments/
```

5. **Activate the plugin:**
   - Go to WordPress Admin → Plugins
   - Find "Dev Experiments" and click "Activate"

### Manual Installation

1. Download the latest release
2. Upload the plugin folder to `/wp-content/plugins/`
3. Activate the plugin through the 'Plugins' menu in WordPress

## 🛠️ Development

### Setup Development Environment

```bash
# Install dependencies
npm install

# Start development mode (with hot reload)
npm start

# Build for production
npm run build

# Run linting
npm run lint:js
npm run lint:css

# Fix linting issues automatically
npm run lint:js:fix

# Format code
npm run format

# Update WordPress packages
npm run packages-update
```

### Project Structure

```
dev-experiments/
├── src/
│   ├── index.js          # Block registration
│   ├── edit.js           # Editor component
│   ├── save.js           # Frontend save component
│   ├── block.json        # Block metadata
│   ├── style.scss        # Frontend styles
│   └── editor.scss       # Editor-only styles
├── build/                # Compiled assets (generated)
├── dev-experiments.php   # Main plugin file
├── package.json          # Node dependencies
├── phpcs.xml.dist        # PHP CodeSniffer config
└── README.md            # This file
```

### Code Quality

The plugin follows WordPress coding standards:

```bash
# Check PHP code standards
composer install
vendor/bin/phpcs

# Auto-fix PHP code standards
vendor/bin/phpcbf
```

## 📖 Usage

### Adding the Block

1. Edit any post or page in the block editor
2. Click the **+** button to add a new block
3. Search for "Dev Experiments Block"
4. Click to insert the block

### Customizing the Block

**In the Block Toolbar:**
- Use alignment controls to position the block
- Access text formatting options for title and content

**In the Inspector (Right Sidebar):**
- Toggle the icon visibility on/off
- Adjust background and text colors
- Modify padding and margin spacing

**Direct Editing:**
- Click the title to edit inline
- Click the content to edit inline
- Both fields support rich text formatting

### Block Attributes

The block supports the following customizable attributes:

| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `title` | string | "Welcome to Dev Experiments Block" | The block's heading |
| `content` | string | "This block was created..." | The block's main content |
| `showIcon` | boolean | true | Whether to display the lightbulb icon |

## 🎨 Customization

### Styling

Frontend styles are in `src/style.scss` and editor styles in `src/editor.scss`. After making changes:

```bash
npm run build
```

### Changing Colors

The default gradient can be customized in `style.scss`:

```scss
.dev-experiments-block {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    // Change to your preferred gradient
}
```

### Modifying Block Settings

Edit `src/block.json` to change:
- Block category
- Icon
- Supports (color, spacing, etc.)
- Default attribute values

## 🧪 Testing

```bash
# Run unit tests
npm run test:unit

# Run end-to-end tests
npm run test:e2e
```

## 📦 Building for Distribution

Create a production-ready plugin ZIP:

```bash
npm run plugin-zip
```

This creates an optimized, installable ZIP file in the root directory.

## 🔐 Security

This plugin follows WordPress security best practices:

- ✅ Nonce verification for all actions
- ✅ Capability checks for user permissions
- ✅ Input sanitization and output escaping
- ✅ No direct file access
- ✅ Follows WordPress Coding Standards

Report security issues to: [your-email@example.com]

## 🤝 Contributing

Contributions are welcome! Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

### Development Workflow

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/amazing-feature`
3. Make your changes
4. Run tests and linting: `npm run lint:js && npm run lint:css`
5. Commit your changes: `git commit -m 'Add amazing feature'`
6. Push to the branch: `git push origin feature/amazing-feature`
7. Open a Pull Request

## 📝 Changelog

See [CHANGELOG.md](CHANGELOG.md) for a list of changes in each version.

## 📄 License

This plugin is licensed under the GPL v2 or later.

```
Copyright (C) 2025 Dev Team

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
```

See [LICENSE](LICENSE) for the full license text.

## 👥 Authors

- **Dev Team** - *Initial work* - [iqbal-web](https://github.com/iqbal-web)

## 🙏 Acknowledgments

- Built with [@wordpress/scripts](https://www.npmjs.com/package/@wordpress/scripts)
- Developed with assistance from GitHub Copilot
- Inspired by the WordPress Gutenberg block editor
- Icons from [Dashicons](https://developer.wordpress.org/resource/dashicons/)

## 📞 Support

- **Issues**: [GitHub Issues](https://github.com/iqbal-web/dev-experiments/issues)
- **Discussions**: [GitHub Discussions](https://github.com/iqbal-web/dev-experiments/discussions)
- **Documentation**: [WordPress Block Editor Handbook](https://developer.wordpress.org/block-editor/)

## 🔗 Links

- [Plugin Homepage](https://github.com/iqbal-web/dev-experiments)
- [WordPress Plugin Directory](#) _(coming soon)_
- [Live Demo](#) _(coming soon)_

---

Made with ❤️ and 🤖 by the Dev Team
