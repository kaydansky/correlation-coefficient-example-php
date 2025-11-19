# Correlation Coefficient Calculator

A web-based application that demonstrates the use of the Correlation Coefficient PHP library for calculating Pearson and Spearman correlation coefficients between two variables.

## Overview

This project provides an interactive web interface for calculating correlation coefficients, which are numerical measures of statistical relationships between two variables. The application is particularly useful for finance and investing analysis, such as determining the correlation between crude oil prices and oil company stock prices.

## Features

- **Interactive Web Interface**: User-friendly HTML form with Bootstrap styling
- **Dual Correlation Types**: Supports both Pearson and Spearman correlation calculations
- **Dynamic Data Input**: Configurable dataset size (2-50 data points)
- **Real-time Visualization**: Google Charts integration for data visualization
- **Random Data Generation**: Automatic population with sample data for testing
- **AJAX Processing**: Seamless server-side calculation without page refresh

## Technology Stack

- **Backend**: PHP 7.4+
- **Frontend**: HTML5, CSS3, JavaScript (jQuery)
- **Styling**: Bootstrap 4.4.1
- **Charts**: Google Charts API
- **Dependency Management**: Composer
- **Library**: Custom Correlation Coefficient PHP Library

## Installation

### Prerequisites

- PHP 7.4 or higher
- Composer
- Web server (Apache/Nginx)
- JSON extension enabled

### Setup

1. Clone or download the project to your web server directory
2. Install dependencies using Composer:
   ```bash
   composer install
   ```
3. Ensure your web server is configured to serve the project directory
4. Access `index.html` through your web browser

## Usage

### Basic Usage

1. **Configure Variables**: 
   - Enter names for your X and Y variables (default: "Age" and "Glucose Level")
   - Set the data size (2-50 data points)
   - Choose correlation type (Pearson or Spearman)

2. **Generate Data**: 
   - Click "Populate with data" to generate random sample data
   - Manually edit the generated values as needed

3. **Calculate**: 
   - Click "Calculate" to compute the correlation coefficient
   - View results with percentage interpretation and visual chart

### Correlation Types

- **Pearson**: Measures linear correlation between variables
- **Spearman**: Measures monotonic correlation (rank-based)

## Project Structure

```
CorrelationExample/
├── assets/
│   └── images/
│       └── GitHub_Logo.png
├── vendor/
│   ├── kaydansky/correlation-coefficient/
│   └── autoload.php
├── coefficient.php          # Backend calculation endpoint
├── composer.json           # Project dependencies
├── index.html             # Main web interface
└── README.md             # This file
```

## API Endpoint

### POST /coefficient.php

Calculates correlation coefficient for provided data arrays.

**Parameters:**
- `vx[]`: Array of X variable values
- `vy[]`: Array of Y variable values  
- `c_type`: Correlation type ("pearson" or "spearman")

**Response:**
```json
{
  "coefficient": 0.8542,
  "percentage": "85.42",
  "type": "Pearson"
}
```

**Error Response:**
```json
{
  "error": "Error message description"
}
```

## Dependencies

- `kaydansky/correlation-coefficient`: Custom correlation calculation library
- `ext-json`: JSON extension for PHP

## Browser Compatibility

- Modern browsers with JavaScript enabled
- jQuery 3.4.1 support
- Bootstrap 4.4.1 compatibility
- Google Charts API support

## Educational Resources

- [Correlation Coefficient (Wikipedia)](https://en.wikipedia.org/wiki/Correlation_coefficient)
- [Correlation Statistics (Investopedia)](https://www.investopedia.com/terms/c/correlationcoefficient.asp)
- [Correlation Coefficient PHP Library](https://github.com/kaydansky/correlation-coefficient)

## License

Proprietary license - see composer.json for details

## Author

**Alexander Kaydansky**
- Email: kaydansky@gmail.com
- GitHub: [Correlation Coefficient Library](https://github.com/kaydansky/correlation-coefficient)

## Contributing

This project serves as an example implementation of the Correlation Coefficient PHP library. For library-related contributions, please refer to the main library repository.

## Troubleshooting

### Common Issues

1. **Composer Dependencies**: Ensure all dependencies are installed via `composer install`
2. **PHP Version**: Verify PHP 7.4+ is installed and configured
3. **JSON Extension**: Confirm PHP JSON extension is enabled
4. **File Permissions**: Check web server has read access to project files

### Error Handling

The application includes comprehensive error handling for:
- Invalid input data
- Array size mismatches
- Non-numeric values
- Server communication failures

## Performance Notes

- Optimized for datasets up to 50 data points
- AJAX requests minimize page reloads
- Client-side validation reduces server load
- Efficient correlation algorithms in underlying library