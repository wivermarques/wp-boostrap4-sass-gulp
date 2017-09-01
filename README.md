# Wp + Booststrap 4 + Sass + Gulp

Theme Project: [https://github.com/wivermarques/wp-boostrap4-sass-gulp](https://github.com/wivermarques/wp-boostrap4-sass-gulp)

## About

Blank theme that uses the Bootstrap 4 framework

## Basic Features

- Bower
- Gulp
- Comes with Bootstrap (v4), using Sass.
- Uses a CSS file and a single, minified JS for all things.
- [Awesome Font] (http://fortawesome.github.io/Font-Awesome/)

## Starter Theme

- Download the dependencies npm "npm install".
- Use "gulp bower" for the dependencies.

### Running

To work and compile your Sass files on the fly start:

- `$ gulp watch`

Or, to run with Browser-Sync:

- First change the browser-sync options to reflect your environment in the file `/gulpfile.js` in the beginning of the file:
```javascript
var browserSyncOptions = {
    proxy: "localhost/", // <----- CHANGE HERE
    notify: false
};
```
- then run: `$ gulp watch-bs`