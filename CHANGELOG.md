# Changelog

All notable changes to the Dev Experiments WordPress plugin will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Planned
- Unit tests for JavaScript components
- E2E tests for block functionality
- Additional block style variations
- Dark mode support
- More inspector control options
- Integration with WordPress patterns

## [1.0.0] - 2025-12-07

### Added
- Initial release of Dev Experiments plugin
- Custom Gutenberg block with rich text editing capabilities
- Block inspector controls for toggling icon visibility
- Support for WordPress color controls (background and text)
- Support for WordPress spacing controls (padding and margin)
- Responsive design with mobile optimizations
- Animated lightbulb icon with pulse effect
- Gradient background styling
- Editor-specific styles for better editing experience
- Frontend styles for consistent display
- Translation-ready with 'dev-experiments' text domain
- Dashicons support for frontend display
- WordPress coding standards compliance (PHP)
- ESLint compliance for JavaScript
- Stylelint compliance for CSS/SCSS
- Comprehensive README.md documentation
- WordPress Plugin Directory readme.txt
- PHPCS configuration for code quality
- .gitignore for clean version control
- Build scripts using @wordpress/scripts
- Development mode with hot reloading

### Features
- **Block Name**: dev-experiments/dev-experiments-block
- **Category**: Widgets
- **Icon**: Lightbulb
- **API Version**: 3 (Block API v3)
- **Minimum WordPress**: 6.0
- **Minimum PHP**: 7.4

### Technical Details
- Built with @wordpress/scripts v27.0.0
- Uses WordPress Block API v3
- Follows WordPress Coding Standards
- Namespaced PHP functions (DevExperiments namespace)
- Modern JavaScript (ES6+)
- SCSS for styling with BEM methodology
- Component-based architecture

### Attributes
- `title` (string): Block heading text
- `content` (string): Block main content text
- `showIcon` (boolean): Toggle icon visibility

### Supports
- HTML: false (uses React components)
- Color: background, text
- Spacing: padding, margin
- Custom class names
- Anchor links

### Files Structure
```
dev-experiments/
├── src/
│   ├── index.js          # Block registration
│   ├── edit.js           # Editor component
│   ├── save.js           # Frontend component
│   ├── block.json        # Block metadata
│   ├── style.scss        # Frontend styles
│   └── editor.scss       # Editor styles
├── build/                # Compiled assets
├── dev-experiments.php   # Main plugin file
├── package.json          # Dependencies
├── phpcs.xml.dist        # Code standards
├── README.md             # Documentation
├── readme.txt            # WP.org readme
├── CHANGELOG.md          # This file
└── .gitignore           # Git ignore rules
```

### Dependencies
- @wordpress/block-editor ^12.0.0
- @wordpress/blocks ^12.0.0
- @wordpress/components ^25.0.0
- @wordpress/element ^5.0.0
- @wordpress/i18n ^4.0.0

### Dev Dependencies
- @wordpress/scripts ^27.0.0

### Security
- No external API calls
- No data collection
- No cookies used
- No tracking
- All assets loaded locally
- Follows WordPress security best practices

### Browser Support
- Modern browsers (Chrome, Firefox, Safari, Edge)
- IE11 not supported (WordPress 6.0+ requirement)

### Known Issues
None at this time.

### Credits
- Developed by Dev Team
- Built with GitHub Copilot assistance
- Uses WordPress Dashicons
- Powered by @wordpress/scripts

---

## Version History

### Version Naming Convention
- **Major.Minor.Patch** (e.g., 1.0.0)
- **Major**: Breaking changes
- **Minor**: New features, backwards compatible
- **Patch**: Bug fixes, backwards compatible

### Support
For issues, feature requests, or questions:
- GitHub Issues: https://github.com/iqbal-web/dev-experiments/issues
- GitHub Discussions: https://github.com/iqbal-web/dev-experiments/discussions

[Unreleased]: https://github.com/iqbal-web/dev-experiments/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/iqbal-web/dev-experiments/releases/tag/v1.0.0
