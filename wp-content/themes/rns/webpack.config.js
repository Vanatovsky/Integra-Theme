const path = require("path");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  mode: "production",
  entry: {
    bundle: "./src/index.js",
    whale: "./src/js/whale/script.js",
    admin: "./src/admin.js",
  },

  output: {
    path: path.resolve(__dirname, "assets"),
    filename: "[name].js",
  },

  // optimization: {
  //   runtimeChunk: "single",
  // },

  plugins: [
    new CopyWebpackPlugin({
      patterns: [{ from: path.resolve(__dirname, "./static") }],
    }),
    new MiniCssExtractPlugin({
      filename: "[name].css",
      chunkFilename: "[id].css",
    }),
  ],

  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use: [
          // Creates `style` nodes from JS strings
          MiniCssExtractPlugin.loader,
          // Translates CSS into CommonJS
          "css-loader",
          // Compiles Sass to CSS
          "sass-loader",
        ],
      },
    ],
  },
};
