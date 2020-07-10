const path = require('path')
module.exports = {
    entry: path.join(__dirname, 'js/broadcast.js'),
    output: {
        path: path.join(__dirname, 'root'),
        filename: 'bundle.js'
    },
    devtool: 'inline-source-map',
    module: {
        rules: [
            {
                test: /.js$/,
                loader: 'babel-loader',
                options: {
                    presets: ['es2015', 'react']
                }
            }
        ]
    }
}

