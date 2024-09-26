// ****** THE WEBPACK CONFIG FILE ******

const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const StylelintPlugin = require("stylelint-webpack-plugin");
const CssnanoPlugin = require("cssnano-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");

// ***** SET ENVIRONMENT *****
// * This tells webpack to always run in development mode.
let mode = "development";

if (process.env.NODE_ENV === "production") {
  mode = "production";
}

// ***** MODULE EXPORTS *****
module.exports = {
  mode,

  module: {
    rules: [
      // *** CSS ***
      {
        test: /\.s?css$/i,
        use: [
          { loader: MiniCssExtractPlugin.loader },
          { loader: "css-loader" },
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: {
                config: "./webpack/postcss.config.js",
              },
            },
          },
          { loader: "resolve-url-loader" },
          { loader: "sass-loader" },
        ],
      },

      // *** BABEL ***
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
        },
      },

      // *** FONTS ***
      {
        test: /\.(ttf|eot|woff|woff2|svg)$/,
        use: {
          loader: "file-loader",
          options: {
            name: "[name].[ext]",
            outputPath: "../fonts/",
            esModule: false,
          },
        },
      },
    ],
  },

  // * Minimization!
  // * So this is where CSSNano is configured to minimize our CSS.
  // * It does a few extra goodies like removing comments and stuff
  // * Currently using default settings. More on that here:
  // * https://cssnano.co/docs/optimisations
  // * This is also where we ping TerserPlugin to minify our JS too.
  optimization: {
    minimizer: [
      new CssnanoPlugin({
        test: /\.s?css$/i,
        cssnanoOptions: {
          preset: [
            "default",
            {
              discardComments: { removeAll: true },
            },
          ],
        },
      }),
      new TerserPlugin({
        terserOptions: {
          compress: {},
        },
      }),
    ],
  },

  // *** INPUT / OUTPUT ***
  entry: ["./assets/src/js/frontend.js"],
  output: {
    filename: "frontend.js",
    path: path.resolve(__dirname, "assets/public/js"),
  },

  // ***** SET DEVTOOL *****
  // * https://webpack.js.org/configuration/devtool/
  devtool: "source-map",

  // ***** SET PLUGINS *****
  plugins: [
    // *** BROWSERSYNC ***
    new BrowserSyncPlugin({
      enable: true, // enable or disable browserSync
      host: "localhost",
      port: 3000,
      mode: "proxy", // proxy | server
      proxy: "foothillschurchcom.local",
      files: "**/**/**.php",
      reload: true,
    }),

    // *** STYLELINT ***
    new StylelintPlugin(),

    new MiniCssExtractPlugin({
      filename: "../css/frontend.css",
    }),
  ],
};
