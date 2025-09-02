# Custom Error Pages

This directory contains custom error pages for the Laravel application. These pages will automatically be used when Laravel encounters HTTP errors.

## Available Error Pages

### 404.blade.php
- **Error**: Page Not Found
- **Features**: 
  - Uses the `404.gif` image from `public/images/`
  - Responsive design with Tailwind CSS
  - Navigation buttons (Back to Home, Go Back)
  - Helpful links to contact and services

### 403.blade.php
- **Error**: Access Forbidden
- **Features**:
  - Custom icon for permission errors
  - Clear explanation of the error
  - Navigation options

### 419.blade.php
- **Error**: Page Expired (CSRF Token Mismatch)
- **Features**:
  - Specific handling for session expiration
  - Refresh page button
  - Alternative navigation options

### 500.blade.php
- **Error**: Server Error
- **Features**:
  - Generic server error handling
  - Try again functionality
  - Contact support information

### generic.blade.php
- **Error**: Generic Error Handler
- **Features**:
  - Catches any unhandled error codes
  - Dynamic error message display
  - Fallback for unexpected errors

## How It Works

Laravel automatically looks for error pages in this directory. When an error occurs:

1. Laravel checks if a specific error page exists (e.g., `404.blade.php` for 404 errors)
2. If found, it renders that page
3. If not found, it falls back to the generic error page



## Customization

All error pages extend the `layouts.site` layout and use Tailwind CSS classes. You can:

- Modify the design by updating the CSS classes
- Change the navigation options
- Add more error-specific content
- Customize the color scheme

## Adding New Error Pages

To add a new error page for a specific HTTP status code:

1. Create a new file named `{status_code}.blade.php` (e.g., `401.blade.php` for unauthorized)
2. Follow the existing pattern from other error pages
3. Use the `layouts.site` layout for consistency
4. Include appropriate navigation and help options

## Notes

- All error pages use the same dark theme as the main site
- The 404 page prominently features the `404.gif` image
- Error pages are responsive and mobile-friendly
- Navigation buttons provide clear user actions
- Help text includes links to contact and other relevant pages 