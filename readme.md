# Bootcamp II ⛰️

![WebPack 5.44.0](https://img.shields.io/badge/WebPack-5.44.0-brightgreen)
![Babel 7.14.6](https://img.shields.io/badge/Babel-7.14.6-brightgreen)
![BrowserSync 2.27.4](https://img.shields.io/badge/BrowserSync-2.27.4-brightgreen)
![PostCSS 8.3.5](https://img.shields.io/badge/PostCSS-8.3.5-brightgreen)
![Tailwind 3.1.3](https://img.shields.io/badge/Tailwind-2.2.4-brightgreen)

Bootcamp II is a wordpress theme (as well as an inside joke) designed to suit the needs of foothillschurch.com. It makes use of webpack, Babel, Sass, Tailwind, Browsersync, PostCSS, ESLint, Stylelint, Prettier and more. It is meant for that site, but if you can use it by all means go for it.

---

## Features and Benefits

**General**

- [**Webpack.**](https://classic.yarnpkg.com/en/package/webpack) Built on webpack, this template allows for a modern development workflow + a production ready build.
- **Minification.** Complete with webpack's native features and CSSNano, this gets your CSS and JS files smaller than things in 40 degree water.
- [**Prettier.**](https://prettier.io/) An opinionated code formatter. It automagically formats all your code on save so that it always looks the same. This forces everyone's code to look the same, so no more arguing about tabs vs spaces.
- [**BrowserSync.**](https://browsersync.io/) Browsersync synchronises browsers, URLs, interactions and code changes across devices and automatically refreshes all the browsers on all devices on changes. If you have never used this it'll blow your mind.
- [**Sourcemaps.**]() Webpack generates sourcemaps for all js and css files. This helps with debugging simply because when you don't have them enabled your code hides from you like slenderman.
- Configuration. All of the config files have been neatly organized into /webpack to keep them out of the way of the main files. Webpack.config being the exception.

**CSS**

- [**PostCSS.**](http://postcss.org/) PostCSS allows for some code to be injected after the fact, most noteably...
- [**Autoprefixer.**](https://github.com/postcss/autoprefixer) Remember those CSS vendor prefixes you didn't add? Well autoprefixer has you covered.
- [**TailwindCSS.**](https://tailwindcss.com/) Tailwind is the CSS framework all the kids are tweeting about. If you aren't familiar, it basically generates like 4.8 million CSS classes so you never have to write CSS again. And it cleans up after itself, which is nice.
- [**Sass.**](https://webpack.js.org/loaders/sass-loader/) Technicaly SCSS. But we call it sass. Compiles Sass down into CSS so browsers can read it.

**JS**

- [**BabelJS.**](https://babeljs.io/) Allows you to use next gen Javascript by transpiling it (dumbing it down) to something IE 4 can understand (that claim isn't tested).

## Requirements

- [Node.js](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)
- [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)
- [Yarn](https://classic.yarnpkg.com/en/docs/install/#mac-stable)

## Install

```bash
# 1-- Set up a local instance of Worpress in Local or something.
# 2-- Clone this into your themes folder (as a new theme)

$ git clone https://github.com/Myzwer/foothillschurch

# 2-- Edit the BrowserSync settings in `webpack.config.js`. Ya can't miss it.
# 3-- Install yarn and all the project dependencies

$ yarn install

# 4-- Run a command and start making some magic.
yarn dev
yarn dev:watch
yarn prod
yarn prod:watch
```

Happy coding!
