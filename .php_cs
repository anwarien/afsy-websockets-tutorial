<?php

if (!file_exists(__DIR__.'/src')) {
    exit(0);
}

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        // '@PHPUnit75Migration:risky' => true,
        // 'php_unit_dedicate_assert' => ['target' => '5.6'],
        'array_syntax' => ['syntax' => 'short'],
        // 'fopen_flags' => false,
        'protected_to_private' => false,
        // 'combine_nested_dirname' => true,
        'function_declaration' => [
            'closure_function_spacing' => 'none',
        ],
        'phpdoc_add_missing_param_annotation' => [
            'only_untyped' => false
        ],
    ])
    ->setRiskyAllowed(true)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__.'/src')
            ->append([__FILE__])
            ->notPath('#/Fixtures/#')
            ->exclude([
                // directories containing files with content that is autogenerated by `var_export`, which breaks CS in output code
                // fixture templates
                'Symfony/Bundle/FrameworkBundle/Tests/Templating/Helper/Resources/Custom',
                // resource templates
                'Symfony/Bundle/FrameworkBundle/Resources/views/Form',
                // explicit trigger_error tests
                'Symfony/Bridge/PhpUnit/Tests/DeprecationErrorHandler/',
            ])
            // Support for older PHPunit version
            ->notPath('Symfony/Bridge/PhpUnit/SymfonyTestsListener.php')
            ->notPath('#Symfony/Bridge/PhpUnit/.*Mock\.php#')
            ->notPath('#Symfony/Bridge/PhpUnit/.*Legacy#')
            // file content autogenerated by `var_export`
            ->notPath('Symfony/Component/Translation/Tests/fixtures/resources.php')
            // test template
            ->notPath('Symfony/Bundle/FrameworkBundle/Tests/Templating/Helper/Resources/Custom/_name_entry_label.html.php')
            // explicit trigger_error tests
            ->notPath('Symfony/Component/ErrorHandler/Tests/DebugClassLoaderTest.php')
    )
;
