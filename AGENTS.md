# AI Agent Instructions for Dev Experiments Plugin

This document provides guidelines and context for AI coding agents (GitHub Copilot, Cursor, etc.) working on the Dev Experiments WordPress plugin.

## Project Overview

**Plugin Name:** Dev Experiments  
**Type:** WordPress Gutenberg Block Plugin  
**Language:** PHP 7.4+ / JavaScript (ES6+)  
**Framework:** WordPress 6.0+, React, @wordpress/scripts  
**Repository:** https://github.com/iqbal-web/dev-experiments

## Project Structure

```
dev-experiments/
├── .github/               # GitHub Actions workflows
│   ├── workflows/         # CI/CD automation
│   └── setup-node/        # Reusable Node.js setup action
├── assets/                # CSS and image assets
├── build/                 # Compiled JavaScript/CSS (generated)
├── includes/              # PHP classes (PSR-4 autoloaded)
│   └── Admin/             # Admin functionality
├── languages/             # Translation files
├── src/                   # Source JavaScript/JSX
├── tests/                 # Test files
│   ├── phpunit/           # PHP unit tests
│   └── _output/           # Test output/reports
├── dev-experiments.php    # Main plugin file
├── uninstall.php          # Cleanup on uninstall
├── composer.json          # PHP dependencies
├── package.json           # npm dependencies
├── phpcs.xml.dist         # PHP CodeSniffer rules
├── phpstan.neon.dist      # PHPStan configuration
└── phpunit.xml.dist       # PHPUnit configuration
```

## Development Standards

### PHP Standards

- **Coding Standard:** WordPress Coding Standards (WPCS 3.0)
- **PHP Version:** 7.4+ (tested up to 8.3)
- **Namespace:** `DevExperiments\`
- **Text Domain:** `dev-experiments`
- **Array Syntax:** Use `array()` not `[]` (WPCS requirement)
- **Indentation:** Tabs for indentation, spaces for alignment

#### Key PHP Rules

1. All classes must be in the `DevExperiments` namespace
2. Use proper DocBlocks with `@package DevExperiments`
3. Escape all output: `esc_html()`, `esc_attr()`, `esc_url()`
4. Sanitize all input: `sanitize_text_field()`, etc.
5. Use `wp_nonce_field()` for forms
6. Follow WordPress function naming: lowercase with underscores
7. Never use reserved keywords as parameter names (`$class` → `$classname`)

### JavaScript Standards

- **Framework:** React with WordPress Components
- **Build Tool:** @wordpress/scripts v27.0.0
- **Style:** WordPress JavaScript Coding Standards
- **Linting:** ESLint with @wordpress/eslint-plugin

#### Key JavaScript Rules

1. Use `@wordpress/element` for React
2. Use `@wordpress/i18n` for translations
3. Include PropTypes for all components
4. Use proper ARIA labels for accessibility
5. Use `…` (ellipsis character) not `...` (three periods)
6. Follow functional component patterns

### Testing Requirements

#### PHP Testing

```bash
# Run all PHP tests
composer test

# Run PHPCS
composer lint

# Run PHPStan
composer phpstan

# Run with coverage
composer test:coverage
```

#### JavaScript Testing

```bash
# Run linting
npm run lint

# Fix linting issues
npm run lint:fix

# Build plugin
npm run build

# Create plugin zip
npm run plugin-zip
```

## Common Tasks

### Adding a New Gutenberg Block

1. Create block files in `src/` directory
2. Register block in `src/index.js`
3. Add block metadata to `src/block.json`
4. Include proper PropTypes validation
5. Add ARIA labels for accessibility
6. Use RichText for editable content
7. Build with `npm run build`

### Adding PHP Functionality

1. Create class in `includes/` directory
2. Use proper namespace: `namespace DevExperiments\Feature;`
3. Add DocBlocks with `@package DevExperiments`
4. Autoloading is automatic (PSR-4)
5. Initialize in `dev-experiments.php` if needed
6. Run `composer lint` to check standards

### Creating Admin Pages

1. Extend functionality in `includes/Admin/Admin.php`
2. Use WordPress Settings API
3. Follow the existing pattern for menu items
4. Sanitize all inputs with callbacks
5. Use proper capability checks: `current_user_can( 'manage_options' )`
6. Escape all outputs

## CI/CD Workflows

### Available Workflows

1. **Build and Test** (`build.yml`) - Runs on push/PR
   - Tests Node 18 and 20
   - Runs JS/CSS linting
   - Builds plugin assets
   - Verifies build output

2. **Code Quality** (`code-quality.yml`) - Runs on push/PR
   - PHPStan static analysis
   - PHP compatibility checks

3. **Test** (`test.yml`) - Comprehensive testing
   - PHPCS coding standards
   - PHPUnit tests
   - Generates coverage reports

4. **Release** (`release.yml`) - Creates GitHub releases
   - Manual trigger only
   - Runs all tests
   - Creates plugin zip
   - Publishes to GitHub

5. **Copilot Setup** (`copilot-setup-steps.yml`) - Prepares environment
   - Installs dependencies
   - Builds assets
   - Caches for faster runs

### Running Tests Locally

Before pushing code:

```bash
# Run all checks
npm run lint && composer lint && composer test

# Auto-fix issues where possible
npm run lint:fix

# Build production assets
npm run build
```

## Configuration Files

### Critical Configs (Do Not Delete)

- `.nvmrc` - Node.js version (20)
- `phpcs.xml.dist` - PHP coding standards rules
- `phpstan.neon.dist` - Static analysis configuration
- `phpunit.xml.dist` - Unit test configuration
- `.editorconfig` - Editor formatting rules
- `.eslintrc.json` - JavaScript linting rules

### WordPress Plugin Requirements

- **Requires at least:** 6.0
- **Tested up to:** 6.7
- **Requires PHP:** 7.4
- **License:** GPL-2.0-or-later

## Common Pitfalls

### ❌ Don't Do This

```php
// Using short array syntax
$array = [ 'item1', 'item2' ];

// Using reserved keywords
function my_function( $class ) { }

// Missing text domain
__( 'Hello' );

// Direct output without escaping
echo $user_input;
```

### ✅ Do This Instead

```php
// Use array() syntax
$array = array( 'item1', 'item2' );

// Avoid reserved keywords
function my_function( $classname ) { }

// Always include text domain
__( 'Hello', 'dev-experiments' );

// Escape all output
echo esc_html( $user_input );
```

## AI Agent Guidelines

### When Making Changes

1. **Check existing patterns** - Follow the established code style
2. **Run tests** - Verify your changes don't break anything
3. **Update documentation** - Keep CHANGELOG.md current
4. **Follow standards** - Use the linters and fix all warnings
5. **Test locally** - Build and verify the plugin works

### Before Committing

- [ ] All linting passes (`npm run lint && composer lint`)
- [ ] Tests pass (`composer test`)
- [ ] Build succeeds (`npm run build`)
- [ ] Documentation updated
- [ ] CHANGELOG.md includes changes

### Debugging Tips

1. Check `tests/_output/` for test reports
2. PHPCS reports show line-by-line violations
3. Use `--report-full` for detailed PHPCS output
4. Check GitHub Actions logs for CI failures
5. Review browser console for JS errors

## Version Control

### Branch Strategy

- `main` - Stable releases
- `develop` - Active development
- `feature/*` - New features
- `bugfix/*` - Bug fixes

### Commit Messages

Follow conventional commits:

- `feat:` New features
- `fix:` Bug fixes
- `docs:` Documentation
- `style:` Formatting
- `refactor:` Code restructuring
- `test:` Adding tests
- `chore:` Maintenance

## Resources

- [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)
- [Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [@wordpress/scripts Documentation](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/)

## Support

- **Issues:** https://github.com/iqbal-web/dev-experiments/issues
- **Documentation:** See README.md and CONTRIBUTING.md

---

**Last Updated:** December 2025  
**Plugin Version:** 1.0.0
