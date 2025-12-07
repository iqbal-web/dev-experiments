# Contributing to Dev Experiments

Thank you for your interest in contributing to the Dev Experiments WordPress plugin! We welcome contributions from the community and appreciate your efforts to improve this project.

## Table of Contents

- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [Development Workflow](#development-workflow)
- [Coding Standards](#coding-standards)
- [Submitting Changes](#submitting-changes)
- [Reporting Bugs](#reporting-bugs)
- [Feature Requests](#feature-requests)
- [Questions](#questions)

## Code of Conduct

This project adheres to a code of conduct that we expect all contributors to follow:

- Be respectful and inclusive
- Welcome newcomers and help them get started
- Focus on what is best for the community
- Show empathy towards other community members
- Use welcoming and inclusive language

## Getting Started

### Prerequisites

Before you begin, ensure you have the following installed:

- **Node.js** (v16 or higher)
- **npm** (v7 or higher)
- **WordPress** (v6.0 or higher)
- **PHP** (v7.4 or higher)
- **Composer** (for PHP dependencies)
- **Git** for version control

### Setting Up Your Development Environment

1. **Fork the repository** on GitHub

2. **Clone your fork** locally:
   ```bash
   git clone https://github.com/YOUR-USERNAME/dev-experiments.git
   cd dev-experiments
   ```

3. **Add the upstream repository**:
   ```bash
   git remote add upstream https://github.com/iqbal-web/dev-experiments.git
   ```

4. **Install Node dependencies**:
   ```bash
   npm install
   ```

5. **Install PHP dependencies** (optional, for code standards):
   ```bash
   composer install
   ```

6. **Start development mode**:
   ```bash
   npm start
   ```

7. **Copy the plugin to your WordPress installation**:
   ```bash
   # On Windows
   xcopy /E /I . C:\xampp\htdocs\wordpress\wp-content\plugins\dev-experiments
   
   # On macOS/Linux
   cp -r . /path/to/wordpress/wp-content/plugins/dev-experiments
   ```

## Development Workflow

### Branch Strategy

- `main` - Stable production-ready code
- `develop` - Integration branch for features
- `feature/*` - New features
- `bugfix/*` - Bug fixes
- `hotfix/*` - Urgent production fixes

### Creating a Feature Branch

```bash
# Update your local repository
git checkout main
git pull upstream main

# Create a new feature branch
git checkout -b feature/amazing-feature
```

### Making Changes

1. **Make your changes** in your feature branch
2. **Test your changes** thoroughly
3. **Run linting** to ensure code quality:
   ```bash
   npm run lint
   ```
4. **Fix any linting errors**:
   ```bash
   npm run lint:fix
   ```
5. **Build the plugin**:
   ```bash
   npm run build
   ```

### Commit Messages

Write clear, concise commit messages following this format:

```
Type: Short description (50 chars or less)

Longer explanation if necessary, wrapped at 72 characters.
Explain what changed and why, not how.

Fixes #issue-number
```

**Types:**
- `feat:` - New feature
- `fix:` - Bug fix
- `docs:` - Documentation changes
- `style:` - Code style changes (formatting, no code change)
- `refactor:` - Code refactoring
- `test:` - Adding or updating tests
- `chore:` - Maintenance tasks

**Examples:**
```
feat: Add color picker for custom backgrounds

Add a new color picker control in the inspector panel
that allows users to select custom background colors
beyond the theme palette.

Fixes #42
```

## Coding Standards

### JavaScript/React

We follow WordPress JavaScript coding standards:

- Use **ES6+** syntax
- Use **functional components** with hooks
- Add **PropTypes** for all components
- Include **JSDoc comments** for functions
- Use **camelCase** for variables and functions
- Maximum line length: **100 characters**

```javascript
/**
 * Example component with proper structure.
 *
 * @param {Object}   props           Component props.
 * @param {string}   props.title     The title text.
 * @param {Function} props.onChange  Callback when changed.
 * @return {Element} The component.
 */
function ExampleComponent( { title, onChange } ) {
	// Component code
}

ExampleComponent.propTypes = {
	title: PropTypes.string.isRequired,
	onChange: PropTypes.func.isRequired,
};
```

### CSS/SCSS

- Use **BEM methodology** for class names
- Nest selectors maximum **3 levels deep**
- Use **mobile-first** responsive design
- Include **comments** for complex styles

```scss
// Good example
.dev-experiments-block {
	&__title {
		font-size: 1rem;
		
		@media (min-width: 768px) {
			font-size: 1.5rem;
		}
	}
}
```

### PHP

We follow WordPress PHP coding standards:

- Use **tabs** for indentation
- Add **DocBlocks** for all functions
- Use **snake_case** for function names
- Prefix functions with namespace
- Maximum line length: **100 characters**

```php
/**
 * Example function with proper documentation.
 *
 * @param string $param The parameter description.
 * @return bool True on success, false on failure.
 */
function example_function( $param ) {
	// Function code
}
```

### Running Code Standards Checks

```bash
# JavaScript
npm run lint:js

# CSS/SCSS
npm run lint:css

# PHP (requires Composer)
composer install
vendor/bin/phpcs

# Auto-fix issues
npm run lint:fix           # JavaScript & CSS
vendor/bin/phpcbf          # PHP
```

## Submitting Changes

### Pull Request Process

1. **Update your branch** with the latest upstream changes:
   ```bash
   git checkout main
   git pull upstream main
   git checkout feature/your-feature
   git rebase main
   ```

2. **Push to your fork**:
   ```bash
   git push origin feature/your-feature
   ```

3. **Create a Pull Request** on GitHub:
   - Use a clear, descriptive title
   - Reference any related issues
   - Describe what changed and why
   - Include screenshots for UI changes
   - List any breaking changes

4. **Wait for review**:
   - Address reviewer feedback promptly
   - Make requested changes in new commits
   - Don't force-push after review starts

### Pull Request Template

```markdown
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Breaking change
- [ ] Documentation update

## Testing
How did you test these changes?

## Screenshots (if applicable)
Add screenshots here

## Checklist
- [ ] Code follows project style guidelines
- [ ] Self-review completed
- [ ] Comments added for complex code
- [ ] Documentation updated
- [ ] No new warnings generated
- [ ] Tests added/updated
- [ ] All tests passing
```

## Reporting Bugs

### Before Reporting

1. **Search existing issues** to avoid duplicates
2. **Test with latest version** to ensure bug still exists
3. **Disable other plugins** to rule out conflicts
4. **Try default theme** to rule out theme conflicts

### Bug Report Template

```markdown
**Describe the bug**
Clear description of the bug

**To Reproduce**
1. Go to '...'
2. Click on '...'
3. See error

**Expected behavior**
What should happen

**Screenshots**
If applicable

**Environment:**
- WordPress version:
- PHP version:
- Browser:
- Plugin version:

**Additional context**
Any other relevant information
```

## Feature Requests

We welcome feature suggestions! Please:

1. **Check existing requests** to avoid duplicates
2. **Describe the use case** clearly
3. **Explain the expected behavior**
4. **Consider alternative solutions**
5. **Be open to discussion**

### Feature Request Template

```markdown
**Is your feature request related to a problem?**
Clear description of the problem

**Describe the solution you'd like**
What you want to happen

**Describe alternatives you've considered**
Other solutions you thought about

**Additional context**
Mockups, examples, etc.
```

## Questions

Have questions? Here's where to ask:

- **GitHub Discussions** - For general questions and discussions
- **GitHub Issues** - For bug reports and feature requests
- **Code questions** - Include context and what you've tried

## Recognition

Contributors will be:
- Listed in release notes
- Added to the contributors list
- Credited in the README

## License

By contributing, you agree that your contributions will be licensed under the GPL v2 or later, the same license as the project.

---

Thank you for contributing to Dev Experiments! 🎉

Your time and expertise help make this plugin better for everyone.
