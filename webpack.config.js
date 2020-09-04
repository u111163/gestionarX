const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addEntry('js/app', './assets/js/app.js')
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')
    //pages
    .addEntry('js/dashboard', './assets/js/pages/dashboard.js')
    .addEntry('js/caja_chica', './assets/js/pages/caja-chica.js')
    .addEntry('js/categoria', './assets/js/pages/categoria.js')
    .addEntry('js/cliente', './assets/js/pages/cliente.js')
    .addEntry('js/comprobantes_compras', './assets/js/pages/comprobantes_compras.js')
    .addEntry('js/comprobantes_ventas', './assets/js/pages/comprobantes_ventas.js')
    .addEntry('js/comprobantes', './assets/js/pages/comprobantes.js')
    .addEntry('js/contabilidad_bancos', './assets/js/pages/contabilidad_bancos.js')
    .addEntry('js/contabilidad_caja_chica', './assets/js/pages/contabilidad_caja_chica.js')
    .addEntry('js/contabilidad_compras', './assets/js/pages/contabilidad_compras.js')
    .addEntry('js/contabilidad_impuestos', './assets/js/pages/contabilidad_impuestos.js')
    .addEntry('js/contabilidad_personal', './assets/js/pages/contabilidad_personal.js')
    .addEntry('js/contabilidad_ventas', './assets/js/pages/contabilidad_ventas.js')
    .addEntry('js/cuenta_credito', './assets/js/pages/cuenta_credito.js')
    .addEntry('js/empresa', './assets/js/pages/empresa.js')
    .addEntry('js/usuario', './assets/js/pages/usuario.js')
    .addEntry('js/forma_pago', './assets/js/pages/forma_pago.js')
    .addEntry('js/personal', './assets/js/pages/personal.js')
    .addEntry('js/proyecto', './assets/js/pages/proyecto.js')
    .addEntry('js/registro', './assets/js/pages/registro.js')
    .addEntry('js/tipo_cambio', './assets/js/pages/tipo_cambio.js')
    .addEntry('js/tipo_comprobante', './assets/js/pages/tipo_comprobante.js')
    .addEntry('js/unidad_medida', './assets/js/pages/unidad_medida.js')
    .addEntry('js/vencimiento', './assets/js/pages/vencimiento.js')

    .copyFiles({
        from: './assets/json/es_datatable.json',
        to: './json/es_datatable.json'
    })

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    //.splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    //.enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    //.cleanupOutputBeforeBuild()
    //.enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    //.enableVersioning(Encore.isProduction())

    // enables @babel/preset-env polyfills
    /*.configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })*/

// enables Sass/SCSS support
//.enableSassLoader()

// uncomment if you use TypeScript
//.enableTypeScriptLoader()

// uncomment to get integrity="..." attributes on your script & link tags
// requires WebpackEncoreBundle 1.4 or higher
//.enableIntegrityHashes(Encore.isProduction())

// uncomment if you're having problems with a jQuery plugin
//.autoProvidejQuery()

// uncomment if you use API Platform Admin (composer require api-admin)
//.enableReactPreset()
//.addEntry('admin', './assets/js/admin.js')
;

module.exports = Encore.getWebpackConfig();
