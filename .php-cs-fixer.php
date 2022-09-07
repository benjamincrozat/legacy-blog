<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(['bootstrap/cache', 'storage']);

return (new PhpCsFixer\Config)
    ->setFinder($finder)
    ->setRules([
        '@Symfony' => true,
        'cast_spaces' => ['space' => 'single'],
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'compact_nullable_typehint' => true,
        'concat_space' => ['spacing' => 'one'],
        'date_time_immutable' => true,
        'declare_equal_normalize' => true,
        'new_with_braces' => false,
        'no_empty_comment' => false,
        'no_superfluous_elseif' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => ['sort_algorithm' => 'length'],
        'ordered_interfaces' => true,
        'ordered_traits' => true,
        'php_unit_method_casing' => false,
        'return_type_declaration' => ['space_before' => 'one'],
        'single_space_after_construct' => true,
        'single_trait_insert_per_statement' => false,
    ]);
