const PATH = require('path');

module.exports = {
  mode: "development",
  // entry: './public/js/src/entry-point.js',
  entry: {
    "entry-points": './public/js/src/entry-point.js'
  },
  output: {
    filename: "[name].bundled.js",
    path: PATH.join(__dirname, 'public/js/dist')
  },
  devServer: {
    inline: false,
    contentBase: "./dist",
  },
  module: {
    rules: [
      {
        test: /\.m?js|\.es6$/,
        use: [
          {
            loader: "babel-loader",
            options: {
              presets: [
                  "@babel/preset-env"
              ]
            }
          }
        ]
      }
    ]
  },
  target: ["web", "es5"]
}
