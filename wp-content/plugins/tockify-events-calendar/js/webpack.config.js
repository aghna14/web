// webpack.config.js
const path = require('path');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const {DuplicatesPlugin} = require('inspectpack/plugin')

const isProductionMode = process.env.NODE_ENV === 'production';

const productionPlugins = [
  new UglifyJsPlugin({
    uglifyOptions: {
      compress: {
        warnings: false,
        // only drop console.log, so console.info etc remain in prod
        // drop_console: true,
        pure_funcs: [ 'console.log', 'console.trace' ],
        // https://github.com/mishoo/UglifyJS2/issues/2011
        comparisons: false,
      },
      mangle: {
        reserved: [ 'console.log', 'console.trace' ],
      },
      output: {
        comments: false,
        // https://github.com/facebookincubator/create-react-app/issues/2488
        ascii_only: true,
      },
      sourceMap: true,
    }}),
    new BundleAnalyzerPlugin({analyzerPort:8889})
];

const developmentPlugins = [
    new DuplicatesPlugin({
      // Emit compilation warning or error? (Default: `false`)
      emitErrors: false,
      // Display full duplicates information? (Default: `false`)
      verbose: false
    })
];

// react is supplied by gutenberg
const wplib = [
  'blocks',
  'components',
  'date',
  'editor',
  'element',
  'i18n',
  'utils',
  'data',
];

module.exports = {
  mode: isProductionMode ? 'production' : 'development',
  plugins: isProductionMode ? productionPlugins : developmentPlugins,
  entry: {
    embed: path.resolve(__dirname, 'src/block.jsx')
  },
  output: {
    path: path.resolve(__dirname, 'bin'),
    filename: 'tockify.blocks.js',
    library: ['wp', '[name]'],
    libraryTarget: 'window',
  },
// https://www.cssigniter.com/how-to-use-external-react-components-in-your-gutenberg-blocks
  externals: wplib.reduce((externals, lib) => {
    externals[`wp.${lib}`] = {
      window: ['wp', lib],
    };
    return externals;
  }, {
    'react': 'React',
    'react-dom': 'ReactDOM',
  }),
  module: {
    rules: [
      {
        test: /\.jsx?$/,
        use: [{
          loader: 'babel-loader',
          options: {
            presets: [
              '@babel/env'
            ],
            "plugins": [
              "@babel/plugin-proposal-class-properties"
            ]
          },
        }],
        exclude: /node_modules/
      },
      {
        test: /\.css$/,
        use: [
          'style-loader',
          'css-loader',
        ]
      },
      {
        test: /\.scss$/,
        use: [
          "style-loader", // creates style nodes from JS strings
          "css-loader", // translates CSS into CommonJS
          "sass-loader",
        ]
      }
    ]
  },
  resolve: {
    modules: [path.resolve(__dirname, 'src'), 'node_modules'],
    extensions: ['.js', '.jsx']
  }
};
